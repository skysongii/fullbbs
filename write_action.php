<?php 
include_once "dbconfig.php";
// $conn = mysqli_connect("127.0.0.1", "sunho", "1234", "frontdb");

$title = $_POST['title'];
$name = $_POST['name'];
$content = $_POST['content'];

$insert_query = "INSERT INTO contents(title, writer, content, write_date) VALUES ('$title', '$name', '$content', NOW())";

if(mysqli_query($conn, $insert_query)) {
    echo "<br>게시글이 등록되었습니다.";
} else {
    echo "<br>Error: ".$insert_query."; <br>message: ".mysqli_error($conn);
}
?>

<div>
    <input type="button" value="목록으로 가기" onclick="location.href='index.php'">
</div>