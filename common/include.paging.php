<?php 
##### 페이징 셋팅
$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block) {
	$last_page = $total_page;
}

##### 이전 페이지 처리.
if($block > 1) {
	$my_page = $first_page;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='이전 $page_per_block  페이지';return true;\" 
onMouseOut=\"status=' '\">[이전 ${page_per_block}개]</a>");
}

##### 
for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
	if($page == $direct_page) {
		echo("<b>[$direct_page]</b>");
	} else {
		echo("<a href=\"sitemap_list.php?page=$direct_page\"
onMouseOver=\"status='페이지로 이동';return true;\"
onMouseOut=\"status=' '\">[$direct_page]</a>");
	}
}

##### 다음 페이지 처리.
if($block < $total_block) {
	$my_page = $last_page+1;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='다음 $page_per_block 페이지';return true;\" 
onMouseOut=\"status=' '\">[다음 ${page_per_block}개]</a>");
}
?>