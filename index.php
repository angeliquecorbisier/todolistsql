<?php


require ('connection.php');

$sql = "SELECT * FROM task_list WHERE user_id = '".$_SESSION["user_id"]."' ORDER BY task_list_id DESC";

$results = $pdo->prepare($sql);

$results->execute();

$resultsall = $results->fetchAll();

?>

<!DOCTYPE html>
<html>
 <head>
  <title> </title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 </head>
 <body>
  
  <br />
  <br />
  <div class="container d-flex justify-content-center" style="width: 500px;">
   <h1 class="text-center">My To-Do List</h1>
   <br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-12">
       <h3 class="panel-title">To do</h3>
   <div class="list-group">
       <?php
       foreach($resultsall as $row)
       {
        $style = '';
        if($row["task_status"] == 'yes')
        {
         $style = 'text-decoration: line-through';
        }
        echo '<a href="#" style="'.$style.'" class="list-group-item" id="list-group-item-'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge" data-id="'.$row["task_list_id"].'">X</span></a>';
       }
       ?>
       </div>
       </div>
       </div>
       </div>


   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-12">
       <h3 class="panel-title">Add new task</h3>
      </div>
     </div>
    </div>
      <div class="panel-body">
       <form method="post" id="to_do_form">
        <span id="message"></span>
        <div class="input-group">
         <input type="text" name="task_name" id="task_name" class="form-control input-lg" autocomplete="off" placeholder="Title..." />
         <div class="input-group-btn">
          <button type="submit" name="submit" id="submit" class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
         </div>
        </div>
       </form>
       <br />
       
      </div>
     </div>
  </div>

  <footer>

  <script type="text/javascript" src="script.js"></script>

  </footer>

 </body>
</html>

