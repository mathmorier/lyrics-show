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
        ?>
        <div>
            <a href="/"><< back to Home</a>
            <h2>HELP</h2>
            <p>Coming Soon</p>
            <a href="https://webmm.ch" target="_blank" rel="noopener noreferrer">Website of devlopper</a>
            <br>
        </div>
        
        
        <?php
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
        
    }
}

?>