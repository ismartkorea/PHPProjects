<?php
##### ����üũ.
require_once("common/include.session.check.php");

##### ����� ���� �Լ� ȣ��. 
require_once("../common/function.user.php");

##### ���� ���� �Լ� ȣ��.
#$cfg_file = "config" . $code . ".php";
if(file_exists('../common/config.sitemap.php')) {
	require_once('../common/config.sitemap.php');
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

if(isset($_REQUEST['page'])) {
	$page = $_REQUEST['page'];
} else {
	$page = "1";
}
# Using the default constructor...
#$db = new MySQL('localhost', 'root', null, 'database');
# Or the connect method.
#$db = new MySQL();
#$db->connect('localhost', 'rootuser', 'root', 'sitemap');

# Or maybe one with a variable..?
#$result = $db->query("SELECT no, ctg_name, site_name, site_url, regist_user, regist_date FROM `tbl_sitemap_ko` WHERE colName = '". $db->escape($_GET['someVar']). "'");

require_once("../common/include.header.php");
require_once("../manage/include.sitemap_js.php");
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
</head>
<body>
<form name="frm" id="frm" method="post">

 <!-- location -->
 <div id="head" class="bg-primary"  style="height:100">
	<div id="title">
		<p align="right" style="height: 30">
			<a href="signout.php"><b><font color="#000000">�α� �ƿ�</font></b></a>
		</p>
	</div>
 </div>
 <!-- /location -->
      
 <!-- page title -->
 <div class="page_title">
  <h2>����Ʈ�� ���� ȭ�� - ����Ʈ</h2>
 </div>
 <!-- page title -->

<!-- article -->
<article>
	<!-- section -->
	<section>
    <div>
     <table id="tblResult">
      <colgroup>
       <col style="width:0px;">
       <col style="width:50px;" align="center">
       <col style="width:100px;">
       <col style="width:100px;">
       <col style="width:500px;">
       <col style="width:100px;">     
       <col style="width:150px;">
       <col style="width:100px;">     
       <col style="width:150px;">       
      </colgroup>
      <thead>
       <tr>
        <th><input type="checkbox" id="allYnChkBtn" name="allYnChkBtn" value=""/></th>
        <th title="no">��ȣ</th>
        <th title="ctg_name">ī�װ���</th>
        <th title="site_name">����Ʈ��</th>
        <th title="site_url">����ƮURL</th>
        <th title="regist_user">����ڸ�</th>       
        <th title="regist_date">�����</th>
        <th title="update_user">�����ڸ�</th>       
        <th title="update_date">������</th>        
       </tr>
      </thead>
	  <tbody>      
<?php
##### �� ���ڵ��� ������ ���Ѵ�.
$result = mysql_query("SELECT count(no) FROM tbl_sitemap_ko");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
$total_record = mysql_result($result,0,0);
mysql_free_result($result);

##### ��ü ������ ���� ����Ѵ�.
$total_page = ceil($total_record/$num_per_page);

##### �����Ϥ� �������� ���Ͽ� ����� ���ڵ� ��ȣ�� ������ ������.
if($total_record == 0) {
	$first = 1;
	$last = 0;
} else {
	$first = $num_per_page*($page-1);
	$last = $num_per_page*$page;
}

##### ����Ÿ ���.
if($total_record) {

	##### ���� �������� ����� ��� ���ڵ� ���� ���.
	$result = mysql_query("SELECT no, ctg_name, site_name, site_url, regist_user, regist_date, update_user, update_date  
	FROM tbl_sitemap_ko ORDER BY no DESC LIMIT $first, $num_per_page");
	if(!$result) {
		error("QUERY_ERROR");
		exit;
	} 

	##### �Խù� �����ȣ(�Խù��� ������ ���� �Ϸù�ȣ)
	$article_num = $total_record = $num_per_page*($page-1);
	##### ���ڵ� �ʵ尪 ������ ����.
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$my_no = $row['no'];
		$my_ctg_name = $row['ctg_name'];
		$my_site_name = $row['site_name'];
		$my_site_url = $row['site_url'];
		$my_regist_name = $row['regist_user'];
		$my_regist_date = $row['regist_date'];
		$my_update_name = $row['update_user'];
		$my_update_date = $row['update_date'];
?>
		<tr>
			<td><input type="checkbox" id="chkBox" name="chkBox[]" value="<?php echo($my_no) ?>"/></td> 
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_no) ?></td>
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_ctg_name) ?></td>
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_site_name) ?></td>
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_site_url) ?></td>
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_regist_name) ?></td>
	      	<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_regist_date) ?></td>
			<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_update_name) ?></td>
			<td style="cursor: hand" onclick="fn_onView('<?php echo($my_no) ?>');"><?php echo($my_update_date) ?></td>	      	
		</tr> 	      	
<?php
		$article_num--;
	}
} else {
?>
	<tr>
		<td colspan="6" align="center">�ش� ����Ÿ�� �����ϴ�.</td>
	</tr>
<?php 
}
?>
      </tbody>
     </table>
    </div> 
    
    <!-- paging -->
    <div id="pagingDiv">
<?php 
	// paging common
	require_once("../common/include.paging.php");
?>
    </div>
    <!-- //paging -->
	
	<!-- button -->
	<div>
		<table>
			<tr>
				<td>
					<input type="button" id="insertBtn" name="insertBtn" value="�߰�"/>&nbsp;
					<input type="button" id="delBtn" name="delBtn" value="����"/>				
				</td>
			</tr>	
		</table>
	</div>
	<!-- //button -->
	</section>
</article>
</form>
<?php
	// footer common 
	require_once("common/include.footer.php");
?> 
</body>
</html>