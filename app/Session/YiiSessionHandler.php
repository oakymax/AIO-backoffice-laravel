<?php

namespace App\Session;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SessionHandlerInterface;
use Illuminate\Support\Facades\DB;
use SessionIdInterface;

class YiiSessionHandler implements SessionHandlerInterface, SessionIdInterface
{
    protected $table = 'session';

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read($id): false|string
    {
        Log::warning('YiiSessionHandler.read', [$id]);
        $record = DB::table($this->table)
            ->where('id', $id)
            ->where('expire', '>', time())
            ->first();
        Log::warning('YiiSessionHandler.read', [$record]);
        if ($record) {
            return json_encode($record->data);
        }
        return false;
    }

    public function write($id, $data): bool
    {
        $expire = time() + config('session.lifetime') * 60;

        $exists = DB::table($this->table)->where('id', $id)->exists();

        if ($exists) {
            Log::warning('YiiSessionHandler.write.update', [$id]);
            return DB::table($this->table)
                ->where('id', $id)
                ->update(['data' => $data, 'expire' => $expire]);
        } else {
            Log::warning('YiiSessionHandler.write.insert', [$id]);
            return DB::table($this->table)
                ->insert(['id' => $id, 'data' => $data, 'expire' => $expire]);
        }
    }

    public function destroy($id): bool
    {
        Log::warning('YiiSessionHandler.destroy', [$id]);
        return DB::table($this->table)->where('id', $id)->delete();
    }

    public function gc($max_lifetime): false|int
    {
        $deletedCount =  DB::table($this->table)->where('expire', '<', time())->delete();
        Log::warning('YiiSessionHandler.gc', [$deletedCount]);
        return $deletedCount;
    }

    public function create_sid(): string
    {
        $sid = Str::random(40);
        Log::warning('YiiSessionHandler.create_sid', [$sid]);
        return $sid;
    }
}
