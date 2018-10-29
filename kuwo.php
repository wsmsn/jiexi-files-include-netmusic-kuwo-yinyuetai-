<?php
/**
  * 获取酷我音乐歌曲下载地址
  */
  
function getKuwoMusic($sid,$format){
    $ch = curl_init();
    $srcURL = 'http://antiserver.kuwo.cn/anti.s?type=convert_url&rid=MUSIC_' . $sid . '&format=' . $format;
    curl_setopt($ch, CURLOPT_URL, $srcURL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $re = curl_exec($ch);
    curl_close($ch);
    return $re;
}

$sid = $_GET['id'] ?? 0;
$format = $_GET['format'] ?? "mp3";
if($sid != 0){
    header('HTTP/1.1 301 Moved Permanently');
    header('User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'); 
    header('Content-type: application/octet-stream'); 
    header('Location: '.getKuwoMusic($sid));
    exit; 
}  

?>

<!DOCTYPE html>
<html>
    <head>
        <title>酷我音乐</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    </head>
    <body>
    <h1>酷我音乐 Kuwo Music</h1>
    <h3>简单易用 Easy To Use<br />第一步：获取歌曲编号 / Frist Step : Get Song ID<br />第二步：下载歌曲 / Last Step : Download MP3 File</h3>
    <p>(0) http://www.kuwo.cn/yinyue/<b>4168456</b>/<br />(1) /kw.php<b>?id=4168456&format=aac</b><br/>(3) 有以下格式：aac，mp3，wma，ape <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>下载。Download.</b></p>
    </body>
</html>
