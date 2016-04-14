<?php

use \session\Session as Session;

View::addTemplatesDir(__DIR__ ."/views");
Controller::addControllersDir(__DIR__ ."/controllers");
Doctrine_Core::loadModels(dirname(__FILE__).'/models');



\hook\Hook::add("controller_construct_end", function($key, $controller) {
	
	session_name(COOKIE_PREFIX."login");
	session_save_path(__DIR__ ."/sessions");
	session_start();
	
	$usertable = Doctrine::getTable("User");
	$user = (Session::issetKey('id_user')) ? $usertable->find(Session::get('id_user')) : false;
	
	if (!$user)
		$user = new User();
	
	$controller->user = $user;
	
	User::$logged_user = $user;
	
	$controller->isLoggedIn = User::isLoggedIn();
	$controller->isAdmin = User::isAdmin();
});