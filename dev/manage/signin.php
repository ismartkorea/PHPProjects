<?php 
##### 사용자정의함수 취득.
require_once("../../common/function.user.php");

##### 로그인아이디/패스워드 취득.
$getSignID = $_POST['loginId'];
$getSignPWD = $_POST['loginPwd'];

##### 환경설정 취득.
#$cfg_file = "config" . $code . ".php";
if(file_exists('../../common/config.sitemap.php')) {
	require_once('../../common/config.sitemap.php');
} else {
	error("NOT_FOUND_CONFIG_FILE");
	exit;
}
##### DB 접속
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

##### 에러처리.
if(!$rows) {
	error("LOGIN_IN_NOT_FOUND");
	exit;
} else {

	$row = mysql_fetch_object($result);
	$db_id = $row->user_id;
	$db_userpwd = $row->user_pwd;
	$db_name = $row->user_name;
	
	#####
	//$result = mysql_query("SELECT password('$user_pwd')");
	//$userPwd = mysql_result($result,0,0);
	
	##### 에러처리.
	//if(strcmp($db_userpwd, $userPwd)) {
	if(strcmp($db_userpwd, $getSignPWD)) {
		error("LOGIN_INVALID_PW");
		exit;
	} else {
		
		if(headers_sent()) {
			error("HTTP_HEADERS_SENT");
		} else {
			
			##### 세션시작.
			session_start();
			
			##### 
			//session_register("manager_id");
			//session_register("manager_pwd");
			//session_register("manager_name");
			
			##### 세션저장처리.
			$_SESSION['manager_id'] = $db_id;
			$_SESSION['manager_pwd'] = $db_userpwd;
			$_SESSION['manager_name'] = $db_name;
			
			##### 
			echo("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
		}
	}
}
?>