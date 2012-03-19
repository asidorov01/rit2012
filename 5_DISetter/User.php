<?php
$a;
    Interface Storage
    { 
        public function __construct();
        public function set($key, $value);
    }

    class User
    {
        protected $storage;

        public function setParameter($key, $value)
        {
            $this->storage->set($key, $value);
        }
        
        public function setStorage(Storage $storage)
        {
            $this->storage = $storage;
        }
    }

    class SessionStorage implements Storage
    {
        public function __construct($cookie_name) 
        {
            session_name($cookie_name);
            session_start();
        }
        public function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    $storage = new SessionStorage('PHP_SESSION_ID');
    $user = new User();
    $user->setStorage($storage);
    $user->setParameter('id', 1);

    
