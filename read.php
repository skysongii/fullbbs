<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/common.php";
	
	$real_ip = $_SERVER['REMOTE_ADDR'];	// 게시물 조회 사용자 ip
    $seq = $_GET['seq'];    // URL 파라미터


    $select_query = "SELECT * FROM contents WHERE seq='$seq'";	// url 파라미터로 받은 게시물 데이터 불러오기
    $select_result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_array($select_result);

	$update_query = "UPDATE contents SET hits = hits + 1 WHERE seq = '$seq'";	// url 파라미터로 받은 게시물 조회수 1씩 증가
	$update_result = mysqli_query($conn, $update_query);

	$title = $row['title'];
    $writer = $row['writer'];
    $write_date = $row['write_date'];
    $hits = $row['hits'];
    $content = $row['content'];

	$log_dir = $_SERVER['DOCUMENT_ROOT']."/new_bbs/log";
	$log_file = fopen($log_dir."/csh_".date("Ymd"), "a+");
	fwrite($log_file, "\r\n".date("Y-m-d H:i:s")."\r\n".$seq."번째 게시물 -> \r\n"."제목 : ".$title.
												"\r\n작성자 : ".$writer.
												"\r\n작성일 : ".$write_date.
												"\r\n내용 : ".$content.
												"\r\n조회수 : ".$hits.
												"\r\n조회 아이피 : ".$real_ip."\r\n");
	fclose($log_file);

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
				<a href="./update.php?seq=<?= $seq?>">수정</a>&nbsp;&nbsp;
				<a href="./delete.php?seq=<?= $seq?>">삭제</a>&nbsp;&nbsp;
				<a href="./">목록</a>
			</div>
		</div>
		<?php require_once('./comment.php'); ?>
	</article>
</body>
</html>