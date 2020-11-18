<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  require('../assets/DBConnector.php');
  require('modules/bank/createAccount.php');

  $requesttype = $_POST["request"];
  $username = $_POST["username"];

  if ($requesttype == "create") {
    $return_value = createBankAccount($conn, $username);
    var_dump($return_value);
  } elseif ($requesttype == "delete") {
    // code...
  } elseif ($requesttype == "freeze") {
    // code...
  }

?>
