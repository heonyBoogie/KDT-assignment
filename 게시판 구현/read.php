<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kdt_db";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("MySQL 연결 실패:".$conn->connect_error);
}

$idx = $_GET['idx'];

$sql = "SELECT title,author,CONVERT(content using euckr) AS cont FROM posts WHERE idx=".$idx; 
$result = $conn->query($sql);
$row = $result->fetch_array();
echo "<h2>" . htmlspecialchars($row['title'])."</h2>글쓴이 : ".htmlspecialchars($row['author']);
echo "<hr><p>".$row['cont']."</p><hr>";
echo "<a href=\"post_page.php\">돌아가기</a>";
?>