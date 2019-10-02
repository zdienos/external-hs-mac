<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotik extends CI_Controller {

	public function index()
	{
		$error = isset($_POST['error']) ? $_POST['error'] : '';
		if (isset($_POST['mikrotik-hs'])) {
			echo $error;
			$this->load->view('login_hs');
		}
		else{
			//echo "without";
 			$this->load->view('login_without_hs');
		}
	}

	public function login() {
		$this->load->library('RouterOSAPI');

 		$external_login = $this->input->post('external-login');


		if(isset($external_login)){

			$login 		= $this->input->post('link-login-only');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$error  	= $this->input->post('error');
			$dst = "https://www.google.com";

			//Connect to router OS
			$mtk_port = $this->config->item('port');
			$mtk_user = $this->config->item('username');
			$mtk_pass = $this->config->item('password');
			$mtk_ip   = $this->config->item('ip');
			$API = new RouterOSAPI();
			$API->port = $mtk_port;
			$API->debug = true;

			if ($API->connect($mtk_ip, $mtk_user, $mtk_pass))
			{
				//Check user in router
				$user_router = $API->comm('/ip/hotspot/user/print',['?name' => $username]);
				$user_router = $user_router ? true : false;

				//Check user in database
				//$user_db = DB::query("SELECT * FROM mikrotik_user_hotspot WHERE username=%ls",[$_POST['username']]);
				//$user_db = $user_db ? true : false;
				$user_db='';

				//If user not found in router & db, lets create it
				if (!$user_db && !$user_router)
				{
					//add hotspot user via API
					$API->comm('/ip/hotspot/user/add', [
						'name' => $username,
						'password' => $password,
						'profile' => "uprof1",
					]);

					//save user to database
					// DB::insert('mikrotik_user_hotspot',[
					// 	'username' => $_POST['username'],
					// 	'password' => $_POST['password'],
					// 	'created_at' => date('Y-m-d H:i:s'),
					// ]);
				} else {
					//create user in db if not exist
					// if (!$user_db)
					// {
					// 	//save user to database
					// 	DB::insert('mikrotik_user_hotspot',[
					// 		'username' => $_POST['username'],
					// 		'password' => $_POST['password'],
					// 		'created_at' => date('Y-m-d H:i:s'),
					// 	]);
					// }

					//create user in router if not exist
					if (!$user_router)
					{
						//add hotspot user via API
						$API->comm('/ip/hotspot/user/add', [
							'name' => $username,
							'password' => $password,
							'profile' => "uprof1",
						]);
					}
				}

				//if user in db and router with correct password found, save log to db
				// if ($user_db)
				// {
				// 	//Check user in router
				// 	$user_router_valid = $API->comm('/ip/hotspot/user/print',[
				// 		'?name' => $_POST['username'],
				// 		'?password' => $_POST['password'],
				// 	]);
				// 	$user_router_valid = $user_router ? true : false;
				//
				// 	//if user and password valid, store log to db
				// 	if ($user_router_valid)
				// 	{
				// 		DB::insert('mikrotik_user_log',[
				// 			'message' => 'user ' .$_POST['username']. 'login with  IP: ' .$_POST['ip']. ' and MAC-ADDR:' .$_POST['mac'],
				// 			'created_at' => date('Y-m-d H:i:s'),
				// 		]);
				// 	}
				// }

			} else {
				die('could not connect to router.');
			}

		}
//
		if(isset($external_login)){			
			$data['login']    = $login;
			$data['username'] = $username;
			$data['password'] = $password;
			$data['error']  	= $error;
		 	$this->load->view('login',$data);
		}
//
	}






}
