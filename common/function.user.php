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

##### ���� �߻�� �����ڵ带 ���ڷ� ��޹޾� ���� ��Ȳ�� �ش��ϴ� �޽����� �Բ� popup_msg() �Լ��� ȣ���Ѵ�.
function error($errcode) {
	switch ($errcode) {
		case ("NOT_FOUND_CONFIG_FILE") :
			popup_msg("���� ���丮�� ������ ȯ�漳�� ������ ����ϴ�.");
			break;

		case ("ACCESS_DENIED_DB_CONNECTION") :
			popup_msg("�����ͺ��̽� ���ῡ �����Ͽ��ϴ�.\\n\\n�����ϰ��� �ϴ� ������� ����ڸ�, ��й�ȣ�� Ȯ���Ͻñ� �ٶ�ϴ�.");
			break;
			
		case ("FAILED_TO_SELECT_DB") :
			popup_msg("������ �����ͺ��̽��� �۾���� �����ͺ��̽��� �� �� ����ϴ�.\\n\\n������ �����ͺ��̽��� Ȯ���Ͻñ� �ٶ�ϴ�.");
			break;
			
		case ("LOGIN_IN_NOT_FOUND") :
			popup_msg("��ġ�ϴ� ȸ�������� ����ϴ�.\\n\\n�ٽ� Ȯ���Ͻð� �α����ϼ���.");
			break;
			
		case ("LOGIN_INVALID_PW") :
			popup_msg("��й�ȣ�� Ʋ���ϴ�.\\n\\n��� ��ȣ�� Ȯ���ϼ���.");
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

