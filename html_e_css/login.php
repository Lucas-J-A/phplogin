<?php
session_start();
/*Inclui conexao.php na pagina*/
include('conexao.php');

/*verifica se usuario ou senha foram mandadas via post para verifica e válidar se nao volta para home */
if(
    empty($_POST['usuario'])
    
    || 
    empty($_POST['senha'])
    ){

header("Location: index.php");
exit();
}

/*mysqli_real_escape_string ele protege se existe ataque de sql injection*/
$usuario = mysqli_real_escape_string($conexao,$_POST['usuario']);$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

/*Query para executar e ver se retorna alguma informção*/
$query = "select usuario from usuario where usuario='{$usuario}' and senha= md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario']= $usuario;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    
    exit();
}