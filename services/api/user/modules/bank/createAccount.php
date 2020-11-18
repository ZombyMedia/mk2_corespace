<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->


<?php

  function getUserIDByUsername($conn, $username) {
    $sql = "SELECT * FROM users WHERE username=\"$username\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    return $dbresult["uuid"];
  }

  function generateBankID() {
    return uniqid();
  }

  function createBankDataset($bid, $uuid) {
    $bankDataset = array(
      'bid' => $bid,
      'uuid' => $uuid,
      'credits' => 100
    );

    return $bankDataset;
  }

  function pushDatasetDB($conn, $bankDataset) {
    $uuid = $bankDataset["uuid"];
    $bid = $bankDataset["bid"];
    $credits = $bankDataset["credits"];

    if ($uuid != null) {
      if ($bid != null) {
        if ($credits) {
          $sql = "INSERT INTO bank(bid, bcOwner, credits)
            VALUES (\"$bid\", \"$uuid\", \"$credits\")";

          if ($conn->query($sql) === TRUE) {
            return "BankAccount created successfully";
          } else {
            return "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      }
    }
  }

  function createBankAccount($conn, $username) {
    $uuid = getUserIDByUsername($conn, $username);
    $bid = generateBankID();
    $bankDataset = createBankDataset($bid, $uuid);
    return pushDatasetDB($conn, $bankDataset);
  }

?>
