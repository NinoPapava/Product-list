<?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=Products', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $statement = $pdo->prepare('SELECT * FROM Book');
  $statement->execute();
  $products = $statement->fetchAll(PDO::FETCH_ASSOC);

  header('Location: index.php');

?>