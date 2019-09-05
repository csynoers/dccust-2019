<?php
// Random Username dan Password
function generateRandomUser($length, $jml) {
 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()';
    $charactersLength = strlen($characters);

$randomUser = '';
$hasilString = '';
 
  // For Jumlah
  for ($j = 0; $j < $jml; $j++) {
  
   // For Random Username
   for ($i = 0; $i < $length; $i++) {
    $randomUser .= $characters[rand(0, $charactersLength - 1)];
   }
   
  
  }
 
    return $randomUser;
}

function generateRandomPass($length, $jml) {
 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()';
    $charactersLength = strlen($characters);

$randomPass = '';
$hasilString = '';
 
  // For Jumlah
  for ($j = 0; $j < $jml; $j++) {
  
   // For Random Username
   for ($i = 0; $i < $length; $i++) {
    $randomPass .= $characters[rand(0, $charactersLength - 1)];
   }
   
  
  }
 
    return $randomPass;
}


?>
