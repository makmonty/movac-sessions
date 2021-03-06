<?php

/**
 * UserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('User');
    }
    
    public function getAllAsSelect() {
    	$q = Doctrine_Query::create()
    		->select("u.id, u.username")
    		->from("User u")
    		->orderBy("u.username ASC");
    	
    	$u = $q->fetchArray();
    	$users = array();
    	foreach($u as $user) {
    		$users[$user['id']] = $user['username'];
    	}
    	
    	return $users;
    }
}