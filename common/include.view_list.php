<?php 
##### �Ѱ��� ����.
$result = mysql_query("SELECT count(no) FROM tbl_sitemap_ko");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
$total_record = mysql_result($result,0,0);
mysql_free_result($result);

##### ��ü ������ �� ���
$total_page = ceil($total_record/$num_per_page);

##### ����� ���ڵ� ��ȣ ���� ����.
if($total_record == 0) {
	$first = 1;
	$last = 0;
} else {
	$first = $num_per_page*($page-1);
	$last = $num_per_page*$page;
}
 
##### ���� �������� ����� ��� ���ڵ� �¸� ����Ѵ�.
if($total_record) {
	##### �� ���ڵ尹�� ���.
	echo("�� ���� : <b>$total_record</b> (Total <b>$total_record</b>
		Signs - <font color='red'><b>${page}</b></font>������ / ��<b>${total_page}</b>������)");
	
	##### ������ ��� ���� üũ
	if($PHP_AUTH_USER) {
		echo(" - [<font color='red'>������</font>]");
	}
} else {
	##### �ϳ��� ���� ��� �Ʒ� �޽��� ���
	echo("<font color='red'><b>���� ��ϵ� ������ �����ϴ�.</b></font>");
}
?>
<?php 
##### ���� �������� ����� ��� ���ڵ� ���� ��´�.
$result = mysql_query("SELECT no, ctg_name, site_name, site_url, regist_date 
FROM tbl_sitemap_ko ORDER BY no DESC LIMIT $first, $num_per_page");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}

##### �Խù��� ������ ���� �Ϸù�ȣ
$article_num = $total_record = $num_per_page*($page-1);

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

	##### ���ڵ��� �ʵ尪�� ������ �����Ѵ�.
	$my_no = $row[no];
	$my_ctg_name = $row[ctg_name];
	$my_site_name = $row[site_name];
	$my_site_url = $row[site_url];
	$my_regist_date = date("Y�� m�� d�� H�� i�� s��", $row[regist_date]);
	
}
?>
<?php 
##### �Խù� ��� �ϴ��� �� �������� ���� �̵� �� �� �ִ� ������ ��ũ�� ���� ������ �Ѵ�.
$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block) {
	$last_page = $total_page;
}

##### ���� ������ ��Ͽ� ���� ������ ��ũ
if($bock > 1) {
	$my_page = $first_page;
	echo("<a href=\"list.php?page=$my_page\" onMouseOver=\"status='load previous $page_per_block pages';
 return true;\" onMouseOut=\"status=' '\">[���� ${page_per_block}��]</a>");
}

##### ���� ������ ��� ���� ������ �� �������� �ٷ� �̵��� �� �ִ� �����۸�ũ�� ����Ѵ�.
for($direct_page = $fist_page+1; $direct_page <= $last_page; $direct_page++) {
	if($page == $direct_page) {
		echo("<b>[$direct_page]</b>");
	} else {
		echo("<a href=\"list.php?page=$direct_page\" onMouseOver=\"status='jump to
 page $direct_page'; return true;\" onMouseOut=\"status=' '\">[$direct_page]</a>");
	}
}

##### ���� ������ ��Ͽ� ���� ������ ��ũ
if($block < $total_block) {
	$my_page = $last_page+1;
	echo("<a href=\"list.php?page=$my_page\" onMouseOver=\"status='load next $page_per_block pages';
return true;\" onMouseOut=\"status=' '\">[���� ${page_per_block}��]</a>");
}
?>