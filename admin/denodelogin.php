<html>
    <head>
        <title>SISTEMA DE ENSINO</title>
        <meta charset="UTF-8">
        </head>
        <body>
        	<div id="cadastro">
	<form method="post" action="validaLogIn.php">
		<fieldset>
			<legend>Login</legend>
		<label>Email:</label><br>
			<input type="text" name="email" maxlength="50" required/><br>
	 	<label>Senha:</label><br>
			<input type="password" name="senha" maxlength="50" required/><br>
			<span>Cadastre-se clicando<a href="denodecadastro.php"> aqui</a></span><br>
	 		<input type="submit" value="Entrar" />
	 	</fieldset>
	</form>
	<?php
	error_reporting(0);
	$erro=$_GET['erro'];
	if(isset($erro)){
		switch ($erro) {
			case 0:
				echo"<div style='width:99%;height:30px;background:#0099cc;border-radius:10px;border:1px solid blue;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Cadastro efetuado com sucesso!!!</center></div>";
				break;
			case 1:
				echo"<div style='width:99%;height:30px;background:darkred;border-radius:10px;border:1px solid red;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Erro ao fazer o Login. Senha Inválida!</center></div>";
			break;
			case 2:
				echo"<div style='width:99%;height:30px;background:darkred;border-radius:10px;border:1px solid red;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Erro ao fazer o Login. Usuario Inválido!</center></div>";
			break;
            case 3:
                echo"<div style='width:99%;height:30px;background:darkred;border-radius:10px;border:1px solid red;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Erro! Você deve estar Logado para acessar o conteúdo.</center></div>";
            break;
            case 4:
                echo"<div style='width:99%;height:30px;background:darkred;border-radius:10px;border:1px solid red;color:#fff;font-family:Arial;margin:5px 5px;padding-top:10px;'><center>Você foi desconectado!</center></div>";
            break;
            case 5:
            break;
		}}
	

?>

        </body>
        </html>