<?php


require ('connection.php');

if($_POST["task_name"])
{
 $data = array(
  ':user_id'  => $_SESSION['user_id'],
  ':task_details' => trim($_POST["task_name"]),
  ':task_status' => 'no'
 );

 $sql = " INSERT INTO task_list (user_id, task_details, task_status) VALUES (:user_id, :task_details, :task_status)";

 $results = $pdo->prepare($sql);

 if($results->execute($data))
 {
  $task_list_id = $pdo->lastInsertId();

  echo '<a href="#" class="list-group-item" id="list-group-item-'.$task_list_id.'" data-id="'.$task_list_id.'">'.$_POST["task_name"].' <span class="badge" data-id="'.$task_list_id.'">X</span></a>';
 }
}


?>