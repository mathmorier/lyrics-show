<?php
namespace App\Controllers;

class HelpController  
{
    public function index($params)
    {
        $main = [
            'head' => [],
            'script' => []
        ];

        ob_start();
        ?><h2>HELP</h2><?php
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
        
    }
}

?>