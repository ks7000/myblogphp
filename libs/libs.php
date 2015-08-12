<?php


// Obtener fechas mas amigables
function prettyDate($date){
    $time = strtotime($date);
    $now = time();
    $ago = $now - $time;
    if($ago < 60){
        $when = round($ago);
        $s = ($when == 1)?"second":"seconds";
        return "$when $s ago";
    }elseif($ago < 3600){
        $when = round($ago / 60);
        $m = ($when == 1)?"minute":"minutes";
        return "$when $m ago";
    }elseif($ago >= 3600 && $ago < 86400){
        $when = round($ago / 60 / 60);
        $h = ($when == 1)?"hour":"hours";
        return "$when $h ago";
    }elseif($ago >= 86400 && $ago < 2629743.83){
        $when = round($ago / 60 / 60 / 24);
        $d = ($when == 1)?"day":"days";
        return "$when $d ago";
    }elseif($ago >= 2629743.83 && $ago < 31556926){
        $when = round($ago / 60 / 60 / 24 / 30.4375);
        $m = ($when == 1)?"month":"months";
        return "$when $m ago";
    }else{
        $when = round($ago / 60 / 60 / 24 / 365);
        $y = ($when == 1)?"year":"years";
        return "$when $y ago";
    }
}

//evitar el cache de archivos
function last_version($file_name) {
    echo $file_name ."?v=". filemtime($file_name);
}

function DTIME(){
    $date = date_create();
    return date_timestamp_get($date);
}
//obtener la url
function pwd(){
    $url="http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
    return $url;
}


global $palabras;
$GLOBALS['palabras'] = array(
          ' a ',' ah ', ' al ', ' alla ',' alo ',' ano ',' ante ',' anti ',' am ',' aquel ', ' aquellos ',' aquellas ',' ay ',
                  ' asi ',
          ' bajo ', ' bien ',' bueno ',
          ' casi ',' con ', ' contra ', ' coma ', ' comer ',' como ', ' cÃ³mo ', ' cambiar ',
          ' da ',' dando ',' de ' , ' del ', ' dejar ',' desde ',' di ', ' dia ', 'dice',' donde ',' dijo ',' don ',
          ' e ', ' el ', ' ella ', ' ellas ', ' ellos ',' en ' ,' entonces ', ' entre ', ' era ',' es ', ' esa ',' ese ',
          ' esas ',' eso ',' esos ',' esta ', ' estan ',' estas ',' esto ',' estos ',
          ' fue ',' fueron ',' fuese ',' fuesen ',' fui ',' fuimos ', ' full ',
              ' ha ', ' habian ',' hacia ',' halla ', ' hallar ', ' hasta ', ' haya ',' hayan ',' hayamos ',' hayaron ',' hubo ',
                  ' i ',' iban ',' idem ',' in ',' ir ',' irian ',' item ',
                  ' ja ',' jamas ',' je ',' ji ',' juntos ',
          ' kill ',
            ' la ', ' las ', ' lanza ',' le ',' les ',' lo ', ' los ',
          ' mas ',  ' matar ', ' me ', ' mes ',' mejor ',  ' mi ',' mias ',' mios ', ' mis ',' mucho ',
          ' nada ',' nadie ',' ni ',' ninguno ',' no ', ' nos ',' nosotros ',' numero ',' numeros ',
           ' o ', ' on ',' orto ',
          ' para ',' paran ',' peor ', ' pm ', ' por ',' poco ',' pondra ',' pondran ',' porque ',' puede ',' pueden ',' puedes ',
                  ' pudo ',' punto ',
          ' que ', ' quien ', ' quienes ',' quiere ',' quieren ',' quiero ',' quisiera ', ' quisieran ',' quisieras ',' quiso ',
          ' se ', ' sera ',' si ', 'sin', ' sino ',' sobre ', ' solo ',' su ', ' sus ',
          ' tambien ',' te ', ' the ', ' to ',' tu ',' tus ',' tuyas ', 'tuyos ',
           ' u ', ' un ', ' una ',' unas ',' uno ',' unos ',
          ' vamos ',' van ',' viene ',' vienen ',' vosotros ',' vive ',' voy ',' vuelve ',
          ' y ', ' ya ',' yo ',
          '/', '#','&','(',')','.',',',';',':','-','*','{','}','[',']','<','>','$','%','=','@','?','!','"','+','Â¿',' | ',
          '1','2','3','4','5','6','7','8','9','0');

function FSPATH($str) {
    $search = array('&lt;', '&gt;', '&quot;', '&amp;');
    $str = str_replace($search, '', $str);
    $search = array('&aacute;','&Aacute;','&eacute;','&Eacute;','&iacute;','&Iacute;','&oacute;','&Oacute;','&uacute;','&Uacute;','&ntilde;','&Ntilde;');
    $replace = array('a','a','e','e','i','i','o','o','u','u','n','n');
    $search = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '_', '-');
    $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n', ' ', ' ');
    $str = str_replace($search, $replace, $str);
    $str = preg_replace('/&(?!#[0-9]+;)/s', '', $str);
    $search = $GLOBALS['palabras'];
    $str = str_replace($search, ' ', strtolower($str));
    $str = str_replace($search, $replace, strtolower(trim($str)));
    $str = preg_replace("/[^a-zA-Z0-9\s]/", '', $str);
    $str = preg_replace('/\s\s+/', ' ', $str);
    $str = str_replace(' ', '-', $str);
return substr($str, 0, 30);
}

?>
