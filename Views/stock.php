<?php
$db = new PDO('mysql:host=localhost;dbname=projet_mvc;charset=utf8', 'root', '');
$req=$db->query("SELECT * FROM stock_element");
$data=$req->fetchAll();
 ?>

<ul>
  <?php
  for ($i=0; $i < count($data); $i++) {
    ?>
    <li>
      <img src="<?php echo $data[$i]['image'] ?>" alt="">
    </li>
    <?php
  }
   ?>
</ul>
