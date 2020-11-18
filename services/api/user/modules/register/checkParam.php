<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

  function checkUsername($username) {
    if (strlen($username) >= 3) {
      return "ok";
    } else {
      return "Min length of 3";
    }
  }

  function checkPassword($passwd) {
    if (strlen($passwd) >= 8) {
      return "ok";
    } else {
      return "Password is to short < 8";
    }
  }

  function checkEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "ok";
    } else {
      return "This is not an email-address";
    }
  }

  function checkParameter($username, $passwd, $email) {
    if ($username) {
      $result_username = checkUsername($username);
    }
    if ($passwd) {
      $result_passwd = checkPassword($passwd);
    }
    if ($email) {
      $result_email = checkEmail($email);
    }

    if ($result_username == "ok" && $result_passwd == "ok" && $result_email == "ok") {
      return "valid";
    } else {
      $validationErr = array(
        'username' => $result_username,
        'password' => $result_passwd,
        'email' => $result_email
      );

      return $validationErr;
    }
  }

 ?>
