<?php
##### 세션체크.
require_once("common/include.session.check.php");

##### 사용자 정의 함수 호출. 
require_once("../common/function.user.php");

##### 변수 취득.
$getNo = $_REQUEST['pNo'];

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

##### html head 공통 부분 호출.
require_once("../common/include.header.php");
?>
<style type="text/css">
section.custom-footer {
	background: #333;
	padding-top: 40px;
	padding-bottom: 40px;
	color: #f6f6f6;
}
section.custom-footer a, section.custom-footer address {
	color: #f8f8f8;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	$("#saveBtn").bind(onSubmit);
	$("#prevBtn").bind(onPrev);

	$( "#saveBtn" ).click(onSubmit);
	$("#prevBtn").click(onPrev);
});
onSubmit = function() {
	document.frm.action = "sitemap_update.php";
	document.frm.submit();
}

onPrev = function() {
	location.href = "sitemap_list.php";
}
</script>
</head>
<body>
<form name="frm" id="frm" method="post">
<div id="">
</div>
 <!-- location -->
 <div id="head" class="bg-primary"  style="height:100">
	<div id="title">
		<p align="right" style="height: 30">
			<a href="signout.php"><b><font color="#000000">로그 아웃</font></b></a>
		</p>
	</div>
 </div>
 <!-- /location -->
      
 <!-- page title -->
 <div class="page_title">
  <h2>사이트맵 관리 화면 - 수정화면</h2>
 </div>
 <!-- page title -->

<!-- article -->
<article>
	<!-- section -->
	<section>
    <div>
<?php
##### 레코드 정보 취득.
$query = "SELECT no, ctg_code, ctg_name, site_name, site_url FROM tbl_sitemap_ko WHERE no = $getNo";
$result = mysql_query($query);
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
$row = mysql_fetch_object($result);

$my_no = $row->no;
$my_ctg_code = $row->ctg_code;
$my_ctg_name = $row->ctg_name;
$my_site_name = $row->site_name;
$my_site_url = $row->site_url;

?>
     <table id="tblForm">
	    <tr>
	      	<td>카테고리 코드 : </td>
	      	<td><input type="text" id="ctgName" name="ctgCode" value="<?php echo($my_ctg_code)?>" size="5" required /></td>
	    </tr>     
	    <tr>
	      	<td>카테고리명 : </td>
	      	<td><input type="text" id="ctgName" name="ctgName" value="<?php echo($my_ctg_name)?>" size="50" required /></td>
	    </tr>
	    <tr>
	      <td>사이트명 : </td><td><input type="text" id="siteName" name="siteName" value="<?php echo($my_site_name)?>" size="100" required /></td>
	    </tr>
	    <tr>
	      <td>사이트 URL : </td><td><input type="text" id="siteUrl" name="siteUrl" value="<?php echo($my_site_url)?>" size="100" required /></td>
	    </tr>	
     </table>
    </div> 
	
	<!-- button -->
	<div>
		<table>
			<tr>
				<td>
					<input type="button" id="prevBtn" name="prevBtn" value="이전 화면"/>&nbsp;
					<input type="button" id="saveBtn" name="saveBtn" value="저장"/>			
				</td>
			</tr>	
		</table>
	</div>
	<!-- //button -->
	</section>
</article>
<input type="hidden" id="pGetNo" name="pGetNo" value="<?php echo($my_no)?>"/>
</form>
<?php
	// footer common 
	require_once("common/include.footer.php");
?> 
</body>
</html>