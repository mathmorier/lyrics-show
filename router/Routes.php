<?php
namespace Router;

class Routes
{
//The method getRoutes() will return a array with all routes
    public static function getRoutes(): array
    {
        return [
          ['GET', '/', 'Home#index', 'home_index'],
          ['GET', '/help', 'HelpController#index', 'help_index'],
          ['GET', '/lyrics', 'LyricsController#index', 'Lyrics_index'],
          ['GET', '/lyrics/songs/[i:id]', 'LyricsController#firstShow', 'Lyrics_firstShow'],
          ['GET', '/lyrics/list/[*:idList]', 'LyricsController#reciveList', 'Lyrics_reciveList'],
          ['GET', '/os', 'OsController#index', 'Os_index'],
          ['GET', '/os/songs/[i:id]', 'OsController#fileShow', 'Os_FileShow'],
          ['GET', '/os/shir/[i:id]', 'OsController#shirShow', 'Os_ShirShow'],
          ['GET', '/xml/os/songs/[i:id]', 'XmlController#osDown', 'xml_osDown'],
          ['GET', '/edit/list', 'EditController#list', 'edit_list'],
          ['GET', '/lyrics/shir/[i:id]', 'LyricsController#shirShow', 'Lyrics_shirShow'],
          ['GET', '/shir/api', 'LyricsController#apiAsk', 'Lyrics_apiAsk'],
          ['GET', '/stat', 'statController#index', 'stat'],
          ['GET', '/create/[i:success]?', 'SongTVController#create', 'create'],
          ['POST', '/create', 'SongTVController#createPost', 'create_post']
        ];
    }
}
?>