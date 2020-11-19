<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->


<?php

  // Checks if the bankaccount with the given id exists
  function testForBankID($conn, $bid) {
    $sql = "SELECT * FROM bank WHERE bid=\"$bid\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    if ($dbresult) {
      return true;
    } else {
      return false;
    }
  }

  // Checks if the given bank account is owned by the same user
  // that is trying to restore the given credit amount
  function checkAccountOwner($conn, $bid, $uuid) {

    $sql = "SELECT * FROM bank WHERE bid=\"$bid\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    if ($dbresult["bcOwner"] == $uuid) {
      return true;
    } else {
      return false;
    }
  }

  function addToExistingAccount($conn, $bid, $credits) {
    $altAccountCredits = getCredits($conn, $bid);
    $newCreditAmount = $altAccountCredits + $credits;

    $sql = "UPDATE bank SET credits=\"$newCreditAmount\" WHERE bid=\"$bid\"";

    if ($conn->query($sql) === TRUE) {
      return "BankAccount restored successfully";
    } else {
      return "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function createNewAccount($conn, $uuid, $credits) {
    $newBid = generateBankID();

    $sql = "INSERT INTO bank(bid, bcOwner, credits)
      VALUES (\"$newBid\", \"$uuid\", \"$credits\")";

    if ($conn->query($sql) === TRUE) {
      return "BankAccount created successfully";
    } else {
      return "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function restoreBankAccount($conn, $backupcode, $username) {
    $accountDataset = unserialize(decrypt($backupcode, $username));
    $test_result = testForBankID($conn, $accountDataset["source"]);
    $uuid = getUserIDByUsername($conn, $username);
    $bid = $accountDataset["source"];
    $credits = $accountDataset["credits"];

    if ($test_result) {
      if (checkAccountOwner($conn, $bid, $uuid)) {
        return addToExistingAccount($conn, $bid, $credits);
      } else {
        return createNewAccount($conn, $uuid, $credits);
      }
    } else {
      return createNewAccount($conn, $uuid, $credits);
    }
  }

?>
