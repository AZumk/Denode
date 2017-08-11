<?php
   
   
    $HOST = 'localhost';
    $USER= 'root';
    $PASS= '';
    $BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
	mysql_query("SET SESSION sql_mode = ''", $conexao);

	session_start();
	$nomeusu = $_SESSION["NOME_PERFUSU"];
  $IDusu = $_SESSION["ID_PERFUSU"];

	$origcpf = '';
	$orignome = '';
	$origsobr = '';
	$origida = '';
	$origemail = '';
	$origsenha = '';

	$result = mysql_query("SELECT ID_PERFUSU, CPF_PERFUSU, NOME_PERFUSU, SOBRENOME_PERFUSU, IDADE_PERFUSU, EMAIL_PERFUSU, SENHA_PERFUSU FROM perfil_usuario WHERE ID_PERFUSU = '$IDusu'");

     while($row = mysql_fetch_array($result, MYSQL_BOTH)) 
          {
          	$ID_USU = $row['ID_PERFUSU'];
    		$origcpf = $row['CPF_PERFUSU'];
   			$orignome= $row['NOME_PERFUSU'];
    		$origsobr= $row['SOBRENOME_PERFUSU'];
    		 $origida = $row['IDADE_PERFUSU'];
			$origemail = $row['EMAIL_PERFUSU'];
			$origsenha = $row['SENHA_PERFUSU'];
			
			}


     if(isset($_POST['submit'])){

          	if(! get_magic_quotes_gpc() ) {
               
               $NOVONOME = addslashes (@$_POST['nome']);
               $NOVOSOBRENOME = addslashes (@$_POST['sobrenome']);
               $NOVOEMAIL = addslashes (@$_POST['email']);
               $Tipo = 2;
               $NOVASENHA = addslashes (@$_POST['senha']);
            }else {
              
               $NOVONOME = $_POST['nome'];
               $NOVOSOBRENOME = $_POST['sobrenome'];
              
               $NOVOEMAIL = $_POST['email'];
               $Tipo = 2;
               $NOVASENHA = $_POST['senha'];
            }
           
            $NOVOCPF = @$_POST['cpf'];
            $NOVOANO = @$_POST['anonascimento'];

            $origcpf = $NOVOCPF;
   			$orignome= $NOVONOME;
    		$origsobr= $NOVOSOBRENOME;
    		 $origida = $NOVOANO;
			$origemail = $NOVOEMAIL;
			$origsenha = $NOVASENHA;


            $sql = "UPDATE `perfil_usuario` SET `CPF_PERFUSU` = '$NOVOCPF', `NOME_PERFUSU` = '$NOVONOME', `SOBRENOME_PERFUSU` = '$NOVOSOBRENOME', `IDADE_PERFUSU` = '$NOVOANO', `EMAIL_PERFUSU` = '$NOVOEMAIL', `SENHA_PERFUSU` = '$NOVASENHA' WHERE `perfil_usuario`.`ID_PERFUSU` = '$ID_USU';";

           $retval = mysql_query($sql, $conexao);
           echo "Cadastro atualizado com sucesso";
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            } 

            }

            mysql_close($conexao);
          

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">CPF</td>
                        <td><input name = "cpf" type = "text" 
                           id = "cpf" value="<?php echo $origcpf; ?>"></td>
                     </tr> <!--- css exemple  input:invalid {border:2px red;} input:valid{border: 2px green}!--> 
                  
                      <tr>
                        <td width = "100">Nome</td>
                        <td><input name = "nome" type = "text" 
                           id = "nome" value="<?php echo $orignome; ?>"></td>
                     </tr>
                     <tr>
                        <td width = "100">Sobrenome</td>
                        <td><input name = "sobrenome" type = "text" 
                           id = "sobrenome" value="<?php echo $origsobr; ?>"></td>
                     </tr>
                     <tr>
                        <td width = "100">Ano de nascimento</td>
                        <td><input name = "anonascimento" type = "text" 
                           id = "anonascimento" value="<?php echo $origida; ?>"></td>
                     </tr>
                     <tr>
                        <td width = "100">Email</td>
                        <td><input name = "email" type = "text" 
                           id = "email" value="<?php echo $origemail; ?>"></td>
                     </tr>

                     <tr>
                        <td width = "100">Senha</td>
                        <td><input name = "senha" type = "password" 
                           id = "senha" value="<?php echo $origsenha; ?>"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "submit" type = "submit" id = "submit" 
                              value = "Atualizar">
                        </td>
                     </tr>
                  
                  </table>
               </form>
               <a href="usudash.php">Voltar para Home</button><br></br>
   
   </body>
</html>