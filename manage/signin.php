<?php 
##### ����� ���� �Լ� ȣ��.
require_once("../common/function.user.php");

##### ���� ���.
$getSignID = $_POST['loginId'];
$getSignPWD = $_POST['loginPwd'];

##### ���� ���� �Լ� ȣ��.
#$cfg_file = "config" . $code . ".php";
if(file_exists('../common/config.sitemap.php')) {
	require_once('../common/config.sitemap.php');
} else {
	error("NOT_FOUND_CONFIG_FILE");
	exit;
}
##### ����Ÿ ���̽� ����.
$db = mysql_select_db($dbName);
if(!$db) {
	error("FAILED_TO_SELECT_DB");
	exit;
}

$query = "SELECT user_id, user_pwd, user_name FROM tbl_user WHERE user_id = '$getSignID' AND user_pwd = '$getSignPWD'";
$result = mysql_query($query);
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
#####
$rows = mysql_num_rows($result);

##### ��ġ�ϴ� ȸ�������� ���� ���,
if(!$rows) {
	error("LOGIN_IN_NOT_FOUND");
	exit;
} else {

	$row = mysql_fetch_object($result);
	$db_id = $row->user_id;
	$db_userpwd = $row->user_pwd;
	$db_name = $row->user_name;
	
	##### ����ڰ� �Է��� ��й�ȣ�� ��ȣȯ�Ѵ�.
	//$result = mysql_query("SELECT password('$user_pwd')");
	//$userPwd = mysql_result($result,0,0);
	
	##### �� ��й�ȣ�� ���Ͽ� ��ġ�ϸ� ���� ����.
	//if(strcmp($db_userpwd, $userPwd)) {
	if(strcmp($db_userpwd, $getSignPWD)) {
		error("LOGIN_INVALID_PW");
		exit;
	} else {
		
		if(headers_sent()) {
			error("HTTP_HEADERS_SENT");
		} else {
			
			##### ���� ����.
			session_start();
			
			##### ������ ���ǿ� �����͸� ������ ���� ������ �����.
			//session_register("manager_id");
			//session_register("manager_pwd");
			//session_register("manager_name");
			
			##### ��ϵ� ���� ������ �����͸� �����Ѵ�.
			$_SESSION['manager_id'] = $db_id;
			$_SESSION['manager_pwd'] = $db_userpwd;
			$_SESSION['manager_name'] = $db_name;
			
			##### ����ڰ� ��û�� URL�� �̵�.
			echo("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
		}
	}
}
?>