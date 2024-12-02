<?php

require 'config.php';

if ($_POST)
{
   $title = $_POST['title'];
   $description = $_POST['description'];

   $sql = "INSERT INTO todo(title,description) VALUES (:title, :description) ";
   $pdostatement = $pdo->prepare($sql);
   $result = $pdostatement->execute(
      array(
         'title'=>$title,
         'description'=>$description
      )
      );
   if ($result){
      echo "<script>alert('Completely Created.');window.location.href='index.php';</script>";
   };
   
      
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Create New</title>
</head>
<body>
   <div class="card">
      <div class="card-body">
         <h2>Create Todo</h2>
         <form class="" action="create.php" method="post">
            <div class="form-group">
               <label for="">Title</label>
               <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group" >
               <label for="">Description</label>
               <textarea class="form-control" name="description" id="" rows='8' cols='80'></textarea>
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-primary" name="" value="SUBMIT">
               <a type="button" href="index.php" class="btn btn-warning">Back</a>
            </div>
         </form>
      </div>
   </div>
</body>
</html>