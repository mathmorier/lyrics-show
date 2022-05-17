<?php
namespace App\Models;
use App\Models\Lyrics as Lyrics;

class ListLyrics
{
    private $idList = [];
    private $listSong = [];
    public function getListSong()
    {
        return $this->listSong;
    }
    public function getIdList()
    {
        return $this->idList;
    }
    public function stToArray($idList = "")
    {
        $this->idList = explode("-", $idList ?? null);
    }
    public function createList()
    {
        $lyrics = new Lyrics;
        foreach ($this->idList as $key => $line) {
            if ($line){
                $temp = $lyrics->getGenuisSong($line);
                $this->listSong[] = [
                    'id' => $temp->id,
                    'api_path' => $temp->api_path,
                    'song_art_image_thumbnail_url' => $temp->song_art_image_thumbnail_url,
                    'title' => $temp->title
                ];
            }
        }
    }
    public function saveNewList()
    {

        // setcookie('saveList', 'test');
        setcookie('saveList', json_encode($this->listSong));
        ob_start();
        ?>
        <script>
            const btnListSave = document.getElementById('btn-save-list')
            btnListSave.addEventListener('click', function(){
                

                let cookies = document.cookie.split(';').
                map(function(el){ return el.split('='); }).
                reduce(function(prev,cur){ prev[cur[0]] = cur[1];return prev },{});

                console.log(cookies['saveList']);
                localStorage.removeItem('saveList')
                localStorage.setItem('saveList', JSON.stringify(json_decode(cookies['saveList'])))
            })
        </script>
        <?php
        return ob_get_clean();       
        
    }
}


?>