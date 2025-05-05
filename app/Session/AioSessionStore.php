<?php

namespace App\Session;

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

    public function migrate($destroy = false)
    {
//        if ($destroy) {
//            Log::warning('Store.migrate', [$destroy, $this->getId()]);
//            $this->handler->destroy($this->getId());
//        }
//
//        $this->setExists(false);
//
//        $this->setId($this->generateSessionId());
//
        return true;
    }
}
