<?php

  function checkDBForDuplicates($conn, $username, $email) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
  }

 ?>
