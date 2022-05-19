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
                if ($temp) {
                    $this->listSong[] = [
                        'id' => $temp->id,
                        'api_path' => $temp->api_path,
                        'song_art_image_thumbnail_url' => $temp->song_art_image_thumbnail_url,
                        'title' => $temp->title
                    ];
                }
            }
        }
    }
    public function saveNewList()
    {
        ob_start();
        ?>
        <script>
            const btnListSave = document.getElementById('btn-save-list')
            btnListSave.addEventListener('click', function(){
                if (confirm("To save this list you must delete your current list !\n\nAre you sure you want to delete your current list?")) {
                    let listNew = <?=json_encode($this->listSong);?>;
                    localStorage.setItem('saveList', JSON.stringify(listNew))
                    if (listNew == []) {
                        window.location.href = "/lyrics" + listNew[0].api_path
                    }else{
                        window.location.href = "/"
                    }
                }
            })
        </script>
        <?php
        return ob_get_clean();       
        
    }
}


?>