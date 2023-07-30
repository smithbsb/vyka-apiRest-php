<?php

require_once('../whiteList/models/UserModel.php');

class UserController {
	
	public static function readUsers() {
		$userModel = new UserModel();
		return $userModel->readUsers();
	}
	
}

?>
