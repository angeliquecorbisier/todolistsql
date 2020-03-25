<?php


require ('connection.php');

if($_POST["task_list_id"])
{
 $data = array(
  ':task_list_id'  => $_POST['task_list_id']
 );

 $sql = "DELETE FROM task_list WHERE task_list_id = :task_list_id";

 $results = $pdo->prepare($sql);

 if($results->execute($data))
 {
  echo 'done';
 }
}



?>