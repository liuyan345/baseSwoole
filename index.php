<?php
$host = "0.0.0.0";
$port = "9501";
$serv = new swoole_server($host,$port);

/**
 * $host 127.0.0.1 本地
 *       112.212.1.2 外网监听iP
 *       0.0.0.0 多地址监听
 * $port 端口号
 * $mode  SWOOLE_PROCESS 多进程的方式
 * $socke_type SWOOLE_SOCK_TCP
 *
 * */

// 使用
/**
 * $event
 * connect  建立链接  $serv 服务器信息 $fd:客户端信息
 * receive  接收到数据 $serv 服务器信息  $fd 客户端信息 $form_id 客户端id $data 传递的数据
 * close    关闭链接
 *
*/
$serv->on("connect",function($serv,$fd){
   echo "建立\n";
});
$serv->on("receive",function($serv,$fd,$form_id,$data){
    echo "接收\n";
    var_dump($data);
});
$serv->on("close",function($serv,$fd){
   echo "关闭\n";
});

//启动服务器
$serv->start();


?>