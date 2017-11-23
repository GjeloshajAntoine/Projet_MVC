<?php
try
{
    // On se connecte à MySQL
    $pdo = new PDO('pgsql:host=ec2-46-137-174-67.eu-west-1.compute.amazonaws.com;dbname=d3fmoqhijn278b;', 'bucrjmolqcpjoo', '7488cefd06f0942075be16c3c73fe5ae9106b5e8bb75ecffcf400ce3ea85e3e5');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$query = 'INSERT INTO categories (nom, description) VALUES (?, ?);';
$prep = $pdo->prepare($query);
 
$prep->bindValue(1, 'bertand', PDO::PARAM_STR);
$prep->bindValue(2, 'ceci est un test pour desc', PDO::PARAM_STR);
$prep->execute();
$resultat = $pdo->query('SELECT * FROM categories');
while ($donnees = $resultat->fetch())
{
  echo '<br/>';
  echo $donnees['nom'];
  echo ' : ';
  echo $donnees['description'];
}


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
