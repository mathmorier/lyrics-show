<?php
namespace App\Models;

class Bible
{
    private $version = 'en_kjv';
    private $book = null;
    private $reference = null;

    public function getIndexFile()
    {
        return json_decode(file_get_contents(__DIR__.'/../src/bibles/index.json'));
    }
    public function getBibleFile()
    {

        try {
            return json_decode(file_get_contents(__DIR__.'/../src/bibles/'.$this->version.'_n.json'));
        } catch (\Throwable $th) {
            try {
                return json_decode(file_get_contents(__DIR__.'/../src/bibles/'.$this->version.'.json'));
            } catch (\Throwable $th) {
                return null;
            }
        }

        
    }
    public function getAllVersions()
    {     
        $table = [];
        $index = $this->getIndexFile();

        foreach ($index as $lang) {
            foreach ($lang->versions as $version) {
                array_push($table, [
                    'name'=>$version->name,
                    'abbreviation'=>$version->abbreviation,
                    'language'=>$lang->language,
                    'path'=>'/bible/'.$version->abbreviation
                ]);
            }
        }

        return $table;
    }
    public function setVersion($version = 'en_kjv')
    {
        $this->version = $version;
    }
    public function setBook($book = null)
    {
        $this->book = $book;
    }
    public function setReference($reference = null)
    {
        $this->reference = $reference;
    }
    public function getVersion()
    {
        return $this->version;
    }
    public function getBible()
    {
        $bible = $this->getBibleFile();

        return $bible;
    }
    public function getBook()
    {
        $books = [];
        if ($this->book != null) {
            foreach ($this->getBibleFile() as $book) {
                if ($book->abbrev == $this->book) {
                    $books = $book;
                }
            }
            // Correction Erreur numéro (départ 0 -> départ 1)
            $new = [];
            for ($i=0; $i < count($book->chapters); $i++) { 
                $new[$i+1] = $book->chapters[$i];
            }
            $books->chapters = $new;
        }
        return $books;
    }

    public function getBookByNum($num = 1)
    {
        $bible = $this->getBibleFile('fr_apee');
        return $bible[$num-1];
    }

    public function getReference()
    {

        $ref = explode("-",$this->reference);
        $start = explode("v",$ref[0]);
        $end = explode("v", $ref[1]??$ref[0]);

        $start[0] = ($start[0]=="")? "1":$start[0];
        $end[0] = ($end[0]=="")?$start[0]:$end[0];
        $end[0] = ($end[0]<$start[0])?$start[0]:$end[0];
        
        $book = $this->getBook();

        try {
            // Choose Chapter Slice
            $book->chapters = array_slice($book->chapters, $start[0]-1, $end[0]-$start[0]+1);
            // Cut the end of verse
            $book->chapters[count($book->chapters)-1] = array_slice($book->chapters[count($book->chapters)-1],0 , $end[1]??count($book->chapters[count($book->chapters)-1])) ;
            // Cut the beginig of verse
            $book->chapters[0] = array_slice($book->chapters[0], ($start[1]??1)-1 , count($book->chapters[0]));
            
            $new = [];
            for ($i=0; $i < count($book->chapters); $i++) { 
                $new[$i+$start[0]] = $book->chapters[$i];
            }
            $book->chapters = $new;

        } catch (\Throwable $th) {
        }


        return $book;

    }


}
?>