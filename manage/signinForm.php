<?php 
require_once("common/include.header.php");
?>
  <script type="text/javascript">
  $("document").ready(function() {
		$("#submitBtn").bind(onSubmit);

		$("#submitBtn").click(onSubmit);
  });
 // Submit 처리.
  onSubmit = function() {
  var frm = document.frm;
		if(frm.loginId.value == "") {
			alert("로그인 아이디를 입력하세요!");
			frm.loginId.focus();
			return false;
		}
		if(frm.loginPwd.value == "") {
			alert("로그인 패스워드를 입력하세요!");
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
        <h2 class="form-signin-heading">관리자 화면</h2>
        <input type="text" id="loginId" name="loginId" class="form-control"  autofocus required>
        <input type="password" id="loginPwd" name="loginPwd" class="form-control" placeholder="패스워드 입력하세요." required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">아이디 저장
        </label>
        <button id="submitBtn" name="submitBtn" class="btn btn-lg btn-primary btn-block" type="submit">저장</button>
      </form>
 
    </div> <!-- /container -->
 
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
