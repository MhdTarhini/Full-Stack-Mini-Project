<?php
include('connection.php');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$username = $_POST['username'];
$password = $_POST['password'];
// $name='mohamad';

$query = $mysqli->prepare('select id,username,password from user where username=?');
$query->bind_param('s', $username);
$query->execute();

$query->store_result();
$query->bind_result($id, $username, $password);
$query->fetch();
$num_rows = $query->num_rows();
if ($num_rows == 0) {
    $response['status'] = "user not found";
} else {
        $response['status'] = 'logged in';
        $response['id'] = $id;
        $response['password'] = $password;
        $response['username'] = $username;
}
echo json_encode($response);