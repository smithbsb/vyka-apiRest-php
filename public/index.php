<?php

if ($_SERVER['HTTP_HOST'] != 'localhost') {
	if(!$_SERVER['HTTPS']) { header("Location: https://".$_SERVER['SERVER_NAME']); }
}

header('Content-Type: application/json');

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once($_SERVER['DOCUMENT_ROOT']  . '/../whiteList/util/Constants.php');

if ($_GET['url']) {
	$u = explode('/', htmlspecialchars($_GET['url'], ENT_QUOTES, 'UTF-8'));
	
	if (file_exists(CONTROLLERS.'/'.ucfirst($u[0]).'Controller.php')) {
		require_once(CONTROLLERS.'/'.ucfirst($u[0]).'Controller.php');
		
		$controller = ucfirst($u[0]).'Controller';
		
		if (method_exists($controller, $u[1])) {
			$response = call_user_func_array(array(new $controller, $u[1]), $u);
			
			http_response_code(200);
			echo json_encode(array('status' => 'sucess', 'data' => $response));
			exit();
			
		} else {
			http_response_code(404);
			echo json_encode(array('status' => 'error', 'data' => 'Method not found.'));
			exit();
		}
	} else {
		http_response_code(404);
		echo json_encode(array('status' => 'error', 'data' => 'Controller not found.'));
		exit();
	}
} else {
	http_response_code(404);
	echo json_encode(array('status' => 'error', 'data' => 'Service not found.'));
	exit();
}

?>
