<?php
namespace Router;

class Routes
{
//The method getRoutes() will return a array with all routes
    public static function getRoutes(): array
    {
        return [
          ['GET', '/', 'Home#index', 'home_index']
        ];
    }
}
?>