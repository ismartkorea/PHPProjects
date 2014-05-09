<?php
##### 세션체크.
require_once("common/include.session.check.php");

##### 사용자 정의 함수 호출.
require_once("../common/function.user.php");

##### 변수 취득.
$getNo = $_POST['pGetNo'];
$getCtgCd = $_POST['ctgCode'];
$getCtgNm = $_POST['ctgName'];
$getSiteNm = $_POST['siteName'];
$getSiteUrl = $_POST['siteUrl'];
$getRegistName = $_SESSION['manager_id'];

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
// 쿼리 작성.
$query = "UPDATE tbl_sitemap_ko SET ctg_code = '$getCtgCd', ctg_name = '$getCtgNm', site_name = '$getSiteNm', site_url = '$getSiteUrl', update_user = '$getRegistName', update_date = now() WHERE no = $getNo";
$result = mysql_query($query);

if($result) {
	echo ("<script type=\"text/javascript\">
	<!--
		alert('수정하였습니다.');
	//-->
	</script>");
	echo ("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
} else {
	error("QUERY_ERROR");
	exit;
}

?>