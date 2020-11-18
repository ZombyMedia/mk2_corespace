<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->


<?php
  require('../assets/DBConnector.php');

  require('modules/register/checkParam.php');
  require('modules/register/encryptPassword.php');
  require('modules/register/checkduplicates.php');
  require('modules/register/generateUUID.php');
  require('modules/register/registerUserDB.php');
  require('modules/register/generateUserDataset.php');

  $username = $_POST["username"];
  $passwd = $_POST["passwd"];
  $email = $_POST["email"];



  $validationResult = checkParameter($username, $passwd, $email);
  if ($validationResult == "valid") {
    $dubResult = checkDBForDuplicates($conn, $username, $email);

    if ($dubResult == true) {
      $encryptedPass = passencrypt($passwd);
      $uuid = generateUUID();

      $userdataset = generateCompactUserDataset($uuid, $username, $encryptedPass, $email);
      echo prepareUserData($conn, $userdataset);

    } else {
      echo "This User is already registered";
    }
  } else {
    foreach ($validationResult as $value) {
      if ($value != "ok") {
        echo $value;
      }
    }
  }
?>
