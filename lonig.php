<?php
header('content-type: application/json');
include 'conn.php';
session_start();

function lonig($db){
    extract($_POST);
    $date = array();
    $mess = array();
    $s = "CALL lonig('$username','$password')";
    $r = $db->query($s);
    if($r){
        $row = $r->fetch_assoc();
        if(isset($row['message'])){
            if($row['message'] == 'dey'){
                $mess = array('status' => false, 'data' => 'username iyo password is malaha');
            }else{
                $mess = array('status' => false, 'data' => 'maamulaha ha soo fasu user kan');
                
            }
        }else{
            foreach($row as $key => $value){
                $_SESSION[$key] = $value;
            }
            $mess = array('status' => true,'data' => 'waa sax');
        }

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