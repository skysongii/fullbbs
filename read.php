<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/common.php";

    $seq = $_GET['seq'];    // URL 파라미터
    $hits = $_POST['hits'];

    echo $hits;

    // $update_query = "UPDATE contents SET hits"

    $select_query = "SELECT * FROM contents WHERE seq='$seq'";
    $select_result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_array($select_result);

    
    $writer = $row['writer'];
    $write_date = $row['write_date'];
    $hits = $row['hits'];
    $content = $row['content'];

    // echo $row['writer'];
    // echo "\n".$row['write_date'];
    // echo "\n".$row['hits'];
    // echo "\n".$row['content'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판</title>
</head>
<body>
	<article class="boardArticle">
		<h3>자유게시판 글쓰기</h3>
		<div id="boardView">
			<h3 id="boardTitle"><?= $row['b_title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?= $writer?></span><br>
				<span id="boardDate">작성일: <?= $write_date?></span><br>
				<span id="boardHit">조회: <?= $hits?></span><br>
			</div><br><br>
			<div id="boardContent">내용 : <?= $content?></div><br>
			<div class="btnSet">
				<a href="./write.php?seq=<?= $seq?>">수정</a>&nbsp;&nbsp;
				<a href="./delete.php?seq=<?= $seq?>">삭제</a>&nbsp;&nbsp;
				<a href="./">목록</a>
			</div>
		</div>
		<?php require_once('./comment.php'); ?>
	</article>
</body>
</html>