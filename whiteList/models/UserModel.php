<?php

class UserModel {
	
	public static function readUsers() {
		$list_of_users = @array();
		
		$item1 = @array();
		$item1['name'] = "Teste 1";
		$item1['mail'] = "teste1@gmail.com";
		$item1['status'] = "1";
		$list_of_users[] = $item1;
		
		$item2 = @array();
		$item2['name'] = "Teste 2";
		$item2['mail'] = "teste2@gmail.com";
		$item2['status'] = "1";
		$list_of_users[] = $item2;
		
		$item3 = @array();
		$item3['name'] = "Teste 3";
		$item3['mail'] = "teste3@gmail.com";
		$item3['status'] = "1";
		$list_of_users[] = $item3;
		
		return $list_of_users;
	}
	
}
?>
