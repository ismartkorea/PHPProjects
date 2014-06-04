<?php
	header("content-type:text/html; charset=euc-kr");

	session_start();
	##### 세션해제 처리.
	session_destroy();
	
	echo ("<script type=\"text/javascript\">
	<!--
		alert(로그아웃처리되었습니다.');
	//-->
	</script>");	
	
	#####
	echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
?>
