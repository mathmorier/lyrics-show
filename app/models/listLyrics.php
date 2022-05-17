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
}


?>