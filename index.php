<?php
##### ����� ���� �Լ� ȣ��.
require_once("common/function.user.php");

##### ���� ���� �Լ� ȣ��.
#$cfg_file = "config" . $code . ".php";
if(file_exists('common/config.sitemap.php')) {
	require_once('common/config.sitemap.php');
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

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="euc-kr">
<title>���� ����Ʈ �� ���� ������.</title>
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
		alert("�˻��� ����Ʈ���� �Է��ϼ���.");
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
			<input type="text" id="searchText" name="searchText" class="form-control" placeholder="&nbsp;�˻��� ����Ʈ�� �Է��ϼ���." required>
		  </div>
		  <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary" onclick="onSubmit();">�˻�</button>
		</form>
	</div><!-- /.navbar-collapse --> 
	</div>	
</nav>
 
      <!-- Main hero unit for a primary marketing message or call to action -->
<div class="jumbotron">     
	
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1>�ڸ��� ����Ʈ�� (��ũ���� ����Ʈ)</h1>
				</div>
			</div>
		</div>
</div>
<?php 
	if($AD_IMAGE != "") {
?>
<!-- ���� -->
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
<!--  1��° �� ���� -->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// ���� �ۼ�.
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
<!-- 2��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>Ŀ�´�Ƽ</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 3��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>�Ź�</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 4��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>���</td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 5��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>������</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 6��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D">���θ�</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// ���� �ۼ�.
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
<!-- 7��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D">�ڵ���</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 8��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
 
 <!--  1��° �� �� -->

 <!--  2��° �� ���� -->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// ���� �ۼ�.
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
<!-- 2��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 3��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>����</td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 4��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>����</td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 5��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>ä��/����</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 6��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D">����</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// ���� �ۼ�.
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
<!-- 7��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D">��ȭ/��ȭ</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 8��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
 
 <!--  2��° �� �� -->
 
  <!--  3��° �� ���� -->
<tr>
 <td colspan="15"></td>
</tr>
 <tr>
  <td>
<!-- 1��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td align=center height=20  bgcolor="#F5EBF6"><font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170' bgcolor="white">
<?php 
// ���� �ۼ�.
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
<!-- 2��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>����</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 3��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>���/â��</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 4��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20><font face="����" color='#CB448D'>����/�ù�</td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 5��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20><font face="����" color='#CB448D'>�Ƿ�</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 6��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font color="#CB448D">�м��Ƿ�</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
			<table height=170 cellSpacing=0 cellPadding=0 width=91 border=0>
			<tbody>
<?php 
// ���� �ۼ�.
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
<!-- 7��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#F5EBF6" align=center height=20> <font color="#CB448D">����</font></td>
       </tr>
       <tr>
        <td bgcolor='#ffffff'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
<!-- 8��° table�� ���°� -->
   <table border='0' cellpadding='0' cellspacing='0' width='96'>
    <tr>
     <td>
      <table border='0' cellpadding='0' cellspacing='0' width='96' height='200'>
       <tr>
        <td bgcolor="#ECDEEC" align=center height=20> <font face="����" color='#CB448D'>���ݺ�</font></td>
       </tr>
       <tr>
        <td bgcolor='#F3EFF5'>
         <table border='0' cellpadding='0' cellspacing='0' width='96' height='170'>
<?php 
// ���� �ۼ�.
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
 
 <!--  3��° �� �� -->
 
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
										 <a href="http://www.ismartkorea.net/">���̽���Ʈ�ڸ��� ���</a>
									</li>
									<li>
										 <a href="http://www.bluewisesoft.com/">�����������Ʈ</a>
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
