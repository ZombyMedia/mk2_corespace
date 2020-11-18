<?php

function generateCompactUserDataset($uuid, $username, $encryptedPass, $email) {
  $userarray = array(
    'uuid' => $uuid,
    'username' => $username,
    'password' => $encryptedPass,
    'email' => $email
  );
  return $userarray;
}

 ?>
