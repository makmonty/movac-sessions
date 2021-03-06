<?php

/**
 * User
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class User extends BaseUser
{
	public static $logged_user = null;

	public static function isLoggedIn() {
		return self::$logged_user && !!self::$logged_user->id;
	}
	
	public static function isAdmin() {
		return self::isLoggedIn() && self::$logged_user->admin;
	}
}