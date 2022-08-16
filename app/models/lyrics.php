<?php
namespace App\Models;

class Lyrics  
{

    public function getGenuisSong($id)
    {
        $path = "/songs/".$id;
        $api = 'https://api.genius.com';
        $token = 'xkHGfcbtHLNZuvfUoHkz9ioSIISH7YsnvQSO_Mav4y9E2c-Z3iTo5FbzJqHb_fyI';
        $url = $api.$path.'?access_token='.$token;
        if (get_http_response_code($url) == 200) {
            $res = json_decode(file_get_contents($url));
            return $res->response->song;
        }else{
            return null;
        }
    }
    public function getShirSong($id, $embedContent = true)
    {
        $url = 'http://shir.fr/w/api.php?action=query&format=json&pageids='.$id;
        if (get_http_response_code($url) == 200) {
            $res = json_decode(file_get_contents($url));

            $song['id'] = 'S'.$id;
            $song['api_path'] = "/shir/".$id;
            $song['song_art_image_thumbnail_url'] = 'http://shir.fr/w/shir-carre-150.png';
            $song['title'] = $res->query->pages->$id->title ?? 'no-name';

            if ($embedContent && isset($res->query->pages->$id->title)) {

                $url = "http://shir.fr/chant/paroles/".$res->query->pages->$id->title.".html";
                
                $file_headers = @get_headers($url);
                if      (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found')    {return null ;}
                elseif  ($file_headers[0] == 'HTTP/1.1 403 Forbidden')                      {return null ;}
    
                $source_code = file($url);
        
                $copy = false;
                $table = [];
    
                for ($i=0; $i < count($source_code); $i++) { 
                    $copy = str_contains($source_code[$i], "<div class='title'>")  ? true  : $copy ;
                    $copy = str_contains($source_code[$i], "<div class='footer'>") ? false : $copy ;
                    if ($copy) { 
                        $source_code[$i] = str_replace("\n", "<br>", $source_code[$i]);
                        $source_code[$i] = str_replace("</div><br>", "</div>", $source_code[$i]);
                        array_push($table, $source_code[$i]); 
                    }
                }
                ob_start();
                echo '<div class="rg_embed shir">';
                foreach ($table as $line ) { echo $line; }
                echo '</div>';
                $song['embed_content'] = ob_get_clean();
            }

            return json_decode(json_encode($song));
            
        }else{
            return null;
        }
    }
    public function createLinkSave($song = null)
    {
        ob_start();
        ?>
        <script>
            localStorage.setItem('id',                        '<?=$song->id ?? null?>' );
            localStorage.setItem('api_path',                        '<?=$song->api_path ?? null?>' );
            localStorage.setItem('song_art_image_thumbnail_url',    '<?=$song->song_art_image_thumbnail_url ?? null?>' );
            localStorage.setItem('title',                           '<?=$song->title ?? null?>' );
        </script>
        <?php
        return ob_get_clean();       
        
    }
    public function getLyricsToGenuis($id = null)
    {
        $lyric = [];
        if ($id != null) {
            $url = "https://genius.com/songs/".$id."/lyrics";

            $file_headers = @get_headers($url);
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                return null ;
            }elseif ($file_headers[0] == 'HTTP/1.1 403 Forbidden') {
                return null ;
            }

            $source_code = file($url);
 
            $start = $end = 0;
        
            $searchEnd = false;
            foreach ($source_code as $line_number => $last_line) {
                if (strpos($last_line, '<div id="main">')) {
                    $start = $line_number;
                    $searchEnd = true;
                }
                if (strpos($last_line, '</div>') && $searchEnd) {
                    $end = $line_number;
                    $searchEnd = false;
                }
            }
            $chorsNum = $BridgeNum = "";
            for ($i=$start+1; $i<$end ; $i++) { 
                
                $source_code[$i] = str_replace("</a>", "", $source_code[$i]);
                if (strpos($source_code[$i], "href")) {
                    $pos = strpos($source_code[$i], ">");
                    $source_code[$i] = substr($source_code[$i], $pos + 1);
                }
                $source_code[$i] = str_replace("<br>\n", "", $source_code[$i]);
                $source_code[$i] = str_replace("<p>", "", $source_code[$i]);
                $source_code[$i] = str_replace("</p>", "", $source_code[$i]);
                $source_code[$i] = str_replace("[Verse ", "[V", $source_code[$i]);
                $source_code[$i] = str_replace("[Couplet ", "[V", $source_code[$i]);
                $source_code[$i] = str_replace("[Chorus", "[C", $source_code[$i]);
                $source_code[$i] = str_replace("[Refrain", "[C", $source_code[$i]);
                $source_code[$i] = str_replace("[Bridge", "[B", $source_code[$i]);
                $source_code[$i] = str_replace("[Pont", "[B", $source_code[$i]);
                $source_code[$i] = str_replace("\n", "", $source_code[$i]);
                $source_code[$i] = str_replace("      ", "", $source_code[$i]);

                
                if (str_contains( $source_code[$i] , '[C')) {

                    $source_code[$i] = '[C'.$chorsNum.']';
                    if ($chorsNum == "") {$chorsNum = 1;}
                    $chorsNum += 1 ;
                }
                if (str_contains( $source_code[$i] , '[B')) {
                    $source_code[$i] = '[B'.$BridgeNum.']';
                    if ($BridgeNum == "") {$BridgeNum = 1;}
                    $BridgeNum += 1 ;
                }

        
                if ($source_code[$i] != "") {
                    array_push($lyric, $source_code[$i]);  
                }

            }
        }
        return $lyric; 
    }

}


?>