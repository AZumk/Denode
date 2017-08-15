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

    //VALORES A SEREM INSERIDOS
    $MEMBROS = '';
    $FREQDOR = '';
    $PSTBRAÇO = '';
    $PSTCOSTAS = '';
    $PSTPERNA = '';
    $PAUSAS = '';
    $FREQPAUSA = '';
    $INFLUENCIA = ''; 


    //VAI CHECAR SE JA EXISTE UMA ENTRADA NO PERFIL DA DOR
    $exist = mysql_query("SELECT ID_PERFDOR FROM perfil_dor WHERE ID_PERFUSU = '$IDusu'");

    if(mysql_num_rows($exist) > 0) {
        echo "já tem cadastro da dor";
        
        $result = mysql_query("SELECT MEMBRO_PERFDOR, FREQUENCIA_PERFDOR, POSTBRACOS_PERFDOR, POSTCOSTAS_PERFDOR, POSTPERNAS_PERFDOR, PAUSAS_PERFDOR, FREQPAUSAS_PERFDOR, INFLUENCIA_PERFDOR FROM perfil_dor WHERE ID_PERFDOR=(SELECT MAX(ID_PERFDOR) FROM perfil_dor WHERE ID_PERFUSU = '$IDusu')");
        //tinha pensado em usar isso como placeholder mas fiz isso antes de ver que era tudo em radial ou checkbox então pode ser usado pra fazer algum relatoriozinho mostrando talvez a ultima atualizacao da pessoa pra ela mesma comparar? 

     while($row = mysql_fetch_array($result, MYSQL_BOTH)) 
          {
            //VALORES DE REFERENCIA DA ULTIMA ATUALIZACAO REF
            $refmembrostring = $row['MEMBRO_PERFDOR'];
            $reffreq = $row['FREQUENCIA_PERFDOR'];
            $refbrac= $row['POSTBRACOS_PERFDOR'];
            $refcos= $row['POSTCOSTAS_PERFDOR'];
            $refper = $row['POSTPERNAS_PERFDOR'];
            $refpaus = $row['PAUSAS_PERFDOR'];
            $reffrqpa = $row['FREQPAUSAS_PERFDOR'];
            $refinf = $row['INFLUENCIA_PERFDOR'];
            $refmembro = explode(",", $refmembrostring[0]);
            //passar os dados como $refmembro[0];
            
            }

    } else {
        echo "ainda não tem cadastro da dor";

            $refmembro = '';
            $reffreq = '';
            $refbrac = '';
            $refcos = '';
            $refper = '';
            $refpaus = '';
            $reffrqpa = '';
            $refinf = '';

    }

    if(isset($_POST['submit'])){

               $PSTBRACO = $_POST['posbra'];
               $PSTCOSTAS = $_POST['poscos'];
               $PSTPERNA = $_POST['pospern'];
               $PAUSAS = $_POST['pausas'];
               $FREQPAUSA = $_POST['freqpaus'];
               $INFLUENCIA = $_POST['freqpaus'];

            $listaMEMBROS = $_POST['membros'];
            $MEMBROS = implode(",", $listaMEMBROS);

            $listaFREQDOR = array ($_POST['braco'], $_POST['punho'], $_POST['cervical'], $_POST['pernas'], $_POST['pes'], $_POST['costas'], $_POST['tronco']);
            $FREQDOR = implode(",", $listaFREQDOR);

            $sql = "INSERT INTO perfil_dor(ID_PERFUSU, MEMBRO_PERFDOR, FREQUENCIA_PERFDOR, POSTBRACOS_PERFDOR, POSTCOSTAS_PERFDOR, POSTPERNAS_PERFDOR, PAUSAS_PERFDOR, FREQPAUSAS_PERFDOR, INFLUENCIA_PERFDOR) VALUES('$IDusu', '$MEMBROS','$FREQDOR','$PSTBRACO', '$PSTCOSTAS', '$PSTPERNA', '$PAUSAS','$FREQPAUSA', '$INFLUENCIA')";

           $retval = mysql_query( $sql, $conexao );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            } else {echo "Cadastro atualizado com sucesso"; }

            }

            mysql_close($conexao);
