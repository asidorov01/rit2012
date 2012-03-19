<?php

    class User
    {
        protected $storage;
        public function __construct($storage_type) 
        {
            $this->storage = new $storage_type();
        }

        public function setParameter($key, $value)
        {
            $this->storage->set($key, $value);
        }
    }

    class SessionStorage
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
    $storage_type = 'SessionStorage';
    $user = new User($storage_type);
    $user->setParameter('id', 1);
?>
