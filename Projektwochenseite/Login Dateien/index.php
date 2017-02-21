<?php	
	session_start();
			
	# --- TEST SETTINGS --- #
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	set_include_path(__DIR__);	#Benötigt?
	#$_SESSION['permission'] = 2;
	# ---               --- #
	
	if (!isset($_SESSION['permission'])) {		
		header("Location: login/login.php");
	}
	elseif (isset($_GET['page'])) {	
		echo '<link rel="stylesheet" href="style.css">';	
		require_once("functions.php");	
		$dir = scandir("pages");
		$dirSize = sizeof($dir);
		$dirList = [];
		for ($i = 0; $i < $dirSize-2; $i++) {
			$dirList = appendList($dirList, $dir[$i+2], $_SESSION['permission']);
		}
		openNavigation();
		for ($i = 0; $i < sizeof($dirList); $i++) {
			appendNavigation($dirList[$i], ($dirList[$i]==$_GET['page']));
		}
		closeNavigation();		
		if (in_array($_GET['page'], $dirList)) {
			require("pages/".$_GET['page']."/content.php");
			addBackToTopButton();
		}
		else {
			require("pages/NotFound/content.php");
		}
	}
	else {
		header("Location: /?page=Start");
	}
?>
