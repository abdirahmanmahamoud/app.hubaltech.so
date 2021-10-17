<?php
header('content-type: application/json');
include '../conn/conn.php';

session_start();
if(!$_SESSION['username']){
    $username = $_SESSION['username'];
    header('location: ../index.php');
}

function reg($db){
    $data =array();
    extract($_POST);
    $s = "INSERT INTO `action`( `name`, `action`, `link_id`) VALUES('$name','$actions','$link')";
    $r = $db->query($s);
    if($r){
        $data = array('status' => true,'data' => 'is sax hay ayaah u diwaangalisar');
    }else{
        $data = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($data);
}

function update($db){
    extract($_POST);

    $s = "UPDATE action SET name='$name',action='$actions',link_id='$link' WHERE id= '$id'";
    $r = $db -> query($s);
    if($r){
        $data = array('status' => true,'data' => 'is sax hay ayaah loo updategareey');
    }
    else{
        $data = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($data);
}

function delete($db){
    $data = array();
    $id = $_POST['id'];

    $s = "DELETE FROM action  WHERE id = '$id'";

    $r = $db -> query($s);
    if($r){
        $data = array('status' => true,'data' => 'Delete action ');
    }
    else{
        $data = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($data);
}

function all($db){
    $date = array();
    $mess = array();

    $id = $_POST['id'];
    $s = "SELECT * FROM action WHERE id = '$id'";
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

function khar($db){
    $date = array();
    $mess = array();
    $s = "SELECT `id`, `name`, `action`, `link_id` FROM `action`";
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

function user_expense($db){
    $date = array();
    $mess = array();
    extract($_POST);
    $s = "CALL user_expense('CR001','$fromdate','$todate')";
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
if(isset($_POST['action'])){
    $action = $_POST['action'];
    $action($db);
}
else{
    echo json_encode(array('status' => false, 'data' => 'action ma jiro'));
}
?>