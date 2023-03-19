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
          ['GET', '/os/tvsong/[i:id]', 'OsController#tvSongShow', 'Os_tvSongShow'],
          ['GET', '/xml/os/songs/[i:id]', 'XmlController#osDown', 'xml_osDown'],
          ['GET', '/xml/os/tvsong/[*:id]', 'XmlController#osTvDown', 'xml_osTvDown'],
          ['GET', '/edit/list', 'EditController#list', 'edit_list'],
          ['GET', '/lyrics/shir/[i:id]', 'LyricsController#shirShow', 'Lyrics_shirShow'],
          ['GET', '/lyrics/tvsong/[i:id]', 'LyricsController#tvSongShow', 'Lyrics_tvSongShow'],
          ['GET', '/shir/api', 'LyricsController#apiAsk', 'Lyrics_apiAsk'],
          ['GET', '/stat', 'statController#index', 'stat'],
          ['GET', '/tvsong', 'TvSongController#listSong', 'listSong'],
          ['GET', '/tvsong/up/[i:id]', 'TvSongController#upSong', 'upSong'],
          ['POST', '/tvsong/up/[i:id]/[*:token]', 'TvSongController#upSongPost', 'upSongPost'],
          ['GET', '/tvsong/create', 'TvSongController#createSong', 'createSong'],
          ['POST', '/tvsong/create/[*:token]', 'TvSongController#createSongPost', 'createSongPost'],
          ['GET', '/tvsong/del/[i:id]', 'TvSongController#delSong', 'delSong'],
          ['POST', '/tvsong/del/[i:id]/[*:token]', 'TvSongController#delSongPost', 'delSongPost'],
          ['GET', '/tvsong/api', 'TvSongController#apiAskSong', 'apiAskSong'],
          ['GET', '/bible', 'BibleController#index', 'Bible_index']

        ];
    }
}
?>