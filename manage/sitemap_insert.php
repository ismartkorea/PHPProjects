<?php
##### 
require_once("common/include.session.check.php");

##### 
require_once("../common/function.user.php");
##### 
#$cfg_file = "config" . $code . ".php";
if(file_exists('../common/config.sitemap.php')) {
	require_once('../common/config.sitemap.php');
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

##### no 
$result = mysql_query("SELECT max(no) FROM tbl_sitemap_ko");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}

$total_record = mysql_result($result,0,0);
mysql_free_result($result);

if($total_record) {
	$new_no = $total_record + 1;
} else {
	$new_no = 1;
}

// parameter 취득.
$getCtgCode = $_POST['ctgCode'];
$getCtgName = $_POST['ctgName'];
$getSiteName = $_POST['siteName'];
$getSiteUrl = $_POST['siteUrl'];
$getRegistName = $_SESSION['manager_id'];
//$getRegistDate = time();
// ���� �ۼ�.
$query = "INSERT INTO tbl_sitemap_ko (no, ctg_code, ctg_name, site_name, site_url,regist_user) VALUES($new_no, '$getCtgCode', '$getCtgName', 
'$getSiteName','$getSiteUrl','$getRegistName')";

// 
$result = mysql_query($query);
if($result) {
	echo ("<script type=\"text/javascript\">
	<!--
		alert('저장 되었습니다.');
	//-->
	</script>");
	echo ("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
} else {
	error("QUERY_ERROR");
	exit;
}

?>