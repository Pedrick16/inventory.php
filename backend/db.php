<?php
$conn= new mysqli("localhost:3306", 'root', '123456', 'otp_login');
if($conn->connect_errno){
    echo json_encode(['status' => $conn->connect_error]);
    exit();
}