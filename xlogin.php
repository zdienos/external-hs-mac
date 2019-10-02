<?php
/**
 * require_once library yang dibutuhkan
 */
require_once 'protected/libs/db/meekrodb.2.3.class.php';
require_once 'protected/libs/routeros-api/routeros_api.class.php';

/**
* load configuration
*/
$config = require 'protected/config/app.php';

/**
 * Database
 */
DB::$host = $config['db']['host'];
DB::$dbName = $config['db']['dbname'];
DB::$user = $config['db']['username'];
DB::$password = $config['db']['password'];
DB::$port = $config['db']['port'];

/**
* Process login data
*/
if (isset($_POST['external-login']))
{
	$login = $_POST['link-login-only'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$error = $_POST['error'];
	$dst = "https://www.google.com";

	//Connect to router OS
	$API = new RouterosAPI();
	$API->port = $config['router']['port'];
	$API->debug = false;

	if ($API->connect($config['router']['ip'], $config['router']['username'], $config['router']['password']))
	{
		//Check user in router
		$user_router = $API->comm('/ip/hotspot/user/print',[
			'?name' => $_POST['username']
		]);
		$user_router = $user_router ? true : false;

		//Check user in database
		$user_db = DB::query("SELECT * FROM mikrotik_user_hotspot WHERE username=%ls",[$_POST['username']]);
		$user_db = $user_db ? true : false;

		//If user not found in router & db, lets create it
		if (!$user_db && !$user_router)
		{
			//add hotspot user via API
			$API->comm('/ip/hotspot/user/add', [
				'name' => $_POST['username'],
				'password' => $_POST['password'],
				'profile' => "uprof1",
			]);

			//save user to database
			DB::insert('mikrotik_user_hotspot',[
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'created_at' => date('Y-m-d H:i:s'),
			]);
		} else {
			//create user in db if not exist
			if (!$user_db)
			{
				//save user to database
				DB::insert('mikrotik_user_hotspot',[
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'created_at' => date('Y-m-d H:i:s'),
				]);
			}

			//create user in router if not exist
			if (!$user_router)
			{
				//add hotspot user via API
				$API->comm('/ip/hotspot/user/add', [
					'name' => $_POST['username'],
					'password' => $_POST['password'],
					'profile' => "uprof1",
				]);
			}
		}

		//if user in db and router with correct password found, save log to db
		if ($user_db)
		{
			//Check user in router
			$user_router_valid = $API->comm('/ip/hotspot/user/print',[
				'?name' => $_POST['username'],
				'?password' => $_POST['password'],
			]);
			$user_router_valid = $user_router ? true : false;

			//if user and password valid, store log to db
			if ($user_router_valid)
			{
				DB::insert('mikrotik_user_log',[
					'message' => 'user ' .$_POST['username']. 'login with  IP: ' .$_POST['ip']. ' and MAC-ADDR:' .$_POST['mac'],
					'created_at' => date('Y-m-d H:i:s'),
				]);
			}
		}

	} else {
		die('could not connect to router.');
	}

}
?>

<?php if (isset($_POST['external-login'])) : ?>
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
<?php endif; ?>
