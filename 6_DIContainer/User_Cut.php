<?php

    class User
    {
        protected $container;
        public function __construct(Container $container) {
            $this->container = $container;
        }
        public function setParameter($key, $value)
        {
            $this->container->get('storage')->set($key, $value);
        }
    }

    class Container
    {
        protected $services;
        public function get($service)
        {
            return $this->services[$service];
        }
        public function register($service_name, $service_class, $parameters)
        {
            $this->services[$service_name] = new $service_class($parameters);
        }
    }
    
    class SessionStorage 
    {
        public function __construct($parameters) {
            session_name($parameters['cookie_name']);
            session_start();
        }
        //....
    }
    
    $c = new Container();
    $c->register('storage', 'SessionStorage', array(
        'cookie_name' => 'PHP_SESSION_ID'
        ));
    
    $c->register('user', 'User', array(
       'container' => $c 
    ));    
    

    $c->get('user')->isAuthenticated();
