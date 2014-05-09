<?php
##### 세션 새로 생성하거나 기존의 세션을 연결한다.
session_start();

//$getId = $_SESSION['manager_id'];
##### 로그인을 거치지 않았을 경우 회원 로그인 화면으로 되돌려 보낸다.
if(!$_SESSION["manager_id"]) {
	echo("<meta http-equiv='Refresh' content='0; URL=signinForm.php'>");
}
?>
