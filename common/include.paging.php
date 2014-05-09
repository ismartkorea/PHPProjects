<?php 
##### 게시물 목록하단과 각 페이지로 이동할 수 있는 페이지 링크에 대한 설정.
$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block) {
	$last_page = $total_page;
}

##### 이전 페이지 블록에 대한 페이지 링크
if($block > 1) {
	$my_page = $first_page;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='이전 $page_per_block  페이지 이동';return true;\" 
onMouseOut=\"status=' '\">[이전 ${page_per_block}개]</a>");
}

##### 현재 페이지 블록 범위 내에서 각 페이지로 바로 이동할 수 있는 하이퍼링크를 출력.
for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
	if($page == $direct_page) {
		echo("<b>[$direct_page]</b>");
	} else {
		echo("<a href=\"sitemap_list.php?page=$direct_page\"
onMouseOver=\"status='페이지로 이동';return true;\"
onMouseOut=\"status=' '\">[$direct_page]</a>");
	}
}

##### 다음 페이지 블록에 대한 페이지 링크
if($block < $total_block) {
	$my_page = $last_page+1;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='앞 $page_per_block 페이지 이동';return true;\" 
onMouseOut=\"status=' '\">[다음 ${page_per_block}개]</a>");
}
?>