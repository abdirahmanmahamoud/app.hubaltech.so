<?php
header('content-type: application/json');
include '../conn/conn.php';
session_start();
if(!$_SESSION['username']){
    $username = $_SESSION['username'];
    header('location: ../index.php');
}
$user = $_SESSION['id'];

function reg($db){
    $user = $_SESSION['id'];
    $data =array();
    extract($_POST);
    $s = "CALL reg_expense('','$amount','$type','$description','$user')";
    $r = $db->query($s);
    if($r){
        $row = $r->fetch_assoc();
        if($row['message'] == 'bal'){
            $data = array('status' => false, 'data' => 'haraagaagu kuguma filna');
        }
        elseif($row['message'] == 'registration'){ 
            $data = array('status' => true,'data' => 'is sax hay ayaah u diwaangalisar');
        }
    }else{
        $data = array('status' => false, 'data' => $db->error);
    }
    echo json_encode($data);
}

function update($db){
    $data = array();
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    $s = "UPDATE expense SET amount='$amount',type='$type',description='$description' WHERE id= '$id'";

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

    $s = "DELETE FROM expense  WHERE id = '$id'";

    $r = $db -> query($s);
    if($r){
        $data = array('status' => true,'data' => 'Delete expense ');
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
    $s = "SELECT * FROM expense WHERE id = '$id'";
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
    $user = $_SESSION['id'];
    $date = array();
    $mess = array();
    $s = "SELECT `id`, `amount`, `type`, `description`,  `date` FROM `expense` WHERE userid='$user' ";
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
    $user = $_SESSION['id'];
    $date = array();
    $mess = array();
    extract($_POST);
    $s = "CALL user_expense('$user','$fromdate','$todate')";
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