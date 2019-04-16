<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <link rel="stylesheet" type="text/css" href="materialize.css">
  <script type="text/javascript" src="materialize.js"></script>
  
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
  <meta charset="utf-8">
  <title>Inicio de sessão</title>
  <style type="text/css">
    body{
      background-image: url(wallpaper.jpg);
    }
  </style>
  </head>
  
  <body>
    <div id="marginTop">
   <div class="row"> 
       <div class="col s4"></div> 

      <div class="col s4">
        <div class="col s12 m6">
            
                <div class="card-content white-text"> 
                  <h3 >Efetuar login</h3> 
                   <form class="" action="login.php" method="get">
                    <div class="input-field col s6"> 
                      <i class="material-icons prefix">account_circle </i> 
                      <input type="text" name="email" placeholder="e-mail" value="" required="">
                       <label for="icon_prefix"></label>
                      </div> 
                      <div class="input-field col s6"> 
                     <i class="material-icons prefix">lock </i>
                      <input type="password" name="senha" placeholder="senha" value="" required="">
                     <input class="btn-large" type="submit" name="" value="Entrar">
                      </div>  
                </form>
            
          </div>
      </div>  
     <div class="col s4"></div>
    </div> 
    </div>
   </div>



  </body>
</html>
