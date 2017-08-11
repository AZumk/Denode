<?php
   
   
    $HOST = 'localhost';
    $USER= 'root';
    $PASS= '';
    $BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
	mysql_query("SET SESSION sql_mode = ''", $conexao);


              if(! get_magic_quotes_gpc() ) {
               
               $Nome = addslashes (@$_POST['nome']);
               $Sobrenome = addslashes (@$_POST['sobrenome']);
               $Email = addslashes (@$_POST['email']);
               $Tipo = 2;
               $Senha = addslashes (@$_POST['senha']);
            }else {
              
               $Nome = $_POST['nome'];
               $Sobrenome = $_POST['sobrenome'];
               $Email = $_POST['email'];
               $Tipo = 2;
               $Senha = $_POST['senha'];
            }
           
            $CPF = @$_POST['cpf'];
            $Idade = @$_POST['anonascimento'];

            $sql = "INSERT INTO perfil_usuario(CPF_PERFUSU, NOME_PERFUSU, SOBRENOME_PERFUSU, IDADE_PERFUSU, EMAIL_PERFUSU, TIPO_PERFUSU, SENHA_PERFUSU) VALUES('$CPF','$Nome','$Sobrenome', '$Idade', '$Email', '$Tipo','$Senha')";

           $retval = mysql_query( $sql, $conexao );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            } else {
            echo "Entered data successfully\n";
            header("Location:denodelogin.php?erro=0");
            }

            mysql_close($conexao);
         
            ?>