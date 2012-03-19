<?php

    class User
    {
        //Dependency Injection Container.
        protected $container;
        public function __construct(Container $container) {
            $this->container = $container;
        }
        public function setParameter($key, $value)
        {
            $this->container->get('storage')->set($key, $value);
        }
        public function getParameter($key)
        {
            return $this->container->get('storage')->get($key);
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
                
        public function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }
        
        public function get($key)
        {
            return isset($_SESSION[$key])?$_SESSION[$key]:null;
        }
    }
    
    $c = new Container();
    // Данными настройками очень просто управлять из одного места, 
    // для этого можно использовать ini, yaml, xml или просто php array.
    $c->register('storage', 'SessionStorage', array(
        'cookie_name' => 'PHP_SESSION_ID'
        ));
    
    $user = new User($c);
    
    if($user->getParameter('id')!==null)
    {
        $user->setParameter('id', $user->getParameter('id')+1);
    }else
    {
        $user->setParameter('id', 1);
    }

    echo $user->getParameter('id');
?>
