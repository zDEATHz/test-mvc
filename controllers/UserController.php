<?php

class UserController extends Controller {
	
	public function __construct() {
		$this->pageData['message']="";
		$this->view = new View();
	}
	
	public function login() {
		$pageTpl = '/views/login.tpl.php';
		$this->pageData['isAdmin'] = false;
		
		if(!empty($_POST['login']) && !empty($_POST['password'])){
		
			
			$login = $_POST['login']; 
			$password = $_POST['password'];
		
			if(($login === ADMIN_LOGIN) && ($password === ADMIN_PASSWORD)){
				
				setcookie ("login",$login, time() + 50000, "/");                         
				setcookie ("password", md5($login.$password), time() + 50000, "/");
				$this->pageData['message'] = "Авторизация выполнена";
				$this->pageData['isAdmin'] = true;
				
			}
			else{
				$this->pageData['message'] = "Вы ввели неверное имя или пароль";
			}
			
		}
		
		if($this->isAdmin() == true){
			$this->pageData['isAdmin'] = true;
		}
		
		$this->pageData['title'] = "Авторизация";
		$this->view->render($pageTpl, $this->pageData);
	}
	
	public function logout() {
		$pageTpl = '/views/login.tpl.php';
		if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
			setcookie('login', null, -1, '/');
			setcookie('password', null, -1, '/');
			$this->pageData['message'] = "Вы деавторизованы";
		}
		$this->pageData['isAdmin'] = false;
		$this->view->render($pageTpl, $this->pageData);
	}
	
	public function isAdmin(){
		
		if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
			$login = $_COOKIE['login']; 
			$password = $_COOKIE['password'];
			
			if(($login == ADMIN_LOGIN) && ($password == md5(ADMIN_LOGIN.ADMIN_PASSWORD))){
				return true;
			}
			else{
				return false;
			}
		}
	}
	
}