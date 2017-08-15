<?php
    $HOST = 'localhost';
    $USER= 'root';
    $PASS= '';
    $BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
	mysql_query("SET SESSION sql_mode = ''", $conexao);
  require_once('Bcrypt.php');


              if(! get_magic_quotes_gpc() ) {
               
               $Nome = addslashes (@$_POST['nome']);
               $Sobrenome = addslashes (@$_POST['sobrenome']);
               $Email = addslashes (@$_POST['email']);
               
            }else {
              
               $Nome = $_POST['nome'];
               $Sobrenome = $_POST['sobrenome'];
               $Email = $_POST['email'];
            }
           
            $CPF = $_POST['cpf'];
            $Idade = $_POST['anonascimento'];
            $Tipo = 2;

            //senha super hashing
            $Senha = $_POST['senha'];
            // Gera um hash baseado em bcrypt
            $hash = Bcrypt::hash($Senha);
            $Senha = $hash;



            function validaNumero($x){
              htmlspecialchars($x);
              $x = filter_var($x, FILTER_SANITIZE_NUMBER_INT);
              if ($x = filter_var($x, FILTER_VALIDATE_INT)) {
                return $x;
                } else {
                  //what will happen tho
                }}

            function validaString($x){
              htmlspecialchars($x);
              $x = filter_var($x, FILTER_SANITIZE_STRING);
                  return $x;
              } 

            function validaEmail($x){
              htmlspecialchars($x);
              $x = filter_var($x, FILTER_SANITIZE_EMAIL);
              if ($x = filter_var($x, FILTER_VALIDATE_EMAIL)) {
                return $x;
              } else {
                //what will happen tho
              }} 

              function validaCPF($x) {
                htmlspecialchars($x);
                if (is_numeric($x)){
                  return $x;
                } else {
                  //what will happen tho
                }}

              $Nome = validaString($Nome);
              $Sobrenome = validaString($Sobrenome);
              $Email = validaEmail($Email);
              $CPF = validaCPF($CPF);
              $Idade = validaNumero($Idade);

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