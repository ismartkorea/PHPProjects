<?php
##### ����üũ.
require_once("common/include.session.check.php");

##### ����� ���� �Լ� ȣ��. 
require_once("../common/function.user.php");
##### html head ���� �κ� ȣ��.
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
	document.frm.action = "sitemap_insert.php";
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
			<a href="signout.php"><b><font color="#000000">�α� �ƿ�</font></b></a>
		</p>
	</div>
 </div>
 <!-- /location -->
      
 <!-- page title -->
 <div class="page_title">
  <h2>����Ʈ�� ���� ȭ�� - �Է�ȭ��</h2>
 </div>
 <!-- page title -->

<!-- article -->
<article>
	<!-- section -->
	<section>
    <div>
     <table id="tblForm">
	    <tr>
	      	<td>ī�װ� �ڵ� : </td><td><input type="text" id="ctgCode" name="ctgCode" value="" size="5" required /></td>
	    </tr>     
	    <tr>
	      	<td>ī�װ��� : </td><td><input type="text" id="ctgName" name="ctgName" value="" size="50" required /></td>
	    </tr>
	    <tr>
	      <td>����Ʈ�� : </td><td><input type="text" id="siteName" name="siteName" value="" size="100" required /></td>
	    </tr>
	    <tr>
	      <td>����Ʈ URL : </td><td><input type="text" id="siteUrl" name="siteUrl" value="" size="100" required /></td>
	    </tr>	
     </table>
    </div> 
	
	<!-- button -->
	<div>
		<table>
			<tr>
				<td>
					<input type="button" id="prevBtn" name="prevBtn" value="���� ȭ��"/>&nbsp;
					<input type="button" id="saveBtn" name="saveBtn" value="����"/>			
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