<form action="post_login" method="post">
	<input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" value="Login">
</form>