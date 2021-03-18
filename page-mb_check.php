<?php 

$reciveData = json_decode(file_get_contents('php://input'));

$user_role = [];
if(!empty($reciveData) && !empty(get_user_by('login', $reciveData -> userId))){
  $user_role['user_role'] = get_user_by('login', $reciveData -> userId) -> roles[0];
} else {
  $user_role['user_role'] = 'no data';
}


header('Access-Control-Allow-Origin: *'); 
header('Content-type: application/json'); 


echo json_encode($user_role);