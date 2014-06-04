<?php
##### 세션 시작.
session_start();

//$getId = $_SESSION['manager_id'];
##### 세션 로그인 처리.
if(!$_SESSION["manager_id"]) {
	echo("<meta http-equiv='Refresh' content='0; URL=signinForm.php'>");
}
?>
