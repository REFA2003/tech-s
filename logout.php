<?php

session_start();

unset($_SESSION["username"]);
session_destroy();
echo "<script type='text/javascript'>
       alert('Kamu berhasil Log Out')
       window.location='login/index.php'
       </script>
       "

?>