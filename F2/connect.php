<?php 
$phone = $_POST['phone'];
$password = $_POST['password'];

// data base Connectione
$con = new mysqli("localhost","root","","fitohm");
if($con->connect_error){
    die("Failed to connect : " .$con->connect_error);
} else{
    $stmt = $con->prepare("select * from real_user_details where phone = ?");
    $stmt->bind_param("s",$phone);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();
    if($data['password'] === $password){
        echo "<h2> Login Succesful </h2> ";
    }else{
        echo "<h2> Invalid phone Or Password </h2> ";
    }
    }else{
        echo "<h2> Invalid phone Or Password  </h2> ";
    }
}

?>