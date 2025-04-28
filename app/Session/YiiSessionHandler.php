<?php

namespace App\Session;

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
        $record = DB::table($this->table)
            ->where('id', $id)
            ->where('expire', '>', time())
            ->first();

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
            return DB::table($this->table)
                ->where('id', $id)
                ->update(['data' => $data, 'expire' => $expire]);
        } else {
            return DB::table($this->table)
                ->insert(['id' => $id, 'data' => $data, 'expire' => $expire]);
        }
    }

    public function destroy($id): bool
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }

    public function gc($max_lifetime): false|int
    {
        return DB::table($this->table)->where('expire', '<', time())->delete();
    }

    public function create_sid(): string
    {
        return Str::random(40);
    }
}
