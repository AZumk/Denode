<?php 
session_start();
$nome = $_SESSION['NOME_PERFUSU'];
$_SESSION["ID_PERFUSU"];
echo "bem vindo ".$nome;
?>

<html>
    <head>
        <title>SISTEMA DE ENSINO</title>
        <meta charset="UTF-8">
        </head>
        <body>
        <br></br>
        <a href="denodelogout.php">Log Out</button><br></br>
         <a href="editcadastro.php">Editar</button><br></br>
         <a href="perfildador.php">Perfil da dor</button><br></br>
         <a href="editcadastro.php">Solicitar Exclusão</button><br></br>
         <a href="editcadastro.php">Ajuda</button><br></br>
         <a href="editcadastro.php">Sua postura!</button><br></br>

        </body>
	</html>