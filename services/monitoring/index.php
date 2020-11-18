<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

require('assets/DBConnector.php');

  // $sql = "SELECT * FROM users";
  // $result = $conn->query($sql);
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monitoring DB</title>
    <link rel="stylesheet" href="../assets/styles/css/monitoring.css">

    <script type="text/javascript">
      var timeout = setTimeout("location.reload(true);",5000);
      function resetTimeout() {
        clearTimeout(timeout);
        timeout = setTimeout("location.reload(true);",5000);
      }
    </script>
  </head>
  <body>
    <table>
      <tr>
        <th scope="col">UUID</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Email</th>
      </tr>
      <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
            echo "<tr class=\"users-display\">";
            echo "<td class=\"users\">" . $row["uuid"] . "</td>";
            echo "<td class=\"users\">" . $row["username"] . "</td>";
            echo "<td class=\"users\">" . $row["passwd"] . "</td>";
            echo "<td class=\"users\">" . $row["email"] . "</td>";
            echo "</tr>";
          }
      ?>
    </table>
    </br>
    <table>
      <tr>
        <th scope="col">BID</th>
        <th scope="col">UUID</th>
        <th scope="col">CREDITS</th>
        <th scope="col">PENDING</th>
      </tr>
      <?php
        $sql = "SELECT * FROM bank";
        $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
            echo "<tr class=\"users-display\">";
            echo "<td class=\"users\">" . $row["bid"] . "</td>";
            echo "<td class=\"users\">" . $row["bcOwner"] . "</td>";
            echo "<td class=\"users\">" . $row["credits"] . "</td>";
            echo "<td class=\"users\">" . $row["pendingCredits"] . "</td>";
            echo "</tr>";
          }
      ?>
    </table>
  </body>
</html>
