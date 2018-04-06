<?php 
function getUserById($spacialization){
    $user = \App\User::find($user_id);
    return $user;
}
function getSpecializationById($specialization){
    $specialization = \App\Specialization::find($specialization);
    return $specialization;
}

?>