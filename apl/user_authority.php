<?php
header('content-type: application/json');
include '../conn/conn.php';
session_start();
if(!$_SESSION['username']){
    $username = $_SESSION['username'];
    header('location: ../index.php');
}
$user = $_SESSION['id'];

function khar($db){
    $date = array();
    $mess = array();
    $s = "SELECT Category.id,category.name,category.icon,category.role,link.id link_id, link.name name_link,action.id action_id,action.name name_action FROM Category LEFT JOIN link ON Category.id = link.Category_id LEFT JOIN action ON link.id = action.link_id ORDER BY Category.role,link.id,action.id";
    $r = $db->query($s);
    if($r){
        while($row = $r->fetch_assoc()){
            $date [] = $row;
        }
        $mess = array('status' => true,'data' => $date);
    }else{
        $mess = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($mess);
}

function user_authority($db){
    extract($_POST);
    $date = array();
    $mess = array();
    $s = "CALL user_authority('$user_id')";
    $r = $db->query($s);
    if($r){
        while($row = $r->fetch_assoc()){
            $date [] = $row;
        }
        $mess = array('status' => true,'data' => $date);
    }else{
        $mess = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($mess);
}

function user_menu($db){
    $user = $_SESSION['id'];
    extract($_POST);
    $date = array();
    $mess = array();
    $s = "CALL user_menu('$user')";
    $r = $db->query($s);
    if($r){
        while($row = $r->fetch_assoc()){
            $date [] = $row;
        }
        $mess = array('status' => true,'data' => $date);
    }else{
        $mess = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($mess);
}

function reg($db){
    extract($_POST);
    $data =array();
    $success = array();
    $error = array();
    $del = "DELETE FROM `user_authority` WHERE user_id = '$user_id'";
    $db = new mysqli('localhost','hblt_hubaal','Maryan@1234567890','hblt_hubaal');
    $delete = $db->query($del);
    if($delete){
        for($i = 0; $i < count($action_id); $i++){
            $s = "INSERT INTO `user_authority`(`user_id`, `action`) VALUES ('$user_id','$action_id[$i]')";
            $r = $db->query($s);
            if($r){
                $success [] = array('status' => true,'data' => 'waa la diwaangeliyah');
            }else{
                $error [] = array('status' => false, 'data' => $db->error);
            }
        }
    }else{
        $error [] = array('status' => false, 'data' => $db->error);
    }
    if(count($success) > 0 && count($error) == 0){
        $data = array('status' => true,'data' => 'waa sax user authority');
    }elseif(count($error) > 0){
        $data  = array('status' => false, 'data' => $error);
    }
    if(count($error) > 0 && count($success) == 0){
        $data = array('status' => false, 'data' => $error);
    }
  
    echo json_encode($data);
}



if(isset($_POST['action'])){
    $action = $_POST['action'];
    $action($db);
}
else{
    echo json_encode(array('status' => false, 'data' => 'action ma jiro'));
}
?>
