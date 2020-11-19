<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  require('../assets/DBConnector.php');
  require('../assets/cryption.php');
  require('modules/bank/createAccount.php');
  require('modules/bank/deleteAccount.php');
  require('modules/bank/restoreAccount.php');

  $requesttype = $_POST["request"];
  $username = $_POST["username"];
  $bid = $_POST["bankid"];
  $backupcode = $_POST["backupcode"];

  if ($requesttype == "create") {
    $return_value = createBankAccount($conn, $username);
  } elseif ($requesttype == "delete") {
    $return_value = deleteBankAccount($conn, $username, $bid);
    echo $return_value;
  } elseif ($requesttype == "restore") {
    $return_value = restoreBankAccount($conn, $backupcode, $username);
    echo $return_value;
  } elseif ($requesttype == "freeze") {
    // code...
  } else {
    echo "No requesttype specified";
  }

?>
