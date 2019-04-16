  <?php
         session_start();
        require("class.form.php");
        echo  '<div class="acesso" ><nav> <div class="nav-wrapper"> <a href="#" class="brand-logo">Bem-vindo '.$_SESSION['adm'].'</a>'.'<ul id="nav-mobile" class="right hide-on-med-and-down">   <li><a href="sair.php">Sair</a></li> </ul> </div> </nav> </div>';
        
        
        if(isset($_GET['nome'])){
          $formulario = new Form();

          if($_GET['adm'] != 1){ //validando valor zero no botão de comutação
            
             $formulario->setNome($_GET['nome']);
              $formulario->setEmail($_GET['email']);
              $formulario->setAdm(0);
             $formulario->setSenha($_GET['senha']);

             $formulario->Atualiza($_GET['id']);
          }
          else{
          $formulario->setNome($_GET['nome']);
          $formulario->setEmail($_GET['email']);
          $formulario->setAdm($_GET['adm']);
          $formulario->setSenha($_GET['senha']);

          $formulario->Atualiza($_GET['id']);
          }
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
   <header>
      
    </header>
  <body>
    
      <div id="marginTop3"> 
      <div class="row"> 
       <div class="col s4"></div> 

      <div class="col s4">
        <div class="col s12 m6">
            
                <div class="card-content white-text"> 
                  <h3 >Edição de usuário</h3> 
       <form class="" action="atualizar.php" method="get">
      
         <div class="row"> 
          <div class="input-field col s12"> 
            <input id="nome" type="text" name="nome" class="validate" required=""> <label id="labelBranca" class="active" for="nome">Nome</label>
          </div> 
        </div> 
         <div class="row"> 
          <div class="input-field col s12"> 
            <input  id="email" type="text" name="email" class="validate" required=""> <label id="labelBranca" class="active" for="email"> E-mail</label>
          </div> 
        </div> 
        <div class="row"> 
          <div class="input-field col s12"> 
             <input id="senha" type="password" name="senha" required=""><br/><label  id="labelBranca"  class="active" for="senha"> Senha</label>
          </div> 
        </div> 
        <div class="row"> 
          <div class="col s3"></div>
          <div class="col s6"> 
            
             <div class="switch"> 
             <h6>Tipo: </h6> <label  id="labelBranca" > Comum <input type="checkbox" name="adm" value="1"> <span  id="labelBranca" class="lever"></span> ADM </label> </div>
          </div> 
          <div class="col s3"></div>
        </div> 
        
         <div class="row"><div id="marginTop3" > </div>
         <input type="hidden" class="input" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="row">
          <input type="submit" class="btn-large" id="cadastrar" value="Atualizar" name="Enviar Dados">
         <div class="col s2"></div>  
        <a id="btn_white" class="btn-large " href="dentro.php">cancelar</a>
        </div>
      </form>
                     
      </div>  
     <div class="col s4"></div>
    </div> 
    </div>
     </div>
   
  </body>

</html>




