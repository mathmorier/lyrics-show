<?php
namespace App\Controllers;

class EditController  
{
    public function list()
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/editList.css">'
            ],
            'script' => [
                '<script src="/js/editList.js"></script>']
        ];

        ob_start();
        require __DIR__.'/../views/editList.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }
}


?>