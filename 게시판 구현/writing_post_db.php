<?php
$title = $_POST['title'];
$content = iconv("UTF-8","EUC-KR",$_POST['content']);
$author = $_POST['author'];

/* content encoding 방식 확인
$encode = array('ASCII','UTF-8','EUC-KR');
$encoding = mb_detect_encoding($content,$encode);
echo $encoding; */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kdt_db";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("MySQL 연결 실패:".$conn->connect_error);
}

$sql = "INSERT INTO posts (title, content, author) VALUES ("."\"".$title."\","."\"".$content."\","."\"".$author."\")";
$result = $conn->query($sql);

if($result){
    echo "글을 성공적으로 게시했습니다.<br>";
}else {
    echo "글쓰기에 실패했습니다.<br>";
}
echo '<a href="post_page.php">돌아가기</a>';
?>