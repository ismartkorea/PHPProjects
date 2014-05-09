<?php
header("content-type:text/html; charset=euc-kr");

##### 테이블명을 인자로 받아 해당하는 이미지를 출력한다.
function printTitleImage($code) {
	$title_image = $code . ".gif";
	echo "<center><img src=\"" . $title_image . "\" border=0></center><p>";
}

##### 본문 작성시, HTML 태그를 허용할 것인지를 나타내는 메시지를 출력한다.
function printAllowTagMsg($isAllowed) {
	if($isAllowed == "Y") {
		echo "(태그사용 <font color=red>가능</font>)";
	} else {
		echo "(태그사용 <font color=red>불가</font>)";
	}
}

##### 에러 발생시 인자로 전달받은 에러 메시지를 팝업창에 띄워 출력한다.
function popup_msg($msg) {
	echo ("<script language=\"javascript\">
	<!--
		alert('$msg');
		history.back();
	//-->
	</script>");
}

##### 에러 발생시 에러코드를 인자로 전달받아 에러 상황에 해당하는 메시지와 함께 popup_msg() 함수를 호출한다.
function error($errcode) {
	switch ($errcode) {
		case ("NOT_FOUND_CONFIG_FILE") :
			popup_msg("현재 디렉토리에 참조할 환경설정 파일이 없습니다.");
			break;

		case ("ACCESS_DENIED_DB_CONNECTION") :
			popup_msg("데이터베이스 연결에 실패하였니다.\\n\\n연결하고자 하는 서버명과 사용자명, 비밀번호를 확인하시길 바랍니다.");
			break;
			
		case ("FAILED_TO_SELECT_DB") :
			popup_msg("지정한 데이터베이스를 작업대상 데이터베이스로 할 수 없습니다.\\n\\n지정한 데이터베이스를 확인하시길 바랍니다.");
			break;
			
		case ("LOGIN_IN_NOT_FOUND") :
			popup_msg("일치하는 회원정보가 없습니다.\\n\\n다시 확인하시고 로그인하세요.");
			break;
			
		case ("LOGIN_INVALID_PW") :
			popup_msg("비밀번호가 틀립니다.\\n\\n비밀 번호를 확인하세요.");
			break;
			
		case ("QUERY_ERROR") :
		   $err_no = mysql_errno();
		   $err_msg = mysql_error();
		   $error_msg = "ERROR CODE " . $err_no . " : " . $err_msg;
		   $error_msg = addslashes($error_msg);
		   popup_msg($error_msg);
		   break;
		  
	}
}

