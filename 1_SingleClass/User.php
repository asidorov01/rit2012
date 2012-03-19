<?php

    class User
    {
        public function __construct() 
        {
            session_name('PHP_SESSION_ID');
            session_start();
        }

        public function setParameter($key, $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    $user = new User();
    $user->setParameter('id', 1);
?>
