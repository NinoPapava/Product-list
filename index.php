<?php
   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=Products', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$statement = $pdo->prepare('SELECT * FROM Book');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">

  <head >
  
  <h2>Scandiweb Test Assigment</h2>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>

    
    <link href="app.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Product list</title>


    
  <h1 style="cursor:pointer;"><strong>Product List</strong></h1><hr>
  
  <p><a href="create.php" type="submit" id="Add-button" name="submit" 
       value="ADD" onclick="" 
       class="btn btn-sm btn-success">ADD</a></p>
 
  

   <style>
    .product >div {
      margin: 0;
      border:#333 3px solid;
      border-style: groove;
      width: 200px;
      height: 150px;
      box-shadow: black;

    }
    .product > div { 
      cursor:pointer;
    background-color:#808080;
    color: whitesmoke;
      text-align: center;
      border-bottom-left-radius: 5px;
      border-style: solid;

    }
    .product >div:hover {
      text-align: center; 
      }
       .product{
       grid-gap: 20px;
       display: grid;  
       grid-template-columns: repeat(4, 1fr);
       border-collapse: separate;
       border-spacing: 10px;
       }
  h1 {
    color:whitesmoke;
    text-shadow: 2px 2px black;
    font-family: myFirstFont;
    color: whitesmoke;
    position: relative;
    padding-top: 0px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 80px;
  }
   h2 {
    color: whitesmoke;
  text-shadow: black;
    font-family: myFirstFont;
    font-size: 20px;
    padding-top: 0px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 120px;
    position: relative;
  animation-name: mymove;
  animation-duration: 60s;
   }
   @keyframes mymove {
  from {left: 0px;}
  to {left: 1000px;}
  
    }


body {
  background-color: #708090;
}
h3 {
  position: absolute;
  left: 1140px;
  top: 40px;
}
p {
  position: absolute;
  left: 1080px;
  top: 55px;
}
   </style>
    
    

  </head>

  <body>
     <h3><button type="submit" id="delete-button" name="submit" 
       value="MASS DELETE" onclick="" 
       class="btn btn-sm btn-danger">MASS DELETE</button></h3>

     <script>
      $(document).ready(function(){
        $("#delete-button").click(function(){
          var productIds=[]
          $.each($("input[name='check']:checked"),function(){
            productIds.push($(this).val())
          })
          console.log(productIds)
          $publisher_id = 1;
          $sql = 'DELETE FROM publishers WHERE publisher_id = :publisher_id';
          $operation = $pdo->prepare($sql);
          $operation->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);
        })
      })

     </script>

     <form method="POST">
     <tbody>
  
     
     <div class="product">
     <?php foreach ($products as $i => $book) {?>
      <div><br>
       <td><input type="checkbox" class="delete-checkbox" name="check" value="<?php echo $book['id']; ?>"></td>
      <td><?php echo $book['SKU'].'<br>' ?></td>
      <td><?php echo $book['Name'].'<br>' ?></td>
      <td><?php echo $book['Price'].'<br>' ?></td>
      <td><?php echo $book['Switcher']; 
                 echo $book['product_type'].'<br>' ?></td>
      </div>
      
      <?php } ?>
     </tbody>

     </form>
     
  </body>
</html>