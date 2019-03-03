<?php
require_once __DIR__ .'/model/Info.php';
$title = $_POST['title'];
$desc = $_POST['desc'];
$image = $_POST['image'];
if (isset($title) && isset($desc) && isset($image)){
    $id = generateRandomString();
    $obj = new Info();
    $status = $obj->Insert($id,$title,$desc,$image);
    if ($status){
        $arr = array();
        $arr['status'] = 1;
        $port = (int)$_SERVER['SERVER_PORT'] == 80 ? '' : ':'.$_SERVER['SERVER_PORT'];
        $port = (int)$_SERVER['SERVER_PORT'] == 443 ? '' : ':'.$_SERVER['SERVER_PORT'];
        $arr['url'] = $_SERVER['SERVER_NAME'].$port .dirname($_SERVER['REQUEST_URI']) . '/ChuTich.php?id='.$id;
        echo json_encode($arr);
    }else{
        $arr = array();
        $arr['status'] = 0;
        echo json_encode($arr);
    }
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

