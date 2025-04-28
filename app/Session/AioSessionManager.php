<?php

namespace App\Session;

use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;

class AioSessionManager extends SessionManager
{

    protected function buildSession($handler)
    {
        return $this->config->get('session.encrypt')
            ? $this->buildEncryptedSession($handler)
            : new AioSessionStore(
                $this->config->get('session.cookie'),
                $handler,
                $id = null,
                $this->config->get('session.serialization', 'php')
            );
    }
}
