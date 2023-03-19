<?php
$filesName = "en_bbe";

$json = json_decode(file_get_contents(__DIR__.'/'.$filesName.'.json'));

for ($i=0; $i < count($json); $i++) { 
    for ($i2=0; $i2 < count($json[$i]->chapters); $i2++) { 
        for ($i3=0; $i3 < count($json[$i]->chapters[$i2]); $i3++) {
            $json[$i]->chapters[$i2][$i3] = ($i3+1).'. '.$json[$i]->chapters[$i2][$i3];
            // echo '<p>'.$json[$i]->chapters[$i2][$i3].'</p>';
        }
    }
}

$new_data = json_encode($json, JSON_PRETTY_PRINT);

if (file_put_contents(__DIR__.'/'.$filesName.'_n.json', $new_data)) {
    echo "success";
} else {
    echo "fail";
}




?>
