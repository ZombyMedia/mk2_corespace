<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  function getCredits($conn, $bid) {
    $sql = "SELECT * FROM bank WHERE bid=\"$bid\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    return $dbresult["credits"];
  }

  function createBackupCode($username, $bid, $credits) {
    $backupDataset = array(
      'username' => $username,
      'source' => $bid,
      'credits' => $credits
    );

    return encrypt(serialize($backupDataset), "$username");
  }

  function removeAccount($conn, $bid) {
    $sql = "DELETE FROM bank WHERE bid=\"$bid\"";

    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  function deleteBankAccount($conn, $username, $bid) {
    $LOCredits = getCredits($conn, $bid);
    $backupcode = createBackupCode($username, $bid, $LOCredits);
    if (removeAccount($conn, $bid)) {
      return $backupcode;
    } else {
      return "ERROR: bankid is not correct or account doesn't exist";
    }
  }

?>
