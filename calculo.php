<?php
if(isset($_POST['submit'])){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha = md5($senha);

     $file = fopen("usuario.txt", "a");

     fwrite($file, $usuario.$senha." |");
     

     fclose($file);

}

header("Location: index.php");



?>