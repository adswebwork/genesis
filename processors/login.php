<?php
header('Content-type: text/javascript');
$password = '_1';

$json = array(
    'success' => false,
    'message' => 'Invalid login'
);

if(isset($_POST['password'])){
    $pw = $_POST['password'];
    if($pw === $password){
        $json['success'] = true;
        $json['message'] = 'Successful user login';
        print json_encode($json);
    }else{
        print json_encode($json);
    }
}



