<?php
	function getPriority($page) {
		require("pages/".$page."/config.php");
		return isset($navPriority)?$navPriority:-1;
	}
	function openNavigation() {
		echo '<nav><ul id="navBar">';
	}
	function appendNavigation($name, $active) {
		if ($active) {
			echo '<li class="link active"><a href="/?page='.$name.'">'.$name.'</a></li>';
		}
		else {
			echo '<li class="link"><a href="/?page='.$name.'">'.$name.'</a></li>';
		}
	}	
	function appendList($list, $name, $currentPermission) {
		if (checkPermission($name, $currentPermission)) {
			$listSize = sizeof($list);
			$newPriority = getPriority($name);
			$i = $listSize-1;
			$position = $listSize;
			if ($i >= 0) {
				$currentPriority = getPriority($list[$i]);
				if ($currentPriority < $newPriority) {
					$position = $i;
					$i--;	
				}
				while ($i >= 0 && $currentPriority < $newPriority) {
					$currentPriority = getPriority($list[$i]);
					$position = $i;
					$i--;
				}
			}
			array_splice($list, $position, 0, $name);
			return $list;
		}
		else {
			return $list;
		}
	}
	function closeNavigation() {
		echo '</ul></nav>';
	}
	function checkPermission($page, $currentPermission) {
		require("pages/".$page."/config.php");
		$pagePermission = isset($permission)?$permission:(isset($permission_specific)?$permission_specific:1);
		$pagePermissionSpecific = isset($permission_specific)?$permission_specific:$currentPermission;
		return ($pagePermission<=$currentPermission&&$pagePermissionSpecific==$currentPermission);
	}
	function printStatus() {			
		if (isset($_SESSION['status'])) {
			$statusCode = $_SESSION['status'];
			$status = "";
			$success = false;
			if ($statusCode=="1") {
				$status = "Sie müssen angemeldet sein, um auf diese Seite zu gelangen!";
			}
			elseif ($statusCode=="21") {
				$status = "Bitte geben sie ihren Benutzernamen ein!";
			}
			elseif ($statusCode=="22") {
				$status = "Bitte geben sie ihren Benutzernamen und ihr Passwort ein!";
			}
			elseif ($statusCode=="23") {
				$status = "Falscher Nutzername. Bitte versuchen sie es erneut!";
			}
			elseif ($statusCode=="31") {
				$status = "Bitte geben sie ihr Passwort ein!";
			}
			elseif ($statusCode=="32") {
				$status = "Falsches Passwort. Bitte geben sie ihr Passwort erneut ein!";
			}
			elseif ($statusCode=="33") {
				$status = "Bitte geben sie ihr jetziges Passwort ein!";
			}
			elseif ($statusCode=="34") {
				$status = "Bitte geben sie ihr neues Passwort ein!";
			}
			elseif ($statusCode=="35") {
				$status = "Bitte wiederholen sie ihr neues Passwort!";
			}
			elseif ($statusCode=="36") {
				$status = "Ihr jetziges Passwort ist falsch. Bitte geben sie es erneut ein!";
			}
			elseif ($statusCode=="37") {
				$status = "Die neuen Passwörter stimmen nicht überein!";
			}
			elseif ($statusCode=="38") {
				$status = "Das neue Passwort darf keine Sonderzeichen enthalten!";
			}
			elseif ($statusCode=="41") {
				$status = "Bitte wählen sie alle 3 Projekte!";
			} 
			elseif ($statusCode=="42") {
				$status = "Bitte wählen sie 3 verschiedene Projekte!";
			}
			elseif ($statusCode=="51") {
				$status = "Bitte geben sie ihre E-Mail Adresse ein!";
			}
			elseif ($statusCode=="52") {
				$status = "Bitte geben sie eine Nachricht an!";
			}
			elseif ($statusCode=="53") {
				$status = "Bitte geben sie eine gültige E-Mail Adresse ein!";
			}
			elseif ($statusCode=="61") {
				$status = "Ihre Projekte wurden eingetragen!";
				$success = true;
			}
			elseif ($statusCode=="62") {
				$status = "Ihr Passwort wurde erfolgreich geändert!";
				$success = true;
			}
			elseif ($statusCode=="63") {
				$status = "Ihre Nachricht wurde erfolgreich gesendet!";
				$success = true;
			}
			echo $status;
			unset($_SESSION['status']);
			if ($success==true) {
				echo '<style>.status { color: #18c923 }</style>';
				unset($_SESSION['success']);
			}
		}
	}
?>