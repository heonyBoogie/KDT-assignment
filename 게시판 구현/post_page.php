<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>게시글 목록</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kdt_db";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error){
        die("MySQL 연결 실패:".$conn->connect_error);
    }

    $sql = "SELECT idx,title,author FROM posts";
    $result = $conn->query($sql);
    while($row = $result->fetch_array()){
        echo "<a = href=\"read.php?idx=".htmlspecialchars($row['idx'])."\">".htmlspecialchars($row['title'])."</a>";
        echo "   |   글쓴이:".htmlspecialchars($row['author'])."<br><hr>";
    }
    ?>
    <button type="button" onclick="location.href='writing_post_page.html'">글쓰기</button>
</body>
</html>
