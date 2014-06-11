<?php
##### 사용자정의함수취득.
require_once("../common/function.user.php");

##### 환경설정 취득.
#$cfg_file = "config" . $code . ".php";
if(file_exists('../common/config.sitemap.php')) {
	require_once('../common/config.sitemap.php');
} else {
	error("NOT_FOUND_CONFIG_FILE");
	exit;
}

##### DB 접속처리.
$db = mysql_select_db($dbName);
if(!$db) {
	error("FAILED_TO_SELECT_DB");
	exit;
}

mysql_query("set names utf8",$conn);

##### 검색어 취득.
if(isset($_POST['searchText'])) {
$searchText = $_POST['searchText'];
//echo("search_text = " . $searchText);
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>포털 사이트 맵 메인 페이지 검색결과</title>
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
//Search Method
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
					<h1>개발 사이트맵 (링크모음 사이트)</h1>
				</div>
			</div>
		</div>
</div>
<div id="body" align="center">
	<table width="650" height="100%" cellpadding="0" cellspacing="0" border="0">
	<thead>
		<tr>
			<td>카테고리명</td><td>사이트명</td><td>사이트링크</td>
		</tr>
	</thead>
<?php

##### 쿼리 조회.
$query = "SELECT ctg_name, site_name, site_url FROM tbl_sitemap_dev_ko WHERE site_name like '%" . $searchText . "%'";
$result = mysql_query($query);
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$my_ctg_name = $row['ctg_name'];
	$my_site_name = $row['site_name'];
	$my_site_url = $row['site_url'];
?>
	<tr>
		<td align="left"><b>[<?php echo($my_ctg_name)?>]</b></td><td align="left"><?php echo($my_site_name)?></td><td align="left"><a href="<?php echo($my_site_url)?>" target="blank"><?php echo($my_site_url)?></a></td>
	</tr>
<?php
}
?>	
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