<?php
  require ("conexao.class.php");
  Class Form extends Conexao{
    private $nome;
    private $email;
    private $adm;
    private $senha;
    private $titulo;
    private $comentario;

    function Form(){
      $nome = "";
      $email = "";
      $adm = "";
      $senha = "";
      $titulo = "";
      $comentario = "";
      $this->Conexao();
    }

    //INSERÇÃO DE DADOS
  	function Insere(){
  		$sql = "INSERT INTO usuarios (nome, email, adm , senha) VALUES (:nome , :email, :adm, :senha)";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':nome', $this->nome, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':email', $this->email, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':adm', $this->adm, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':senha', $this->senha, PDO::PARAM_STR); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Cadastrado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

    function InsereLembrete($id){
  		$sql = "INSERT INTO lembrete (titulo, comentario, id_User) VALUES (:titulo , :comentario, :id_User)";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':titulo', $this->titulo, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':comentario', $this->comentario, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id_User', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
      echo $id;
  		if($result){
  			echo "<br>Cadastrado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function Seleciona(){
  		$sql = "SELECT * FROM usuarios";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->execute();

  		if($stmt->rowCount() > 0){
  			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
          echo '<div class="row"> 
       <div class="col s3"></div> 

      <div class="col s6"><div class="col s12 m6"><div class="card-content white-text"><div class="row"> 
       <div class="col s3"></div> 
        <div class="col s6"><h3>Gerenciamento de usuários</h3> </div>
        <div class="col s3"></div> 
      </div></div><div class="col s3"></div></div></div></div>';
  			foreach($result as $rows){
          if($rows["adm"] == 1){$adm = 'Sim';}else{$adm = 'Não';}
          echo

       '<div class="row"> 
       <div class="col s3"></div> 
        <div class="col s6">
            <ul class="collection"> 
              <li class="collection-item"><div class="banco">NOME: '.$rows["nome"].
           ' - EMAIL: '.$rows["email"].
           ' - ADM: '.$adm.
           '<a href="atualizar.php?id='.$rows["id"].'"><i id="laranja"  class=" material-icons">edit</i></a>'.' '.
           '<a href="remover.php?id='.$rows["id"].'"><i  id="laranja" class=" material-icons">delete_forever</i></a></div></li>
            </ul>
         </div> 
         <div class="col s3"></div>
      </div>';

  			}
  		}else{
  			echo '<div class="banco" ><br>Nenhuma linha encontrada!</div>';
  		}
  	}

  	function SelecionaLembrete($id){
  		$sql = "SELECT * FROM lembrete
              WHERE lembrete.id_User = :id
              order by id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$stmt->execute();

  		if($stmt->rowCount() > 0){
  			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
          //echo '<div class="nav-wrapper">Gerenciamento de lembretes</div> ';
  			foreach($result as $rows){
          echo 

            '<div class="row">
            <div class="col s4"></div> 

            <div class="col s4">
             <div class="row"> <div class="col s12 m6"> <div class="card blue-grey darken-1"> <div class="card-content white-text"> <span class="card-title">'.$rows["titulo"].'</span> <p>'.$rows["comentario"].'</p> </div> <div class="card-action"> <a href="editarLembrete.php?id='.$rows["id"].'"><i class=" material-icons">edit</i></a> <a href="removerLembrete.php?id='.$rows["id"].'"><i class=" material-icons">delete_forever</i></a> </div> </div> </div> </div>
            </div>
            <div class="col s4"></div> 
            </div> 
            <div class="row"><div class="col s05"></div> </div>';
        
  			}
        
  		}else{
  			//echo '<div class="banco" ><br>Nenhuma linha encontrada!</div>';
        echo '<div id="marginTop">
               <div class="row"> 
              <div class="col s4"></div> 

             <div class="col s4">
               <div class="col s12 m6">
            
                <div class="card-content white-text"> 
                 
                  <blockquote> <h4>Você não possui lembretes no momento!</h4></blockquote> 
              </div>
            </div>  
               <div class="col s4"></div>
             </div> 
             </div>
            </div>';
        
  		}
  	}

    function Atualiza($id){
  		$sql = "UPDATE usuarios SET nome = :n, email = :e, adm = :a, senha = :s WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':n', $this->nome, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':e', $this->email, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':a', $this->adm, PDO::PARAM_INT); //define o tipo de parametro
  		$stmt->bindParam( ':s', $this->senha, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Modificado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function EditarLembrete($id){
  		$sql = "UPDATE lembrete SET titulo = :t, comentario = :c WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':t', $this->titulo, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':c', $this->comentario, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Modificado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function Remove($id){

      $sql = "SELECT * FROM usuarios
              WHERE id = :id";
      $stmt = $this->Conecta()->prepare( $sql );
      $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
      $stmt->execute();

          //apagar os lembredes do usuario removido

           $sql = "DELETE FROM lembrete WHERE id_User = :id";
           $stmt = $this->Conecta()->prepare( $sql );
           $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
           $result = $stmt->execute();

            //apagar usuario 
          $sql = "DELETE FROM usuarios WHERE id = :id";
           $stmt = $this->Conecta()->prepare( $sql );
           $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
             $result = $stmt->execute();

           header('Location: dentro.php');
         if($result){
          echo ">Removido com Sucesso!";
           }else{
         echo "<br>Erro!";
          }

          
        
  	}

    function RemoveLembrete($id){
  		$sql = "DELETE FROM lembrete WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Removido com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

    //GETTERS
    function getNome(){return $this->nome;}
    function getEmail(){return $this->email;}
    function getAdm(){return $this->adm;}
    function getSenha(){return $this->senha;}
    function getTitulo(){return $this->titulo;}
    function getComentario(){return $this->comentario;}

    //SETTERS
    function setNome($nome){$this->nome = $nome;}
    function setEmail($email){$this->email = $email;}
    function setAdm($adm){$this->adm = $adm;}
    function setSenha($senha){$this->senha = $senha;}
    function setTitulo($titulo){$this->titulo = $titulo;}
    function setComentario($comentario){$this->comentario = $comentario;}
  }
 ?>