?>
	<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>

    <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" name = "perfildor">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td>
                            <label>Braços</label>
                            <input type="checkbox" name="membros[]" value="1">
                        </td>
                        <td>
                            <label>Punhos</label>
                            <input type="checkbox" name="membros[]" value="2">
                        </td>
                        <td>
                            <label>Cervical</label>
                            <input type="checkbox" name="membros[]" value="3">
                        </td>
                        <td>
                            <label>Pernas</label>
                            <input type="checkbox" name="membros[]" value="4">
                        </td>
                        <td>
                            <label>Pés</label>
                            <input type="checkbox" name="membros[]" value="5">
                        </td>
                        <td>
                            <label>Costas/Lombar</label>
                            <input type="checkbox" name="membros[]" value="6">
                        </td>
                        <td>
                            <label>Tronco</label>
                            <input type="checkbox" name="membros[]" value="7">
                        </td>
                     </tr>
                     <tr><div id="freqbra">
                        <td>
                            <label>Braços</label>
                            <input type="radio" name="braco" value="1">
                            <input type="radio" name="braco" value="2">
                            <input type="radio" name="braco" value="3">
                            <input type="radio" name="braco" value="4">
                        </td></div><div id="freqpun">
                        <td>
                            <label>Punhos</label>
                            <input type="radio" name="punho" value="1">
                            <input type="radio" name="punho" value="2">
                            <input type="radio" name="punho" value="3">
                            <input type="radio" name="punho" value="4">
                        </td></div><div id="freqcerv">
                        <td>
                            <label>Cervical</label>
                            <input type="radio" name="cervical" value="1">
                            <input type="radio" name="cervical" value="2">
                            <input type="radio" name="cervical" value="3">
                            <input type="radio" name="cervical" value="4">
                        </td></div><div id="freqper">
                        <td>
                            <label>Pernas</label>
                            <input type="radio" name="pernas" value="1">
                            <input type="radio" name="pernas" value="2">
                            <input type="radio" name="pernas" value="3">
                            <input type="radio" name="pernas" value="4">
                        </td></div><div id="freqpe">
                        <td>
                            <label>Pés</label>
                            <input type="radio" name="pes" value="1">
                            <input type="radio" name="pes" value="2">
                            <input type="radio" name="pes" value="3">
                            <input type="radio" name="pes" value="4">
                        </td></div><div id="freqcos">
                        <td>
                            <label>Costas/Lombar</label>
                            <input type="radio" name="costas" value="1">
                            <input type="radio" name="costas" value="2">
                            <input type="radio" name="costas" value="3">
                            <input type="radio" name="costas" value="4">
                        </td></div><div id="freqtro">
                        <td>
                            <label>Tronco</label>
                            <input type="radio" name="tronco" value="1">
                            <input type="radio" name="tronco" value="2">
                            <input type="radio" name="tronco" value="3">
                            <input type="radio" name="tronco" value="4">
                        </td></div>
                     </tr>
                     <tr>
                         <td>
                            <label>Como você deixa suas pernas normalmente</label>
                            <input type="radio" name="pospern" value="1">
                            <input type="radio" name="pospern" value="2">
                            <input type="radio" name="pospern" value="3">
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <label>Qual a posicao das suas costas</label>
                            <input type="radio" name="poscos" value="1">
                            <input type="radio" name="poscos" value="2">
                        </td>
                     </tr>
                      <tr>
                         <td>
                            <label>E como seus bracos ficam normalmente</label>
                            <input type="radio" name="posbra" value="1">
                            <input type="radio" name="posbra" value="2">
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <label>Voce faz pausas durante o expediente</label>
                            <input type="radio" name="pausas" value="1">
                            <input type="radio" name="pausas" value="2">
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <label>Qual a frequencia das pausas</label>
                            <input type="radio" name="freqpaus" value="1">
                            <input type="radio" name="freqpaus" value="2">
                            <input type="radio" name="freqpaus" value="3">
                            <input type="radio" name="freqpaus" value="4">
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <label>Qual o tempo das pausas</label>
                            <input type="radio" name="durpaus" value="1">
                            <input type="radio" name="durpaus" value="2">
                            <input type="radio" name="durpaus" value="3">
                            <input type="radio" name="durpaus" value="4">
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <label>Voce acredita que o trabalho influencia sua dor</label>
                            <input type="radio" name="freqpaus" value="1">
                            <input type="radio" name="freqpaus" value="2">
                        </td>
                     </tr>
            </table>
            <input name = "submit" type = "submit" id = "submit" 
                              value = "Enviar">
        </form>
       
               <a href="usudash.php">Voltar para Home</button><br></br>
   
   </body>
</html>