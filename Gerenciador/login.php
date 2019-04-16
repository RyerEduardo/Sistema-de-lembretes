<?php
  require("conexao.php");

  if(isset($_GET['email']) && isset($_GET['senha'])){
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $get = mysqli_query($conexao, $sql);
    $num = mysqli_num_rows($get);

    session_start();

    if($num == 1) {
    	while ($percorrer = mysqli_fetch_array($get)) {
        $adm = $percorrer['adm'];
        $nome = $percorrer['nome'];
        $id = $percorrer['id'];

        if($adm == 1){
          $_SESSION['adm'] = $nome;
        }else{
          $_SESSION['nor'] = $nome;
          $_SESSION['id'] = $id;
        }
        header('Location: dentro.php');
        // echo '<script type="text/javascript">window.location = "dentro.php"</script>';
      }
    } else {
    	echo '
      
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
                  <h3 >Autenticação inválida!</h3> 
                   
                     <a id="btn_white" class="btn-large" href="index.php">Voltar</a>
                      <div id="marginTop3" class="row"><div class="col s4"></div>  </div>
            
          </div>
      </div>  
     <div class="col s4"></div>
    </div> 
    </div>
   </div>



  </body>
</html>';

    }
  }
?>
