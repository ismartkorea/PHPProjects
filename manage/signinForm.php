<?php 
require_once("common/include.header.php");
?>
  <script type="text/javascript">
  $("document").ready(function() {
		$("#submitBtn").bind(onSubmit);

		$("#submitBtn").click(onSubmit);
  });
 // ���� ó��.
  onSubmit = function() {
  var frm = document.frm;
		if(frm.loginId.value == "") {
			alert("���̵� �Է��ϼ���!");
			frm.loginId.focus();
			return false;
		}
		if(frm.loginPwd.value == "") {
			alert("�н����带 �Է��ϼ���!");
			frm.loginPwd.focus();
			return false;
		}
		document.frm.method = "post";
		document.frm.action = "signin.php";
		document.frm.submit();
  }
  </script>
  </head>
 
  <body>
 
    <div class="container">
 
      <form id="frm" name="frm" class="form-signin">
        <h2 class="form-signin-heading">�α��� ���̵�/�н����� �Է��ϼ���.</h2>
        <input type="text" id="loginId" name="loginId" class="form-control"  autofocus required>
        <input type="password" id="loginPwd" name="loginPwd" class="form-control" placeholder="�н�����" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">���̵� ����ϱ�
        </label>
        <button id="submitBtn" name="submitBtn" class="btn btn-lg btn-primary btn-block" type="submit">�α���</button>
      </form>
 
    </div> <!-- /container -->
 
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
