
<?php
include('connection.php');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post_data = file_get_contents("php://input");

$signup_data = json_decode($post_data, true);

$username = $signup_data['username'];
$password = $signup_data['password'];
$email = $signup_data['email'];

$check_username = $mysqli->prepare('select username from user where username=?');
$check_username->bind_param('s', $username);
$check_username->execute();
$check_username->store_result();
$username_exists = $check_username->num_rows();

if ($username_exists == 0) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $query = $mysqli->prepare('insert into user(username,email,password) values(?,?,?)');
    $query->bind_param('sss', $username, $email, $hashed_password);
    $query->execute();

    $response['status'] = "success";
} else {
    $response['status'] = "failed";
}

echo json_encode($response);