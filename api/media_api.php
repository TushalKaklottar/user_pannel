<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $temp = $_FILES;
        $des = "../images/";

        // print_r($temp); $temp = $_FILES;

        $path = $temp['name']['tmp_name'];
        $name = $temp['name']['name'];

        $imagepath = "../image/" . uniqid("img") . $name;
        move_uploaded_file($path,$imagepath);

        $upload = $config->media_table($name,$imagepath);

        if($upload) {
            $res['msg'] = "image upload";
        }
        else{
            $res['msg'] = "image can't upload";
        }

        print_r($temp);


    }
    else {
        $res['msg'] = "Only POST method is allowed...";
    }

    echo json_encode($res);

?>