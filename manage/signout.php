<?php
	header("content-type:text/html; charset=euc-kr");

	session_start();
	##### ��������
	session_destroy();
	
	echo ("<script type=\"text/javascript\">
	<!--
		alert('�α׾ƿ� �Ͽ����ϴ�.');
	//-->
	</script>");	
	
	##### ����ڰ� ��û�� URL�� �̵�.
	echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
?>
