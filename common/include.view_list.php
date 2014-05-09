<?php 
##### 총갯수 구함.
$result = mysql_query("SELECT count(no) FROM tbl_sitemap_ko");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}
$total_record = mysql_result($result,0,0);
mysql_free_result($result);

##### 전체 페이지 수 계산
$total_page = ceil($total_record/$num_per_page);

##### 출력할 레코드 번호 범위 지정.
if($total_record == 0) {
	$first = 1;
	$last = 0;
} else {
	$first = $num_per_page*($page-1);
	$last = $num_per_page*$page;
}
 
##### 현재 페이지에 출력할 결과 레코드 셋를 취득한다.
if($total_record) {
	##### 총 레코드갯수 출력.
	echo("총 서명 : <b>$total_record</b> (Total <b>$total_record</b>
		Signs - <font color='red'><b>${page}</b></font>페이지 / 총<b>${total_page}</b>페이지)");
	
	##### 관리자 모드 인지 체크
	if($PHP_AUTH_USER) {
		echo(" - [<font color='red'>관리자</font>]");
	}
} else {
	##### 하나도 없는 경우 아래 메시지 출력
	echo("<font color='red'><b>현재 등록된 정보가 없습니다.</b></font>");
}
?>
<?php 
##### 현재 페이지에 출력할 결과 레코드 셋을 얻는다.
$result = mysql_query("SELECT no, ctg_name, site_name, site_url, regist_date 
FROM tbl_sitemap_ko ORDER BY no DESC LIMIT $first, $num_per_page");
if(!$result) {
	error("QUERY_ERROR");
	exit;
}

##### 게시물의 갯수에 따른 일련번호
$article_num = $total_record = $num_per_page*($page-1);

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

	##### 레코드의 필드값을 변수에 저장한다.
	$my_no = $row[no];
	$my_ctg_name = $row[ctg_name];
	$my_site_name = $row[site_name];
	$my_site_url = $row[site_url];
	$my_regist_date = date("Y년 m월 d일 H시 i분 s초", $row[regist_date]);
	
}
?>
<?php 
##### 게시물 목록 하단의 각 페이지로 직접 이동 할 수 있는 페이지 링크에 대한 설정을 한다.
$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block) {
	$last_page = $total_page;
}

##### 이전 페이지 블록에 대한 페이지 링크
if($bock > 1) {
	$my_page = $first_page;
	echo("<a href=\"list.php?page=$my_page\" onMouseOver=\"status='load previous $page_per_block pages';
 return true;\" onMouseOut=\"status=' '\">[이전 ${page_per_block}개]</a>");
}

##### 현재 페이지 블록 범위 내에서 각 페이지로 바로 이동할 수 있는 하이퍼링크를 출력한다.
for($direct_page = $fist_page+1; $direct_page <= $last_page; $direct_page++) {
	if($page == $direct_page) {
		echo("<b>[$direct_page]</b>");
	} else {
		echo("<a href=\"list.php?page=$direct_page\" onMouseOver=\"status='jump to
 page $direct_page'; return true;\" onMouseOut=\"status=' '\">[$direct_page]</a>");
	}
}

##### 다음 페이지 블록에 대한 페이지 링크
if($block < $total_block) {
	$my_page = $last_page+1;
	echo("<a href=\"list.php?page=$my_page\" onMouseOver=\"status='load next $page_per_block pages';
return true;\" onMouseOut=\"status=' '\">[다음 ${page_per_block}개]</a>");
}
?>