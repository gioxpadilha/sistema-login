<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css"/>
    <title>SISTEMA LOGIN</title>
</head>
<body>
    <div id="cadastro">
    <a href="cadastro.php">Cadastro</a>
    </div>

    <div id ="titulo"> 
    <h2>Controle de Acesso</h2> 
</div> 
<?php
    session_start(); 
    date_default_timezone_set("America/Sao_Paulo"); 

    if(!isset($_SESSION['usuario'])){
    ?>
        <div="formulario"> 
        <form name="form-usuario" autocomplete="off" id="form" method="POST"> 
            <div class="input">
            <legend>Faça seu Login caso já esteja cadastrado:</legend>
                <input type="text" name="usuario" required placeholder="Usuário">
                <input name="senha" type="text" placeholder="Senha">
            </div> 

            <div class="input">
                <input type="submit" name="enviar" value="Enviar"> 
            </div> 
        </form> 
    </div> 
        
    <?php 
        $usuario="Indefinido"; 
        if(isset($_POST['enviar'])) {
            $_SESSION["usuario"]=$_POST['usuario']; 
            header("location:index.php"); 
        }
    }else {
        $usuario=$_SESSION['usuario']; 
        echo "Bem Vindo"."\n".$usuario."\n";
        echo "<a href='index.php?acao=logout' >Logout</a>"; 

        if(isset($_GET['acao'])){
            if($_GET['acao']=="logout"){
                unset($_SESSION['usuario']); 
                header("location:index.php");
            }
        }
    }
    ?>
    
    </hr> 
    <div id="lista"> 
    <?php 
        $data=date("d/m/Y"); 

        $hora=date("h:i:s"); 

        $str="\n".$data."|".$hora."|".$usuario."\n"; 

        if($file=fopen("usuario.log", 'a')); {
            fwrite($file,$str); 

            fclose($file);
        }
        if(isset($_SESSION['usuario'])){
            if($file=fopen("usuario.log", 'r')){
                while($linha=fgets($file)){
                    echo $linha."</br>";
                }
            }
        }
  ?>
  </div> 
</body>
</html> 
