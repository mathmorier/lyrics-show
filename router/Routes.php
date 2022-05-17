<?php
namespace Router;

class Routes
{
//The method getRoutes() will return a array with all routes
    public static function getRoutes(): array
    {
        return [
          ['GET', '/', 'Home#index', 'home_index'],
          ['GET', '/lyrics', 'LyricsController#index', 'Lyrics_index'],
          ['GET', '/lyrics/songs/[i:id]', 'LyricsController#firstShow', 'Lyrics_firstShow'],
          ['GET', '/lyrics/list/[*:idList]', 'LyricsController#reciveList', 'Lyrics_reciveList'],
          ['POST', '/lyrics/list', 'LyricsController#addList', 'Lyrics_addList'],
          ['GET', '/os', 'OsController#index', 'Os_index'],
          ['GET', '/os/songs/[i:id]', 'OsController#fileShow', 'Os_FileShow'],
          ['GET', '/xml/os/songs/[i:id]', 'XmlController#osDown', 'xml_osDown']
        ];
    }
}
?>