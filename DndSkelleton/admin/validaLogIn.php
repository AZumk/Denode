<?php
   
   
    $HOST = 'localhost';
    $USER= 'root';
    $PASS= '';
    $BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
mysql_query("SET SESSION sql_mode = ''", $conexao);

$valorEmail = $_POST["email"];
$valorSenha = $_POST["senha"];

if($valorEmail && $valorSenha != '') {
			$sql = mysql_query("SELECT * FROM perfil_usuario WHERE EMAIL_PERFUSU ='$valorEmail'");//seleciona o banco dados loginfum nome logADM
			$cont = mysql_num_rows($sql);//cont recebe a a linha selecionada
				while($linha = mysql_fetch_array($sql)){
					$senha_db = $linha["SENHA_PERFUSU"];	
					$nomeusu = $linha["NOME_PERFUSU"];
					$IDusu = $linha["ID_PERFUSU"];
					$Tipo = $linha["TIPO_PERFUSU"];
					//echo $ativo;
				}
				if($cont==0){//se o login do adm não for o cadastrado
					header("Location:admin/denodelogin.php?erro=2");
				}
				else{	

					if($senha_db != $valorSenha){//se a senha não for igual a que o admim cadastrou
					header("Location:denodelogin.php?erro=1");
					}
					
					else{	
						session_cache_expire(30); //expira em quanto tempo?
						session_start();
						$_SESSION["NOME_PERFUSU"]= $nomeusu; //aqui é pra deixar o email oupuxar o nome?
						$_SESSION["ID_PERFUSU"] = $IDusu;

						if($Tipo = 1){
						header("location:usudash.php");	
					} else {
						header("location:admindash.php");	
					}


							//session_destroy();
						}
							
				}
		}

            ?>