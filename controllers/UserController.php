<?php

use \session\Session as Session;

class UserController extends ApplicationController {
	
	function __construct($view) {
		parent::__construct($view);
	}
	
	function index() {
		
	}

	function edit($id = null) {
		try {
			// Iniciar variables
			
			$selects = array();
			// Obtención de relaciones
			
			if(!is_null($id) && $this->user->id != $id) {
				$this->requireAdmin();
			}
			
			if(!is_null($id) || isset($_POST['id']) && $_POST['id']) {
				$id = (isset($_POST['id']) && $_POST['id'])? $_POST['id'] : $id;
				$user = Doctrine::getTable("User")->find($id);
			} else {
				$user = new User();
			}
			
			// Parámetros para la vista
			$this->selects = $selects;
			$this->euser = $user;
			
			if(isset($_POST['submit'])) {
				// Asignar valores enviados
				
				$user->username = $_POST['username'];
				$user->email = $_POST['email'];
				if($_POST['password'])
					$user->password = md5($_POST['password']);
	
				$fields = array(
					"username" => array(_REQUIRED),
					"email" => array(_REQUIRED)
				);
				
				if(is_null($id))
					$fields['password'] = array(_REQUIRED);
				
				$errors = $this->validateFields($fields);
				if($_POST['password'] != $_POST['password2']) {
					$errors = true;
					$this->addError(_("The passwords don't match"));
				}
				if(!$errors) {
					$user->save();
					$this->redirect("");
				}
			}
			
		} catch (Doctrine_Validator_Exception $e) {
			$this->doctrineValidatorException($e);
			
		} catch (Exception $e) {
			$this->addError(_ERR_UNEXPECTED);
			
		}
	}

	function view($id) {
		if($this->user->id != $id) {
			$this->requireAdmin();
		}
		$entity = Doctrine::getTable("User")->find($id);
		
		if(!$entity) {
			$this->redirect("application/404");
			exit;
		}
		
		$this->user = $entity;
	}
	
	function login() {
		$this->errors = false;
	
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$remember = false; // TODO isset($_POST['remember']) && $_POST['remember'];
				
			$usertable = Doctrine::getTable("User");
			$user = $usertable->findOneByUsername($username);
				
			if($user && $user->password == md5($password)) {
				if($remember) {
					$lifetime = 3600*24*365;
					ini_set('session.cookie_lifetime', $lifetime);
					ini_set('session.gc_maxlifetime', $lifetime+600);
					session_set_cookie_params($lifetime, "/");
				}
				
				session_regenerate_id();
				Session::set('id_user', $user->id);
	
				if($this->redirectTo)
					$this->redirect($this->redirectTo);
				else
					$this->redirect("");
			} else {
				$this->addError(_("Wrong username or password"));
			}
		}
	}
	
	function logout(){
		Session::unsetKey("id_user");
		//setcookie(COOKIE_PREFIX."login", "", time()-36000000, "/");
		header("Location: ". ROOT);
	}
}