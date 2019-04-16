<?php
  session_start();

  if(isset($_SESSION['adm'])){
    echo '<div class="acesso" ><nav> <div class="nav-wrapper"> <a href="#" class="brand-logo">Bem-vindo '.$_SESSION['adm'].'</a>'.'<ul id="nav-mobile" class="right hide-on-med-and-down">   <li><a href="sair.php">Sair</a></li> </ul> </div> </nav> </div>';
    echo '<div class="cadastra">  <a class="btn-large" href="cadastrar.php"><i class="material-icons left">add_circle_outline</i>Cadastrar usuário</a> </div>';
    require("usuario.php");
    require("class.form.php");
    $formulario = new Form();
    $formulario->Seleciona();
   }else if(isset($_SESSION['nor'])){
    echo '<div class="acesso" ><nav> <div class="nav-wrapper"> <a href="#" class="brand-logo">Bem-vindo '.$_SESSION['nor'].'</a>'.'<ul id="nav-mobile" class="right hide-on-med-and-down">   <li><a href="sair.php">Sair</a></li> </ul> </div> </nav> </div>';
    echo '<div class="cadastra">  <a class="btn-large" href="cadastrarLembrete.php"><i class="material-icons left">add_circle_outline</i>Cadastrar lembrete</a> </div>';
    require("class.form.php");
    $formulario = new Form();
    $formulario->SelecionaLembrete($_SESSION['id']);
  }else{
    header('Location: index.php');
    // echo '<script type="text/javascript">window.location = "index.php"</script>';
  }
 ?>




<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
  
  <title>
  </title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="materialize.css">
  <script type="text/javascript" src="materialize.js"></script>
  <title>
  </title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
   <style type="text/css">
    body{
      background-image: url(wallpaper.jpg);
    }
  </style>
   </head>
   
   <body>
    
     <div class="acesso"></div>
   </body>
 </html>