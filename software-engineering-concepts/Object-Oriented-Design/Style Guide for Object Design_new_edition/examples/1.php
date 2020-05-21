<?php 

class Router
{
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($route): string
    {
        if (array_key_exists($route, $this->routes))
        {
            return $this->routes[$route];
        }        
    }
}

$routes = array(
    "/" => "https://omensah.github.io",
    "/resume" => "https://omensah.github.io/resume", 
    "/contact" => "https://omensah.github.io/contact"
);
$routers = new Router($routes);
echo $routers->route("/aaa");