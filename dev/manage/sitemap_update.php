<?php
##### 
require_once("common/include.session.check.php");

##### 
require_once("../../common/function.user.php");

##### 
$getNo = $_POST['pGetNo'];
$getCtgCd = $_POST['ctgCode'];
$getCtgNm = $_POST['ctgName'];
$getSiteNm = $_POST['siteName'];
$getSiteUrl = $_POST['siteUrl'];
$getRegistName = $_SESSION['manager_id'];

##### 
#$cfg_file = "config" . $code . ".php";
if(file_exists('../../common/config.sitemap.php')) {
	require_once('../../common/config.sitemap.php');
} else {
	error("NOT_FOUND_CONFIG_FILE");
	exit;
}
##### 
$db = mysql_select_db($dbName);
if(!$db) {
	error("FAILED_TO_SELECT_DB");
	exit;
}
// 
$query = "UPDATE tbl_sitemap_dev_ko SET ctg_code = '$getCtgCd', ctg_name = '$getCtgNm', site_name = '$getSiteNm', site_url = '$getSiteUrl', update_user = '$getRegistName', update_date = now() WHERE no = $getNo";
$result = mysql_query($query);

if($result) {
	echo ("<script type=\"text/javascript\">
	<!--
		alert('수정처리 되었습니다.');
	//-->
	</script>");
	echo ("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
} else {
	error("QUERY_ERROR");
	exit;
}

?>