<?php
include 'config.php';
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
  $Tipo = $_POST['admin'];

  //IMAGEM UPLOAD
  $nome_image = $_FILES['foto_perfil']['name'];
  $tmp_image = $_FILES['foto_perfil']['tmp_name'];
  $type_image = $_FILES['foto_perfil']['type'];
  $size_image = $_FILES['foto_perfil']['size'];

  $NomeImg = '';
  $Local = '';
 //VERIFICAR O QUE AQUI É NECESSSARIO PARA VERIFICACAO

function validaImagem($erro){
  if($erro == 1){
    echo "Extensao invalida", "\n";
  } else if ($erro == 2){
    echo "Imagem inexistente", "\n";
  } else if($erro == 3){
    echo "Imagem muito grande", "\n";
  }};

$path_parts = pathinfo($nome_image);
$allowed = array('gif', 'jpeg', 'png', 'jpg');
/*$info = getimagesize($tmp_image);
$ext = image_type_to_extension($info[2]);
echo $ext;
echo $info['mime'], "\n";*/
if(!in_array($path_parts['extension'], $allowed)){
//EXTENSAO INVALIDA
  echo "imagem invalida\n";
  echo $path_parts['dirname'], "\n";
  echo $path_parts['basename'], "\n";
  echo $path_parts['extension'], "\n";
  echo $path_parts['filename'], "\n";
  validaImagem(1);

}else if($tmp_image == 'none' || $size_image == 0){
  //IMAGEM INEXISTENTE
  echo "imagem invalida\n";
  echo $nome_image, "\n";
  echo $tmp_image, "\n";
  echo $type_image, "\n";
  echo $size_image, "\n";
  echo $path_parts['extension'], "\n";
  validaImagem(2);

} else if ($size_image > 16777215){
  //IMAGEM MUITO GRANDE
  echo "imagem invalida\n";
  echo $nome_image, "\n";
  echo $tmp_image, "\n";
  echo $type_image, "\n";
  echo $size_image, "\n";
  echo $path_parts['extension'], "\n";
  validaImagem(3);

} else {
  //EXTENSAO VALIDA
  $NomeImg = $CPF.$Idade.'.'.$path_parts['extension'];
  $path_parts['filename']=$NomeImg;
  $Local = ('../img/'.$NomeImg);
  move_uploaded_file($tmp_image, $Local);
  echo $NomeImg;
  echo $Local;
};
//CHECA SE TEM PASSE DE ADMIN
    if(isset($Tipo)){
    switch ($Tipo) {
      case 2:
        $Tipo = 2;
        echo "admin";
      break;
      case 1:
      $Tipo = 1;
      echo "peao";
      break;
      default:
      $Tipo = 1;
      echo "recebi nada\n";
      break;
    }}

//SENHA SUPER HASHING
$Senha = $_POST['senha'];
 //GERA HASH EM BCRYPT
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

 $sql = "INSERT INTO perfil_usuario(CPF_PERFUSU, NOME_PERFUSU, SOBRENOME_PERFUSU, IDADE_PERFUSU, EMAIL_PERFUSU, TIPO_PERFUSU, IMAGEM_PERFUSU, LOCALIMG_PERFUSU, SENHA_PERFUSU) VALUES('$CPF','$Nome','$Sobrenome', '$Idade', '$Email', '$Tipo', '$NomeImg', '$Local', '$Senha')";

$retval = mysql_query( $sql, $conexao );

 if(! $retval ) {
die('Could not enter data: ' . mysql_error());
} else {
echo "Entered data successfully\n";
//header("Location:denodelogin.php?erro=0");
 }
 mysql_close($conexao);
         
         //ALTER TABLE `perfil_usuario` ADD `IMAGEM_PERFUSU` MEDIUMBLOB NOT NULL AFTER `TIPO_PERFUSU`;
        //ALTER TABLE `perfil_usuario` ADD `LOCALIMG_PERFUSU` VARCHAR(40) NOT NULL AFTER `IMAGEM_PERFUSU`;
            /*$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $nome_image));
if ((($type_image == "image/gif")
|| ($type_image == "image/jpeg")
|| ($type_image == "image/jpg")
|| ($type_image == "image/png"))
&& ($size_image < 20000)
&& in_array($extension, $allowedExts) && $tmp_image != 'none' && $size_image > 0){

  //move_uploaded_file($nome_image, $local);
  $temp = explode(".", $nome_image);
  $Novonome_img = $CPF.$Idade . '.' . end($temp); //novo nome de arquivo
  move_uploaded_file($tmp_image, "../imagens/" . $Novonome_img);
  $Local = ('imagens/' .$Novonome_img);
} else {
  echo 'upload failed';
};*/
            ?>
