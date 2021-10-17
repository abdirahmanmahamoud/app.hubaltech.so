<?php
header('content-type: application/json');
include '../conn/conn.php';

session_start();
if(!$_SESSION['username']){
    $username = $_SESSION['username'];
    header('location: ../index.php');
}

function phplink(){
    $data = array();
    $data_array = array();
    $sa = glob('../des/*.php');
    foreach ($sa as $se) {
        $si_link = explode('/',$se);
        $data_array[] = $si_link[2];
    }
    if(count($si_link) > 0){
        $data = array('status' => true,'data' => $data_array);
    }else{
        $data = array('status' => false, 'data' => 'no file ');
    }
    echo json_encode($data);
}

function reg($db){
    $data =array();
    extract($_POST);
    $s = "INSERT INTO `link`( `name`, `link`, `Category_id`) VALUES('$name','$link','$Category')";
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

    $s = "UPDATE link SET name='$name',link='$link',Category_id='$Category' WHERE id= '$id'";

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

    $s = "DELETE FROM link  WHERE id = '$id'";

    $r = $db -> query($s);
    if($r){
        $data = array('status' => true,'data' => 'Delete link ');
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
    $s = "SELECT * FROM link WHERE id = '$id'";
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
    $s = "SELECT `id`, `name`, `link`, `Category_id` FROM `link` ";
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