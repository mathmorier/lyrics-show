<?php
namespace App\Controllers;

class HelpController  
{
    public function index($params)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/help.css">'
            ],
            'script' => []
        ];

        ob_start();
        require __DIR__.'/../views/help.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
        
    }
}

?>