<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/common.php";
?>

<!DOCTYPE html>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 150px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
 
</style>
<body>
        <form method = "POST" action = "write_action.php">
        <table  style="padding-top:50px" align = center width=800 border=0 cellpadding=2 >
                <tr>
                <td height=20 align=center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                    <tr>
                    <td>작성자</td>
                    <?php 
                        if($ses_id) { ?>
							<td><input type=text value=<?=$ses_id?> name=name size=20 maxlength="10" readonly></td>
						<? }
						else { ?>
							<td><input type=text name=name size=20></td>
						<? } ?>
                    </tr>

                    <tr>
                    <td>제목</td>
                    <td><input type=text name=title size=60 maxlength="50"></td>
                    </tr>

                    <tr>
                    <td>내용</td>
                    <td><textarea name=content cols=85 rows=15 maxlength="2000"></textarea></td>
                    </tr>

                    <tr>
                </table>
 
                        <center>
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table> 
        </form>
</body>
</html>
 

