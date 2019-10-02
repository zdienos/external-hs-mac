<html>
<title>...</title>
<body>
<form name="redirect" action="<?php echo $login;?>" method="post">
<input type="hidden" name="dst" value="<?php echo $dst;?>">
<input type="hidden" name="domain" value="">
<input type="hidden" name="password" value="<?php echo $password;?>">
<input type="hidden" name="username" value="<?php echo $username;?>">
<input type="hidden" name="error" value="<?php echo $error;?>">
</form>
<script language="JavaScript">
<!--
	document.redirect.submit();
//-->
</script>
</body>
</html>
