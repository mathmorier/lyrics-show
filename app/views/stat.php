<h1>Statistic</h1>

<?php
    foreach ($main['data'] as $key => $line) {
        echo '<div><h3>'.$key.'</h3>';
        foreach ($line as $key2 => $value) {
            echo $key2.' : '.$value.'<br>';
        }
        echo '</div>';
    }
?>
