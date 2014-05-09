<?php
	header("content-type:text/html; charset=euc-kr");

	session_start();
	##### 세션종료
	session_destroy();
	
	echo ("<script type=\"text/javascript\">
	<!--
		alert('로그아웃 하였습니다.');
	//-->
	</script>");	
	
	##### 사용자가 요청한 URL로 이동.
	echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
?>
