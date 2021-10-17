<?php
header('content-type: application/json');
include '../conn/conn.php';

session_start();
if(!$_SESSION['username']){
    $username = $_SESSION['username'];
    header('location: ../index.php');
}


function update_user($db){
    extract($_POST);
    $user_id = $_SESSION['id'];
    $data =array();
    if($_FILES['image']['name']){
        $er = array();
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $all_inage = ['image/jpg','image/jpeg','image/png'];
        $max_size = 5 * 1024 * 1024;
    
        if(in_array($file_type,$all_inage)){
            if($file_size > $max_size){
                $er[]='file size lama hugala'; 
            }
        }else{
            $er[]='nuuca fileka lama hugala';
        }
        extract($_POST);
        $save_name = $id . '.png';
    
        if(count($er) <= 0){
            $s = "UPDATE users SET magaca_koobad ='$magaca_koobad',magaca_labaad= '$magaca_labaad', username='$username',password='$password' WHERE id= '$user_id'";
            $r = $db->query($s);
            if($r){
                move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$save_name);
                $data = array('status' => true,'data' => 'is sax hay ayaah loo updategareey');
        
            }else{
                $data = array('status' => false, 'data' => $db->error);
            }
        }else{
            $data = array('status' => false, 'data' => $er);
        }
    }
    else{
        extract($_POST);
        $s = "UPDATE users SET magaca_koobad ='$magaca_koobad',magaca_labaad= '$magaca_labaad', username='$username',password='$password' WHERE id= '$user_id'";
        $r = $db -> query($s);
        if($r){
            $data = array('status' => true,'data' => 'is sax hay ayaah loo updategareey');
        }
        else{
            $data = array('status' => false, 'data' => $db->error);
        }
    }
    echo json_encode($data);
}

function all($db){
    $date = array();
    $mess = array();

    $id = $_SESSION['id'];

    $s = "SELECT * FROM users WHERE id = '$id'";
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