<?php
$servername = "localhost";
$username = "temp";
$password = "sP4zhbE4eyD3Rp2B";
$dbname = "temp";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO user_submission (username, useremail)
VALUES ('Shi_Crazy','602192794@qq.com')";
mysqli_query("set names utf8");
if (mysqli_query($conn, $sql)) {
    echo "Succeed in inserting data.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
mysqli_close($conn);
?>


