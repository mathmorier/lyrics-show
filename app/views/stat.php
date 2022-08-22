<h1>Statistic</h1>
<a class="btn" href="/">Back home page</a>
<div class="stat">
<?php
    foreach ($main['data'] as $key => $line) {
        echo '<div class="box"><h3>'.$key.'</h3>';
        foreach ($line as $key2 => $value) {
            echo '<div><p>'.$key2.' :</p><p>'.$value.'</p></div>';
        }
        echo '</div>';
    }
?>
</div>
