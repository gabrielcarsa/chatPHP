<?php

session_start();

  class MensagemController extends Controller {
    /*-------
    FUNÇÃO PARA VISUALIAZAR CHAT
    -------*/
    function chat(){
      $dados = array();
      $modelUsuario = new Usuario();
      $resultado = $modelUsuario->read();
      $dados['usuarios'] = $resultado;
      $dados['id'] = $_SESSION['id'];
      $this->view("logado/chat", $dados);
    }

    /*-------
    FUNÇÃO PARA ABRIR CONVERSA
    -------*/
    function conversas($destinatario){
      $dados = array();
      $modelUsuario = new Usuario();
      $modelMensagem = new Mensagem();
      $resultado = $modelUsuario->read();
      $id = $_SESSION['id'];
      $mens = $modelMensagem->showMensagem($destinatario, $id);
      $dados['id'] = $id;
      $dados['idDestinatario'] = $destinatario;
      $dados['usuarios'] = $resultado;
      $dados['mensagens'] = $mens;
      $this->view("logado/mensagens", $dados);
    }

    /*-------
    FUNÇÃO ENVIAR MENSAGEM
    -------*/
    function enviar($destinatario){
      $dados = array();
      date_default_timezone_set('America/Cuiaba');

      if(!empty($_POST['mensagem'])){
        $id = $_SESSION['id'];
        $model = new Mensagem();
        $dados['texto'] = $_POST['mensagem'];
        $dados['data'] = date('d/m/y H:i:s');
        $dados['fk_deusuario'] = $id;
        $dados['fk_parausuario'] = $destinatario;
        $model->create($dados);
        $this->redirect("mensagem/conversas/$destinatario");
      }else{
        $this->redirect("mensagem/conversas/$destinatario");
      }
    }

    /*-------
    FUNÇÃO PARA EXCLUIR MENSAGEM
    -------*/
    function excluir($id) {
      $model = new Mensagem();
      $model->delete($id);
      echo "
        <script>
          alert('Mensagem excluída com sucesso');
          window.location.href = '".APP."mensagem/chat';
        </script>
      ";
    }
  }