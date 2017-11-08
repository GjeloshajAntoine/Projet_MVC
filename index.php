<?php
define('Views', 'Views/');
define('Views', 'Controllers/');
require_once(Views . 'header.php');
$action = isset($_GET['action']) ? htmlentities($_GET['action']) : 'default';
$controller = '';
switch ($action) {
	case 'onepage':
		require_once(CONTROLLER . 'OnepageController.php');
		$controller = new LoginController();
		break;
	case 'presentation':
		require_once(CONTROLLER . 'PresentationController.php');
		$controller = new LogoutController();
		break;
	case 'Store':
		require_once(CONTROLLER . 'StoreController.php');
		$controller = new InventaireController();
		break;
	case 'Contact':
		require_once(CONTROLLER . 'ContactController.php');
		$controller = new ListeLotController();
		break;


	default:
		require_once(CONTROLLER . 'OnepageController.php');
		$controller = new LoginController();
		break;
}

$controller->run();
require_once(Views . 'footer.php');
 ?>
