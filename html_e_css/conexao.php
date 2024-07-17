<?php
/*Define as variaveis para  conexao*/
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');
/*chama a conexao com banco de dados*/
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

/**/ 