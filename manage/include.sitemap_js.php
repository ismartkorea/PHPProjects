<script type="text/javascript">
$(document).ready(function() {

	$("#insertBtn").bind(fn_onInsert);
	//$("#delBtn").bind(fn_onDel);

	$( "#insertBtn" ).click(fn_onInsert);
	//$( "#delBtn" ).click(fn_onDel);

	// 체크 박스 모두 체크
	$("#allYnChkBtn").click(function() {
		if($(this).is(":checked")) {
			$("input:checkbox[id^=chkBox]").prop("checked",true);
		} else {
			$("input:checkbox[id^=chkBox]").prop("checked",false);
		}
	});

	// 삭제 버튼처리.
	$("#delBtn").click(function() {
		// 체크박스 확인.
		var chkCnt = $("input[name='chkBox[]']:checkbox:checked").length;
		if (chkCnt == 0){
			alert("삭제할 체크박스를 선택하세요.");
			return;
		}
		document.frm.action = "sitemap_delete.php";
		document.frm.submit();
	});
	
	
});
// 입력 함수.
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

// 수정 화면 이동.
fn_onView = function(no) {
	location.href = "sitemap_updateForm.php?pNo=" + no;
}



</script>