<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  function writeUserdataDB($conn, $uuid, $username, $passwd, $email) {
    $sql = "INSERT INTO users(uuid, username, passwd, email)
      VALUES (\"$uuid\", \"$username\", \"$passwd\", \"$email\")";

    if ($conn->query($sql) === TRUE) {
      return "User created successfully";
    } else {
      return "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function prepareUserData($conn, $userdataset) {
    $uuid = $userdataset["uuid"];
    $username = $userdataset["username"];
    $passwd = $userdataset["password"];
    $email = $userdataset["email"];

    return writeUserdataDB($conn, $uuid, $username, $passwd, $email);
  }

 ?>
