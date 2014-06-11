<?php
header("content-type:text/html; charset=UTF-8");

##### ���̺���� ���ڷ� �޾� �ش��ϴ� �̹����� ����Ѵ�.
function printTitleImage($code) {
	$title_image = $code . ".gif";
	echo "<center><img src=\"" . $title_image . "\" border=0></center><p>";
}

##### ���� �ۼ���, HTML �±׸� ����� �������� ��Ÿ���� �޽����� ����Ѵ�.
function printAllowTagMsg($isAllowed) {
	if($isAllowed == "Y") {
		echo "(�±׻�� <font color=red>����</font>)";
	} else {
		echo "(�±׻�� <font color=red>�Ұ�</font>)";
	}
}

##### ���� �߻�� ���ڷ� ��޹��� ���� �޽����� �˾�â�� ��� ����Ѵ�.
function popup_msg($msg) {
	echo ("<script language=\"javascript\">
	<!--
		alert('$msg');
		history.back();
	//-->
	</script>");
}

##### 에러발생시. 에러코드를 인자로 전달받아 에러 상황에 해당하는 메시지와 함께 popup_msg() 함수를 호출한다.
function error($errcode) {
	switch ($errcode) {
		case ("NOT_FOUND_CONFIG_FILE") :
			popup_msg("현재 디렉토리에 참조할 환경설정 파일이 없습니다.");
			break;

		case ("ACCESS_DENIED_DB_CONNECTION") :
			popup_msg("데이터베이스 연결에 실패하였습니다.\\n\\n연결하고자 하는 서버명과 사용자명, 비밀번호를 확인하시길 바랍니다.");
			break;
			
		case ("FAILED_TO_SELECT_DB") :
			popup_msg("지정한 데이터베이스를 작업대상 데이터베이스로 할 수 없습니다.\\n\\n지정한 데이터베이스를 확인하시길 바랍니다.");
			break;
			
		case ("LOGIN_IN_NOT_FOUND") :
			popup_msg("입력하신 로그인 아이디를 찾을 수가 없습니다.");
			break;
			
		case ("LOGIN_INVALID_PW") :
			popup_msg("입력하신 로그인 패스워드가 다릅니다.");
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

