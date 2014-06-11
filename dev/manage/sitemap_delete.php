<?php
##### 
require_once("common/include.session.check.php");

##### 
require_once("../../common/function.user.php");
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
// parameter 
$getDelNo = $_POST['chkBox'];

//echo("chkBox Count = " . count($getDelNo));
// 
for($i = 0; $i < count($getDelNo); $i++){
	//echo $getDelNo[$i]."<br>";
	//echo("chkBox[" . $i . "] = " . $getDelNo[$i]);
	// ���� �ۼ�.
	$query = "DELETE FROM tbl_sitemap_dev_ko WHERE no = $getDelNo[$i]";
	//
	$result = mysql_query($query);	
}
if($result) {
	echo ("<script type=\"text/javascript\">
	<!--
		alert('삭제처리 되었습니다.');
	//-->
	</script>");
	echo ("<meta http-equiv='Refresh' content='0; URL=sitemap_list.php'>");
} else {
	error("QUERY_ERROR");
	exit;
}
?>