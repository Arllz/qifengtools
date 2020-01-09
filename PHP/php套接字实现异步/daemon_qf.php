<?php
pcntl_signal(SIGHUP, function(){
    file_put_contents('logs.txt', 'pid : ' . posix_getpid() . ' receive SIGHUP 信号' . PHP_EOL);
});

$x=1;
while($x<=20) {
    $x++;echo $x;
    if($x == 20){
        $x = 1;
        sleep(10);
    }

    $url = "http://192.168.2.162:1091/welcome/out_rabbit_tranact";
    $param = array();
    $urlinfo = parse_url($url);
    $host = $urlinfo['host'];
    $path = $urlinfo['path'];
    $query = isset($param)? http_build_query($param) : '';
    $port=1091; $errno=0; $errstr=''; $timeout=10;
    $fp = fsockopen($host, $port, $errno, $errstr, $timeout);
    if (!$fp) { return false;}
    $out = "POST ".$path." HTTP/1.1\r\n";
    $out .= "host:".$host."\r\n";
    $out .= "content-length:".strlen($query)."\r\n";
    $out .= "content-type:application/x-www-form-urlencoded\r\n";
    $out .= "connection:close\r\n\r\n";
    $out .= $query;

    fputs($fp, $out);
    fclose($fp);
}



















