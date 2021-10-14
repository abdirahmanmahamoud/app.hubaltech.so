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

    $new_id = new_id($db);
    $save_name = $new_id . '.png';
    extract($_POST);

    if(count($er) <= 0){
        $s = "INSERT INTO `users`(`id`, `username`, `password`,`image`) VALUES('$new_id','$username','$password','$save_name')";
        $r = $db->query($s);
        if($r){
            move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$save_name);
            $data = array('status' => true,'data' => 'is sax hay ayaah u diwaangalisar');
    
        }else{
            $data = array('status' => false, 'data' => $db->error);
        }
    }else{
        $data = array('status' => false, 'data' => $er);
    }
    echo json_encode($data);
}

function update_user($db){
    extract($_POST);
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
            $s = "UPDATE users SET username='$username',password='$password' WHERE id= '$id'";
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
        $s = "UPDATE users SET username='$username',password='$password' WHERE id= '$id'";
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



function delete($db){
    $data = array();
    extract($_POST);

    $s = "DELETE FROM users  WHERE id = '$id'";

    $r = $db -> query($s);
    if($r){
        unlink('../images/'.$id.'.png');
        $data = array('status' => true,'data' => 'Delete user ');
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

function khar($db){
    $date = array();
    $mess = array();
    $s = "SELECT `id`, `username`, `image` FROM `users` ";
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

function new_id($db){
    $new_id ='';
    $data = array();
    $mess = array();
    $s = "SELECT * FROM `users` order by users.id desc limit 1";
    $r = $db->query($s);
    if($r){
            $row = $r->fetch_assoc();
            if($row > 0){
                $new_id = ++$row['id'];
            }
            else{
                $new_id = 'CR001';
            }
    }else{
        $data = array('status' => false, 'data' => $db->error);
    }
    return $new_id;
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