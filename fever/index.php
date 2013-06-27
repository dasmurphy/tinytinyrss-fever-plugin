<?php

	// do not support refresh command, this could take ages.
	if (isset($_REQUEST["refresh"]))
	{
		exit;
	}


	error_reporting(E_ERROR | E_PARSE);

	require_once "../../config.php";

	set_include_path(dirname(__FILE__) . PATH_SEPARATOR .
		dirname(dirname(dirname(__FILE__))) . PATH_SEPARATOR .
		dirname(dirname(dirname(__FILE__))) . "/include" . PATH_SEPARATOR .
  		get_include_path());

	chdir("../..");

	define('NO_SESSION_AUTOSTART', true);

	require_once "autoload.php";
	require_once "db.php";
	require_once "db-prefs.php";
	require_once "functions.php";
	require_once "fever_api.php";

	define('AUTH_DISABLE_OTP', true);

	if (defined('ENABLE_GZIP_OUTPUT') && ENABLE_GZIP_OUTPUT &&
			function_exists("ob_gzhandler")) {

		ob_start("ob_gzhandler");
	} else {
		ob_start();
	}

	if (!init_plugins()) return;

	$handler = new FeverAPI(Db::get(), $_REQUEST);

	if ($handler->before($method)) {
		if (method_exists($handler, 'index')) {
			$handler->index($method);
		}
		$handler->after();
	}

	ob_end_flush();

?>
