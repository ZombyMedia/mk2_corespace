<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  function checkExistsUsername($conn, $username) {
    $sql = "SELECT * FROM users WHERE username=\"$username\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    if ($dbresult) {
      return true;
    } else {
      return false;
    }
  }

  function checkExistsEmail($conn, $email) {
    $sql = "SELECT * FROM users WHERE email=\"$email\"";
    $result = $conn->query($sql);
    $dbresult = $result->fetch_assoc();

    if ($dbresult) {
      return true;
    } else {
      return false;
    }
  }

  function checkDBForDuplicates($conn, $username, $email) {
    if (!checkExistsUsername($conn, $username)) {
      if (!checkExistsEmail($conn, $email)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

 ?>
