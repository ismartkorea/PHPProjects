<script type="text/javascript">
$(document).ready(function() {

	$("#insertBtn").bind(fn_onInsert);
	//$("#delBtn").bind(fn_onDel);

	$( "#insertBtn" ).click(fn_onInsert);
	//$( "#delBtn" ).click(fn_onDel);

	// üũ �ڽ� ��� üũ
	$("#allYnChkBtn").click(function() {
		if($(this).is(":checked")) {
			$("input:checkbox[id^=chkBox]").prop("checked",true);
		} else {
			$("input:checkbox[id^=chkBox]").prop("checked",false);
		}
	});

	// ���� ��ưó��.
	$("#delBtn").click(function() {
		// üũ�ڽ� Ȯ��.
		var chkCnt = $("input[name='chkBox[]']:checkbox:checked").length;
		if (chkCnt == 0){
			alert("������ üũ�ڽ��� �����ϼ���.");
			return;
		}
		document.frm.action = "sitemap_delete.php";
		document.frm.submit();
	});
	
	
});
// �Է� �Լ�.
fn_onInsert = function() {
	location.href = "sitemap_insertForm.php";
}

// checkbox all check 
// fn_allYnCheck = function() {
// 	if ($("#allYnChkBtn").is(":checked")) {
// 		$('input:checkbox[id^=chkBox]:not(checked)').attr("checked", true); 
// 	} else { 
// 		$('input:checkbox[id^=chkBox]:checked').attr("checked", false);
// 	} 
// }

// ���� ȭ�� �̵�.
fn_onView = function(no) {
	location.href = "sitemap_updateForm.php?pNo=" + no;
}



</script>