<?php 
include_once "dbconfig.php";
// $conn = mysqli_connect("127.0.0.1", "sunho", "1234", "frontdb");

$title = $_POST['title'];
$name = $_POST['name'];
$content = $_POST['content'];

if(empty($name)) {
    echo "<script>작성자를 입력해주세요.</script>";
} else if(empty($title)) {
    echo "<script>제목을 입력해주세요.</script>";
} else if(empty($content)) {
    echo "<script>내용을 입력해주세요.</script>";
} else {
    $insert_query = "INSERT INTO contents(title, writer, content, write_date) VALUES ('$title', '$name', '$content', NOW())";
    
    if(mysqli_query($conn, $insert_query)) {
        echo "<br>게시글이 등록되었습니다.";
        $update_query = "UPDATE member SET point = point + 1 WHERE id='$name'";
        $update_result = mysqli_query($conn, $update_query);
        echo $update_query;
    } else {
        echo "<br>Error: ".$insert_query."; <br>message: ".mysqli_error($conn);
    }
}
?>

<div>
    <input type="button" value="목록으로 가기" onclick="location.href='index.php'">
</div>