<?php

/**
 * Класс Router
 * Компонент для роботи з маршрутами
 */
class Router
{

    private $routes;

    /**
     * Конструктор
     */
    public function __construct()
    {
        // шлях до файлу з маршрутами
        $routesPath = ROOT . '/config/routes.php';

        // отримуєм маршрути з файла
        $this->routes = include($routesPath);
        return $this->routes;
        
    }
    
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        
        }
 
        else if(!empty($_SERVER['PATH_INFO'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }
 
        else if(!empty($_SERVER['QUERY_STRING'])) {
            return trim($_SERVER['QUERY_STRING'], '/');
        }        
    }
    
    public function run()
    {
    	if(Url::getLang() === 'ru')
    	{
			$uri = substr($this->getURI(), 3);
		}
		else
		{
			$uri= $this->getURI();
		}
	
	       
        $internalRoute = Url::getInternalRoute($this->routes,$uri);
        $segments = explode('/', $internalRoute);
        /*var_dump($segments);                
        exit;*/
        
        $controller = ucfirst(array_shift($segments)).'Controller';
                        
        $action = 'action'.ucfirst(array_shift($segments));
        
        //якщо затесався GET
        if(preg_match("/\?/", $action) )
        {
			$action = explode('?', $action)[0];
		}
		
		$params = $segments;                
        $controllerFile = ROOT.'/controllers/'.$controller.'.php';
        if(file_exists($controllerFile))
        {
            include($controllerFile);
        }                
        if(!is_callable(array($controller, $action))){  
            
            header('HTTP/1.0 404 Not Found');              
            $error = new ErrorController();
            return $error->action404();
            
        }
        else
        {
			$controllerObj = new $controller();                
        	call_user_func_array(array($controllerObj, $action), $params);
		}				
		        
        return;
    }
}
    
    

