<?php
define('Views', 'Views/');
define('CONTROLLER', 'Controllers/');

require_once(Views . 'header.php');

$action = isset($_GET['action']) ? htmlentities($_GET['action']) : 'default';
$controller = '';
switch ($action) {
	case 'Onepage':
		require_once(CONTROLLER . 'OnepageController.php');
		$controller = new OnepageController();
		break;
	case 'Presentation':
		require_once(CONTROLLER . 'PresentationController.php');
		$controller = new PresentationController();
		break;
	case 'Store':
		require_once(CONTROLLER . 'StoreController.php');
		$controller = new StoreController();
		break;
	case 'Contact':
		require_once(CONTROLLER . 'ContactController.php');
		$controller = new ContactController();
		break;


	default:
		require_once(CONTROLLER . 'OnepageController.php');
		$controller = new OnepageController();
		break;
}

$controller->run();
require_once(Views . 'footer.php');
 ?>
