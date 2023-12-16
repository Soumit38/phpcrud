<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'tutorials');

if(isset($_POST['save_data'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_no'];

}

$insert_query = "insert into test (name, email, mobile) values ('$name', '$email', '$phone')";
$insert_query_run = mysqli_query($connection, $insert_query);

if($insert_query_run){
    $_SESSION['status'] = 'Data insertion success';
    header('location: index.php');
}else{
    $_SESSION['status'] = 'Data insertion failure ! ';
    header('location: index.php');

}


if(isset($_POST['click_view_btn'])){
    $id = $_POST['user_id'];
    echo $id;
}

?>