<html>
   
   <head>
      <title>Add New Record in MySQL Database</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="../js/formvalidation.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/validationstyle.css">
   </head>
   
   <body>
      <?php
    $HOST = 'localhost';
    $USER= 'root';
    $PASS= '';
    $BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
mysql_query("SET SESSION sql_mode = ''", $conexao);

            ?>
            
               <form method = "post" action = "novocadastro.php" name = "cadform">
                  <table width = "600" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">CPF</td>
                        <td><input name = "cpf" type = "text" 
                           id = "cpf" placeholder="99999999999" >
                           <span  class="erro" id="err1">Por favor insira seu CPF</span>
                          <span class="erro" id="err2">CPF inválido. Por favor insira apenas 11 números. Ex: 99999999999</span>
                           </td>
                     </tr>
                  
                      <tr>
                        <td width = "100">Nome</td>
                        <td><input name = "nome" type = "text" 
                           id = "nome" maxlength="30" placeholder="Primeiro nome">
                           <span  class="erro" id="err3">Por favor insira seu nome</span>
                          <span class="erro" id="err4">Nome inválido. Por favor insira apenas letras. Ex: Maria</span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100">Sobrenome</td>
                        <td><input name = "sobrenome" type = "text" 
                           id = "sobrenome"  maxlength="100" placeholder="Ultimo nome">
                           <span  class="erro" id="err5">Por favor insira seu sobrenome</span>
                          <span class="erro" id="err6">Sobrenome inválido. Por favor insira apenas letras. Ex: Silva</span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100">Ano de nascimento</td>
                        <td><input name = "anonascimento" type = "text" 
                           id = "anonascimento" placeholder="1990">
                           <span  class="erro" id="err7">Por favor insira seu ano de nascimento</span>
                          <span class="erro" id="err8">Data inválida. Por favor insira o ano em que nasceu. Ex: 1980</span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100">Email</td>
                        <td><input name = "email" type = "email" 
                           id = "email" maxlength="140" placeholder="seunome@empresa.com">
                           <span  class="erro" id="err9">Por favor insira seu email</span>
                          <span class="erro" id="err10">Email inválido. Por favor insira um email válido. Ex: mariasilva@empresa.com</span>
                           </td>
                     </tr>

                     <tr>
                        <td width = "100">Senha</td>
                        <td><input name = "senha" type = "password" 
                           id = "senha" maxlength="16" placeholder="00000000">
                           <span  class="erro" id="err11">Por favor insira uma senha</span>
                          <span class="erro" id="err12">Senha inválida. Por favor insira no mínimo 8 caractéres.</span>
                           </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Cadastro">
                        </td>
                     </tr>
                  <!--<script type="text/javascript">
                    $("#cpf").focus( function (){
          $(this).css("border-color", "#cf33e3");
        });
        $("#cpf").blur( function (){
          $(this).css("border-color", "#bb4e2d");
        });!-->

                  </table>
               </form>
   </body>
</html>