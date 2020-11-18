<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

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
