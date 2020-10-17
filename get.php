<?php

#接受所有请求源
header('Access-Control-Allow-Origin:*');
$v_files = varray_rand(Array(
  # ks:tiktok=15:1
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/ks.txt",
  "./video/tiktok.txt"
));

$url = trim(varray_rand(file($v_files)));
$type = $_GET['type'];
if($type && $type === "youmei_app"){
  #指定返回数据为json utf-8
  header('Content-type:application/json; charset=utf-8');
  retndata(1,$url);
  return;
}

header("Location: ".$url);
#指定返回数据为MP4视频
header("Content-Type: video/mp4");

function rarray_rand( $arr ){
    return mt_rand(0, count( $arr ) - 1 );
}
function varray_rand( $arr ) {
    return $arr[rarray_rand($arr)];
}

function retn($code,$str){
    echo(json_encode([
        "code"=>$code,
        "msg"=>$str
    ],JSON_UNESCAPED_UNICODE));
}

function retndata($code,$data){
    echo(json_encode([
        "code"=>$code,
        "data"=>$data
    ],JSON_UNESCAPED_UNICODE));
}