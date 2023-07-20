<?php
include('connection.php');

// Allow the following HTTP headers for CORS requests, including the Content-Type header.
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post_data = file_get_contents("php://input");

$input_data = json_decode($post_data, true);

$input_username = $input_data['username'];
$input_password = $input_data['password'];
// $name='mohamad';

$query = $mysqli->prepare('select id,username,password from user where username=?');
$query->bind_param('s', $input_username);
$query->execute();

$query->store_result();
$query->bind_result($id, $username, $password);
$query->fetch();
$num_rows = $query->num_rows();


 
if ($num_rows == 0) {
    $response['status'] = "user not found";
} else {
    if ($input_password == $password) {
        $response['status'] = 'logged in';
        $response['username'] = $username;

    } else {
        $response['status'] = "wrong password";
    }
}
echo json_encode($response);
