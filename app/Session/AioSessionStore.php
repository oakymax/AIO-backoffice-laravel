<?php

namespace App\Session;

use Illuminate\Session\EncryptedStore;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use SessionHandlerInterface;

class AioSessionStore extends Store
{
    public function __construct($name, SessionHandlerInterface $handler, $id = null, $serialization = 'php')
    {
        parent::__construct($name, $handler, $id, $serialization);

        Log::warning('AioSessionStore', [$name, $handler, $id, $serialization]);
    }

    public function isValidId($id)
    {
        return is_string($id) && ctype_alnum($id) && strlen($id) <= 40;
    }
}
