<?php
<<<<<<< HEAD
// MySQL 연결 설정
$servername = "localhost";
$username = "root"; // MySQL 사용자명
$password = "1234"; // MySQL 비밀번호
$dbname = "ino"; // 데이터베이스명

// MySQL 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
=======
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ino";


$conn = new mysqli($servername, $username, $password, $dbname);


>>>>>>> 6b12fe2c628ce0a4082d97f634a69360eb7c1922
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD
// 게시글 작성 함수
function createPost($title, $content) {
    global $conn;
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "게시글이 성공적으로 작성되었습니다.";
    } else {
        echo "게시글 작성 중 오류 발생: " . $conn->error;
    }
}

// 게시글 불러오기 함수
function getPosts() {
    global $conn;
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<p>작성일: " . $row["created_at"] . "</p>";
        }
    } else {
        echo "게시글이 없습니다.";
    }
}

// 게시글 작성하기
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    createPost($title, $content);
}

?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>게시판</title>
    </head>
    <body>

    <h1>게시판</h1>

    <!-- 게시글 작성 폼 -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        제목: <input type="text" name="title"><br>
        내용: <textarea name="content"></textarea><br>
        <input type="submit" value="게시글 작성">
    </form>

    <hr>

    <!-- 게시글 목록 -->
    <h2>게시글 목록</h2>
    <?php getPosts(); ?>

    </body>
    </html>

<?php
// MySQL 연결 종료
$conn->close();
?>
=======

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
>>>>>>> 6b12fe2c628ce0a4082d97f634a69360eb7c1922
