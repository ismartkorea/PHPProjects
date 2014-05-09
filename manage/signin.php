<?php 
##### 사용자 정의 함수 호출.
require_once("../common/function.user.php");

##### 변수 취득.
$getSignID = $_POST['loginId'];
$getSignPWD = $_POST['loginPwd'];

##### 공통 설정 함수 호출.
#$cfg_file = "config" . $code . ".php";
if(file_exists('../common/config.sitemap.php')) {
	require_once('../common/config.sitemap.php');
} else {
	error("NOT_FOUND_CONFIG_FILE");
	exit;
}
##### 데이타 베이스 접속.
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

##### 일치하는 회원정보가 없는 경우,
if(!$rows) {
	error("LOGIN_IN_NOT_FOUND");
	exit;
} else {

	$row = mysql_fetch_object($result);
	$db_id = $row->user_id;
	$db_userpwd = $row->user_pwd;
	$db_name = $row->user_name;
	
	##### 사용자가 입력한 비밀번호를 암호환한다.
	//$result = mysql_query("SELECT password('$user_pwd')");
	//$userPwd = mysql_result($result,0,0);
	
	##### 두 비밀번호를 비교하여 일치하면 세션 생성.
	//if(strcmp($db_userpwd, $userPwd)) {
	if(strcmp($db_userpwd, $getSignPWD)) {
		error("LOGIN_INVALID_PW");
		exit;
	} else {
		
		if(headers_sent()) {
			error("HTTP_HEADERS_SENT");
		} else {
			
			##### 세션 생성.
			session_start();
			
			##### 생성된 세션에 데이터를 저장할 세션 변수를 등록함.
			//session_register("manager_id");
			//session_register("manager_pwd");
			//session_register("manager_name");
			
			##### 등록된 세션 변수에 데이터를 저장한다.
			$_SESSION['manager_id'] = $db_id;
			$_SESSION['manager_pwd'] = $db_userpwd;
			$_SESSION['manager_name'] = $db_name;
			
			##### 사용자가 요청한 URL로 이동.
			echo("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
		}
	}
}
?>