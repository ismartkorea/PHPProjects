<?php
##### ���� ���� �����ϰų� ������ ������ �����Ѵ�.
session_start();

//$getId = $_SESSION['manager_id'];
##### �α����� ��ġ�� �ʾ��� ��� ȸ�� �α��� ȭ������ �ǵ��� ������.
if(!$_SESSION["manager_id"]) {
	echo("<meta http-equiv='Refresh' content='0; URL=signinForm.php'>");
}
?>
