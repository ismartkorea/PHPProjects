<?php 
##### �Խù� ����ϴܰ� �� �������� �̵��� �� �ִ� ������ ��ũ�� ���� ����.
$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block) {
	$last_page = $total_page;
}

##### ���� ������ ��Ͽ� ���� ������ ��ũ
if($block > 1) {
	$my_page = $first_page;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='���� $page_per_block  ������ �̵�';return true;\" 
onMouseOut=\"status=' '\">[���� ${page_per_block}��]</a>");
}

##### ���� ������ ��� ���� ������ �� �������� �ٷ� �̵��� �� �ִ� �����۸�ũ�� ���.
for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
	if($page == $direct_page) {
		echo("<b>[$direct_page]</b>");
	} else {
		echo("<a href=\"sitemap_list.php?page=$direct_page\"
onMouseOver=\"status='�������� �̵�';return true;\"
onMouseOut=\"status=' '\">[$direct_page]</a>");
	}
}

##### ���� ������ ��Ͽ� ���� ������ ��ũ
if($block < $total_block) {
	$my_page = $last_page+1;
	echo("<a href=\"sitemap_list.php?page=$my_page\" 
onMouseOver=\"status='�� $page_per_block ������ �̵�';return true;\" 
onMouseOut=\"status=' '\">[���� ${page_per_block}��]</a>");
}
?>