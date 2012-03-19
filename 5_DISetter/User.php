<?php

    class User
    {
        public function setParameter($key, $value)
        {
            $this->getService('storage')->set($key, $value);
        }
    }

    $user = new User();
    $user->setParameter('id', 1);
?>
