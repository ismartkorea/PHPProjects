<script type="text/javascript">
$(document).ready(function() {

	$("#insertBtn").bind(fn_onInsert);
	//$("#delBtn").bind(fn_onDel);

	$( "#insertBtn" ).click(fn_onInsert);
	//$( "#delBtn" ).click(fn_onDel);

	// 체크버튼 처리.
	$("#allYnChkBtn").click(function() {
		if($(this).is(":checked")) {
			$("input:checkbox[id^=chkBox]").prop("checked",true);
		} else {
			$("input:checkbox[id^=chkBox]").prop("checked",false);
		}
	});

	// 삭제버턴 처리.
	$("#delBtn").click(function() {
		// üũ�ڽ� Ȯ��.
		var chkCnt = $("input[name='chkBox[]']:checkbox:checked").length;
		if (chkCnt == 0){
			alert("삭제할 항목을 체크하세요!");
			return;
		}
		document.frm.action = "sitemap_delete.php";
		document.frm.submit();
	});
	
	
});
// 입력처리.
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