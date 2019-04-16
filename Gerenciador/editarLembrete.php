 <?php
       session_start();
        require("class.form.php");
         echo  '<div class="acesso" ><nav> <div class="nav-wrapper"> <a href="#" class="brand-logo">Bem-vindo '.$_SESSION['nor'].'</a>'.'<ul id="nav-mobile" class="right hide-on-med-and-down">   <li><a href="sair.php">Sair</a></li> </ul> </div> </nav> </div>';
         

        if(isset($_GET['titulo']) && isset($_GET['lembrete'])){

          $formulario = new Form();

          $formulario->setTitulo($_GET['titulo']);
          $formulario->setComentario($_GET['lembrete']);

          $formulario->EditarLembrete($_GET['id']);
        }
      ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
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
 <header>
    </header>
  <body>
    <section>
       

      <div id="marginTop2">
        <div class="row"> 
       <div class="col s4"></div> 

      <div class="col s4">
        <div class="col s12 m6">
            
                <div class="card-content white-text"> 
                  <h3 >Editar lembrete</h3> 
                  <form class="" action="editarLembrete.php" method="get">
      
         <div class="row"> <div class="input-field col s12"> <input id="first_name1" type="text" name="titulo" class="validate" required=""> <label id="labelBranca" class="active" for="first_name1">Titulo</label> </div> </div> 
         <div class="row"> <div class="input-field col s12"> <input  id="first_name2" type="text" name="lembrete" class="validate" required=""> <label id="labelBranca"  class="active" for="first_name2">Descrição</label><input type="hidden" class="input" value="<?php echo $_GET['id']; ?>" name="id"><br> </div> </div>
         
         <div class="row">
        <input type="submit" class="btn-large" id="atualizar" value="Atualizar" name="Enviar Dados">
         <div class="col s2"></div>  
        <a id="btn_white" class="btn-large " href="dentro.php">cancelar</a>
        </div>
      </form>
            
          
      </div>  
     <div class="col s4"></div>
    </div> 
    </div>
    </div>

     
      
    </section>
  </body>
</html>
