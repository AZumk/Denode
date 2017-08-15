<?php
/* logout.php */
session_start();
unset($_SESSION["NOME_PERFUSU"]);
session_destroy();
header("Location:denodelogin.php?erro=4");
?>