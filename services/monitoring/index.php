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

  </body>
</html>
