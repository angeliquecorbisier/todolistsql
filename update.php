<?php


require ('connection.php');

if($_POST["task_list_id"])
{
 $data = array(
  ':task_status'  => 'yes',
  ':task_list_id'  => $_POST["task_list_id"]
 );

 $sql = "UPDATE task_list SET task_status = :task_status WHERE task_list_id = :task_list_id";

 $results = $pdo->prepare($sql);

 if($results->execute($data))
 {
  echo 'done';
 }
}

?> 