<?php

  class UsuarioController extends Controller {
    /*-------
    FUNÇÃO PARA VISUALIAZAR PÁGINA DE CADASTRO
    -------*/
    function cadastrar(){
        $dados = array();
        $this->view("cadastrar", $dados);
    }

    /*-------
    FUNÇÃO PARA CADASTRAR USUÁRIO
    -------*/
    function salvar() {
      $dados = array();
      
      // Validar nome
      if(empty(($_POST["nome"]))){
        $erro = "Por favor coloque um nome.";
        $dados['erroNome'] = $erro;
      } elseif(!preg_match('/^[a-zA-Z ]+$/', trim($_POST["nome"]))){
        $erro = "O nome pode conter apenas letras e espaços";
        $dados['erroNome'] = $erro;
      } else{
        $dados['nome'] = $_POST['nome'];
      }
      
      //validar email
      if(empty(trim($_POST["email"]))){
          $erro = "Por favor coloque um email.";
          $dados['erroEmail'] = $erro;
      } elseif (filter_var ( trim($_POST["email"]), FILTER_VALIDATE_EMAIL ) ) {
          $dados['email'] = $_POST['email'];
      } else {
          $erro = "Email inválido";
          $dados['erroEmail'] = $erro;
      }

      // Validar senha
      if(empty(trim($_POST["senha"]))){
          $erro = "Por favor insira uma senha.";  
          $dados['erroSenha'] = $erro;
      } elseif(strlen(trim($_POST["senha"])) < 6){
          $erro = "A senha deve ter pelo menos 6 caracteres.";
          $dados['erroSenha'] = $erro;
      } else{
          $dados['senha'] = $_POST['senha'];
          $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT); // Cria um hash para a senha
      }

      if(!isset($dados['erroNome']) && !isset($dados['erroEmail']) && !isset($dados['erroSenha'])){
          $model = new Usuario();
          $model->create($dados);
          echo "
            <script>
                alert('Conta criada com sucesso! Agora faça o login em sua conta para acessar o chat');
                window.location.href = '".APP."';
            </script>
          ";
      }else{
        $this->view("cadastrar", $dados);
      }
    }

    /*-------
    FUNÇÃO PARA LOGAR USUÁRIO
    -------*/
    function logar(){
      $dados = array();

      //validar email
      if(empty(trim($_POST["email"]))){
          $erro = "Por favor coloque um email.";
          $dados['erroEmail'] = $erro;
      } elseif (filter_var ( trim($_POST["email"]), FILTER_VALIDATE_EMAIL ) ) {
          $dados['email'] = $_POST['email'];
      } else {
          $erro = "Email inválido";
          $dados['erroEmail'] = $erro;
      }

      // Validar senha
      if(empty(trim($_POST["senha"]))){
          $erro = "Por favor insira uma senha.";  
          $dados['erroSenha'] = $erro;
      } elseif(strlen(trim($_POST["senha"])) < 6){
          $erro = "A senha deve ter pelo menos 6 caracteres.";
          $dados['erroSenha'] = $erro;
      } else{
          $dados['senha'] = $_POST['senha'];
      }

      //Validar credenciais
      if(!isset($dados['erroEmail']) && !isset($dados['erroSenha'])){
          $model = new Usuario();
          $validarEmail = $model->validarLogin($dados);
          if($validarEmail != false){
            // As credenciais estão corretas
            session_start();
                            
            // Armazene dados em variáveis de sessão
            $_SESSION["loggedin"] = true;
            $user = $model->getByEmail($dados['email']);
            $_SESSION["id"] = $user['id'];
            $_SESSION["nome"] = $user['nome'];
            $_SESSION["email"] = $user['email']; 
            $this->redirect('mensagem/chat');
          }else{
            $dados['login'] = "Email ou senha inválidos!";
            $this->view("index", $dados);
          }
      }else{
        $this->view("index", $dados);
      }
    }

    /*-------
    FUNÇÃO VISUALIZAR FORM MUDAR SENHA
    -------*/
    function senha(){
      session_start();
      $dados = array();
      $this->view("logado/senha", $dados);
  }

   /*-------
    FUNÇÃO PARA ATUALIZAR SENHA USUÁRIO
    -------*/
    function atualizarSenha(){
      $dados = array();
      session_start();
      $id = $_SESSION['id'];
      $dados['id'] = $id;

       // Validar senha
       if(empty(trim($_POST["senha"]))){
        $erro = "Por favor insira uma senha.";  
        $dados['erroSenha'] = $erro;
      } elseif(strlen(trim($_POST["senha"])) < 6){
          $erro = "A senha deve ter pelo menos 6 caracteres.";
          $dados['erroSenha'] = $erro;
      } else{
          $dados['senha'] = $_POST['senha'];
          $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT); // Cria um hash para a senha
      }

      if(!isset($dados['erroSenha'])){
          $model = new Usuario();
          $model->update($dados);
          echo "
            <script>
                alert('Senha alterada com sucesso!');
                window.location.href = '".APP."mensagem/chat';
            </script>
          ";
      }else{
        $this->view("logado/senha", $dados);
      }

    }

    /*-------
    FUNÇÃO PARA DESLOGAR USUÁRIO
    -------*/
    function sair(){
      // Inicialize a sessão
      session_start();
      
      // Remova todas as variáveis de sessão
      $_SESSION = array();
      
      // Destrua a sessão.
      session_destroy();
      
      // Redirecionar para a página de login
      $this->redirect('');
      exit;
    }
  }
 ?>
