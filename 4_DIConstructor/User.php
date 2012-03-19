<?php

    class User
    {
        protected $storage;
        public function __construct(Storage $storage) 
        {
            $this->storage = $storage;
        }

        public function setParameter($key, $value)
        {
            $this->storage->set($key, $value);
        }
    }

    class SessionStorage implements Storage
    {
        public function __construct($name) 
        {
            session_name('PHP_SESSION_ID');
            session_start();
        }
        public function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    //Добавляется конфигурирование.
    $storage = new SessionStorage();
    $user = new User($storage);
    $user->setParameter('id', 1);
?>
