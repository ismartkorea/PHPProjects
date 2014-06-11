<?php
##### 사용자정의 호출.
require_once("common/function.user.php");

##### 환경설정 호출.
#$cfg_file = "config" . $code . ".php";
if(file_exists('common/config.sitemap.php')) {
	require_once('common/config.sitemap.php');
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

mysql_query("set names utf8",$conn);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>포털 사이트 맵 메인 페이지.</title>
<meta http-equiv="imagetoolbar" content="no" />
<meta name="keywords" content="사이트링크,사이트맵,링크모음,한국사이트맵,코리아사이트맵,sitemap"/>
<meta name="Classification" content="iSmartKorea.net"/>
<meta name="Description" content="한국사이트링크모음"/>
<meta name="Author" content="아이스마트코리아닷넷" />
<meta name="Copyright" content="iSmartKoreaNet" />
<meta name="Publisher" content="iSmartKoreaNet"/>
<meta name="Reply-To(Email)" content="ismartkoreanet@hotmail.com"/>
<meta name="Location" content="south korea, republic of korea"/>
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!--[if lt IE 7]>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome-ie7.min.css" rel="stylesheet">
	<![endif]-->
    <!-- Fav and touch icons -->
<style type="text/css">
body {
	padding-top: 50px;
	padding-bottom:40px;
	max-height:100%;
}
	
.jumbotron{
	background:#358cce;
	color:#fff;
  }
  
	.thumbnail{
		position:relative;
	  }
	  .plus{
		position:absolute;
		top:20px;
		left:20px;
		
		text-align:center;
		 /* IE 8 */
		  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
 
		  /* IE 5-7 */
		  filter: alpha(opacity=0);
 
		  /* Netscape */
		  -moz-opacity: 0;
 
		  /* Safari 1.x */
		  -khtml-opacity: 0;
 
		  /* Good browsers */
		  opacity: 0;
	  }
	  
	  .thumbnail:hover .plus{
		
		 /* IE 8 */
		  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
 
		  /* IE 5-7 */
		  filter: alpha(opacity=100);
 
		  /* Netscape */
		  -moz-opacity: 1;
 
		  /* Safari 1.x */
		  -khtml-opacity: 1;
 
		  /* Good browsers */
		  opacity: 1;
	  }
	  .box{
		margin-bottom:30px;
	  }
	  
	  /* isotop items animation */
	  .isotope .isotope-item {
		-moz-transition-property: -moz-transform, opacity;
		-ms-transition-property: -moz-transform, opacity;
		-o-transition-property: top, left, opacity;
		transition-property: transform, opacity;
		-webkit-transition-property: -webkit-transform, opacity;
		}
		.isotope .isotope-item {
		-moz-transition-property: -moz-transform, opacity;
		-ms-transition-property: -moz-transform, opacity;
		-o-transition-property: top, left, opacity;
		transition-property: transform, opacity;
		-webkit-transition-property: -webkit-transform, opacity;
		}
		.isotope-item {
		-moz-transition-duration: 0.8s;
		-ms-transition-duration: 0.8s;
		-o-transition-duration: 0.8s;
		transition-duration: 0.8s;
		-webkit-transition-duration: 0.8s;
		z-index: 2;
		}
	  
	  @media (max-width: 767px){
		.thumbnail img{
			min-width:100%;
			height:auto;
		}
	  }
  

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
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <![endif]-->
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<script type="text/javascript">
// Search Method
onSubmit = function() {
var frm = document.frm;
	if(frm.searchText.value == "") {
		alert("검색할 사이트명을 입력하세요.");
		frm.searchText.focus();		
		return false;
	}
	
	document.frm.action = "search.php";
	document.frm.submit();
}
</script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
   <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
		<a class="navbar-brand" href="index.php">Home</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
		<form id="frm" name="frm" method="post" class="navbar-form navbar-right visible-lg" role="search">
		  <div class="form-group">
			<input type="text" id="searchText" name="searchText" class="form-control" placeholder="&nbsp;검색할 사이트명 입력하세요." required>
		  </div>
		  <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary" onclick="onSubmit();">검색</button>
		</form>
	</div><!-- /.navbar-collapse --> 
	</div>	
</nav>
 
      <!-- Main hero unit for a primary marketing message or call to action -->
<div class="jumbotron">     
	
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1>코리아 사이트맵 (링크모음 사이트)</h1>
				</div>
			</div>
		</div>
</div>
<?php 
	if($AD_IMAGE != "") {
?>
<!-- 광고 부분 -->
<div id="ad">
	<table width="766" height="100" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center"><img src="<?php echo($AD_IMAGE)?>" width="<?php echo($AD_IMG_WIDTH)?>" height="<?php echo($AD_IMG_HEIGHT)?>" border="0"/></td>
		</tr>
	</table>
</div>
<?php 
}
?>
<div id="container" align="center">
<table width='766' border='0' cellpadding='0' cellspacing='0'>
<!--  1번째-->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '01'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE `ctg_code` = '01'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
  <td>
<!-- 2번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '02'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '02'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 3번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '03'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '03'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 4번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '04'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '04'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 5번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '05'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '05'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 6번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '06'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>       
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '06'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
			</tbody>
			</table>
			</td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 7번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '07'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>        
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '07'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 8번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '08'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="����" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '08'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 </tr>
 
 <!--  1번째 행 끝 -->

<!--  2번째 행 시작 -->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '09'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>  
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '09'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
  <td>
<!-- 2번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '10'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>   
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '10'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 3번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '11'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>  
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '11'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 4번째 table이 들어가는곳 -->
 <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '12'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>      
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '12'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 5번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '13'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>        
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '13'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 6번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '14'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>      
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '14'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
			</tbody>
			</table>
			</td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 7번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '15'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '15'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 8번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '16'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '16'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 </tr>
 <!--  2번째 행 끝 -->
 
  <!--  3번째 행 시작 -->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '17'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>  
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '17'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
  <td>
<!-- 2번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '18'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '18'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 3번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '18'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '19'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 4번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '20'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '20'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 5번째 table이 들어가는곳 -->
  <?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '21'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '21'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 6번째 table이 들어가는곳 -->
<?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '22'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '22'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
			</tbody>
			</table>
			</td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 7번째 table이 들어가는곳 -->
<?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '23'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>     
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D"><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '23'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 <td width="1"><img src="images/blank.gif" width="1"></td>
 
    <td>
<!-- 8번째 table이 들어가는곳 -->
<?php 
 	$cat_query = "SELECT ctg_name FROM tbl_sitemap_ko WHERE `ctg_code` = '24'";
 	$cat_result = mysql_query($cat_query);
 	$cat_nm = mysql_result($cat_result,0);
 ?>    
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="<?php echo($FONT_STYLE)?>" color='#CB448D'><?php echo($cat_nm)?></font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// 조회처리.
$query = "SELECT site_name, site_url FROM tbl_sitemap_ko WHERE ctg_code = '24'";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$siteName = $row['site_name'];
	$siteUrl = $row['site_url'];
?>     
          <tr>
           <td valign=bottom>&nbsp; <a href="<?php echo($siteUrl)?>" target="_blank"><?php echo($siteName)?></a></td>
          </tr>
<?php 
	}
} else {
?> 
<tr>
   <td valign=bottom>&nbsp;</td>
</tr>
<?php 
}
?>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 
 </tr>
 
 <!--  3번째 행 끝 -->
 
</table>
</div>
<div id="bottom">
	<div id="info">
		<p>&nbsp;</p>
	</div>
</div>
<section class="custom-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
							<div>
								<ul class="list-unstyled">
									<li>
										 <a href="http://www.ismartkorea.net/">아이스마트코리아닷넷</a>
									</li>
									<li>
										 <a href="http://www.bluewisesoft.com/">블루와이즈소프트</a>
									</li>
									<li>
										 <a href="http://www.한국사이트맵.com/dev/index.php">개발사이트맵</a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4  col-xs-6">
							<div>
								<ul class="list-unstyled">
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
							<div>
								<ul class="list-unstyled">
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
									<li>
										 <a></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
					 <span class="text-right"> <address> <strong>Services.</strong> <address> <strong>iSmartKorea.Net</strong><br> <a href="mailto:ismartkoreanet@hotmail.com">ismartkoreanet@hotmail.com</a></address></span>
				</div>
			</div>
		</div>
	</section>
</body>
</html>