<?php
   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=Products', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//echo '<pre>';
//var_dump($_SERVER);
//echo '</pre>';
//exit;
$errors = [];

$SKU = '';
$Name = '';
$Price = '';
$Switcher = '';
$product_type = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $SKU=$_POST['sku'];
$Name=$_POST['name'];
$Price=$_POST['price'];
$Switcher=$_POST['Switcher'];
$product_type=$_POST['product_type'];


if (!$SKU){
  $errors[] = 'Product SKU is required';
}
if (!$Name){
  $errors[] = 'Product Name is required';
}
if (!$Price){
  $errors[] = 'Product Price ($) is required';
}
if (!$Switcher){
  $errors[] = 'Product Switcher is required';
}
if (!$product_type){
  $errors[] = 'Product product_type is required';
}


if(empty($errors)){
  $statement = $pdo->prepare("INSERT INTO Book(sku, name, price, Switcher, product_type)
  VALUES(:SKU, :Name, :Price, :Switcher, :product_type)");
$statement->bindVAlue(':SKU', $SKU);
$statement->bindVAlue(':Name', $Name);
$statement->bindVAlue(':Price', $Price);
$statement->bindVAlue(':Switcher', $Switcher);
$statement->bindVAlue(':product_type', $product_type);

$statement->execute();
header('Location: index.php');
}
  



}

?>

<!doctype html>
<html lang="en">

  <head >
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   
    <title>ADD Product</title>
    
      <h1><strong>ADD Product</strong></h1><hr>
      
  <p2><a href="Cansel.php" type="reset" name="cansel" class="btn btn-sm btn-danger">Cansel</a></p2>
      <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
              <?php foreach ($errors as $error): ?>
                 <div><?php echo $error  ?></div>

                <?php endforeach; ?>

              </div>
      <?php endif; ?>

    <style>

        h1 {
          color:whitesmoke;
          text-shadow: 2px 2px black;
    font-family: myFirstFont;
  padding-top: -100px;
  padding-right: 20px;
  padding-bottom: 10px;
  padding-left: 80px;
}
       h1 {

        cursor:pointer;
        position: relative;
            
            color: whitesmoke;
       }
       body {
        cursor:pointer;
        position: relative;
            left: 250px;
            width:450px;
            top: 110px;
            background-color: #5F9EA0;
            color: black;
        }
        p {
          transition: width 2s, height 2s, transform 2s;
          cursor:pointer;
    border: none;
    position: relative;
     top: -132px;
     right: -420px;
     display: inline-block;
    cursor: pointer;
    color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px grey;
}

p2 {
  transition: width 2s, height 2s, transform 2s;
          cursor:pointer;
    border: none;
    position: relative;
     top: -70px;
     right: -480px;
     display: inline-block;
  color: #fff;
border: none;
border-radius: 15px;
box-shadow: 0 9px grey;
}


  div {
    font-family: myFirstFont;
   src: url(sansation_light.woff);
  }
  #book, #furn, #dvd,#switcher{
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#dvd, #book, #furn{
  padding: 10px;
  display: none;
}
body {
  background-color: #708090;
}
 
h3 {
  transform: translate(550px, 50px);
  font-size: 20px;
  background: red;
  position: relative;
  animation: mymove 5s infinite;
}
@keyframes mymove {
  0%   {top: 0px; left: 0px; background: red;}
  25%  {top: 0px; left: 200px; background: blue;}
  50%  {top: 200px; left: 200px; background: yellow;}
  75%  {top: 200px; left: 0px; background: green;}
  100% {top: 0px; left: 0px; background: red;}
}
    </style>
  </head>

  <body>
  <h3>Scandiweb Test Assigment</h3>

   
  <form method="post">
  <p> <button type="submit" name="save" class="btn btn-sm btn-success">Save</button></p>
  <div class="mb-3">
    <label>SKU</label><br>
    <input type="text" class="form-control" name="sku" value="<?php echo $SKU ?>"> 
  </div>

  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $Name ?>">
  </div>

  <div class="mb-3">
    <label>Price ($)</label>
    <input type="number" class="form-control" name="price" value="<?php echo $Price ?>">
  </div>

  <div class="mb-3">
    <label>Switcher</label>
    <input type="text" class="form-control" name="Switcher" value="<?php echo $Switcher ?>">
  </div>

  <div class="mb-3">
    <label>product_type</label>
    <input type="text" class="form-control" name="product_type" value="<?php echo $product_type ?>">
  </div>


  </div>
 //<script>
//$(document).ready(function(){
 // $("#switcher").click(function(){
 //   $("#dvd, #book, #furn").hide();
  //});
  //$("#switcher").click(function(){
  //  $("#dvd, #book, #furn").slideDown("slow");
 // });
//});

 
   
</form>


   

  </body>
</html>