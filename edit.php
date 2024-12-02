<?php

require 'config.php';

if($_POST){
   $title = $_POST['title'];
   $description = $_POST['description'];
   $id = $_POST['id'];

   $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$description' WHERE id='$id'");
   $result = $pdostatement->execute();

   if($result) {
      echo "<script>alert('Completely Updated.');window.location.href='index.php';</script>";
   }
   
}else {
   $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
   $pdostatement->execute();
   $result = $pdostatement->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Edit </title>
</head>
<body>
   <div class="card">
      <div class="card-body">
         <h2>Edit Todo</h2>
         <form class="" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
            <div class="form-group">
               <label for="">Title</label>
               <input type="text" name="title" value="<?php echo $result[0]['title'] ?>" class="form-control">
            </div>
            <div class="form-group" >
               <label for="">Description</label>
               <textarea class="form-control" name="description" rows='8' cols='80'><?php echo $result[0]['description'] ?></textarea>
            </div> 
            <div class="form-group">
               <input type="submit" class="btn btn-success" name="" value="UPDATE">
               <a type="button" href="index.php" class="btn btn-warning">Back</a>
            </div>
         </form>
      </div>
   </div>
</body>
</html>