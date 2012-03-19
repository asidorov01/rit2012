<?php

    class User
    {
        protected $storage;
        public function __construct() 
        {
            $this->storage = new SessionStorage();
        }

        public function setParameter($key, $value)
        {
            $this->storage->set($key, $value);
        }
    }

    class SessionStorage
    {
        public function __construct() 
        {
            session_name('PHP_SESSION_ID');
            session_start();
        }
        public function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    $user = new User();
    $user->setParameter('id', 1);
