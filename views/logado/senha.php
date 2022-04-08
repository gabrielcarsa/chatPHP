<?php

// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $this->redirect('');
    exit;
}
?>

<div class="l-form">
    <form class="form" action="<?php echo APP?>usuario/atualizarSenha" method="post">
        <h2 class="form__title">Alterar senha</h2>
        <p class="form__text">Digite a nova senha</p>
        <div class="form__div">
            <input type="password" class="form__input" name="senha" id="senhaInput" require placeholder=" ">
            <label for="senha" class="form__label">Senha</label>
        </div>
        <span id="validacaoErros"><?php echo(isset($dados['erroSenha'])) ? $dados['erroSenha'] : ""; ?></span>
        
        <input type="submit" class="form__button" value="Alterar senha">
        <div class="box__opcao">
        <a href="<?php echo APP ?>">Sair</a>
        <a href="<?php echo APP ?>mensagem/chat">Voltar</a>
        </div>
    </form>
</div>
>>>>>>> master
