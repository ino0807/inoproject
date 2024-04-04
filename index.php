<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ino";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "새 글이 성공적으로 작성되었습니다.";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT id, title, content, created_at FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p><i>작성일: " . $row["created_at"] . "</i></p>";
        echo "<hr>";
    }
} else {
    echo "글이 없습니다.";
}

$conn->close();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    제목: <input type="text" name="title"><br>
    내용: <textarea name="content" rows="5" cols="40"></textarea><br>
    <input type="submit" value="글 작성">
</form>