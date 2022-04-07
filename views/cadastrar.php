<?php
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $this->redirect('mensagem/chat');
    exit;
}
?>


<div class="l-form">
    <form class="form" action="<?php echo APP?>usuario/salvar" method="post">
        <h2 class="form__title">Cadastrar</h2>
        <p class="form__text">Faça Cadastro para acessar o chat</p>
        <div class="form__div">
            <input type="text" class="form__input" name="nome" id="nomeInput" value="<?php echo(isset($dados['nome'])) ? $dados['nome'] : ""; ?>" require autocomplete="off" placeholder=" ">
            <label for="nome" class="form__label">Nome</label>
        </div>
        <span id="validacaoErros"><?php echo(isset($dados['erroNome'])) ? $dados['erroNome'] : ""; ?></span>
        <div class="form__div">
            <input type="email" class="form__input" name="email" value="<?php echo(isset($dados['email'])) ? $dados['email'] : ""; ?>" id="emailInput" require autocomplete="off" placeholder=" ">
            <label for="email" class="form__label">Email</label>
        </div>
        <span id="validacaoErros"><?php echo(isset($dados['erroEmail'])) ? $dados['erroEmail'] : ""; ?></span>
        <div class="form__div">
            <input type="password" class="form__input" name="senha" id="senhaInput" require placeholder=" ">
            <label for="senha" class="form__label">Crie uma senha</label>
        </div>
        <span id="validacaoErros"><?php echo(isset($dados['erroSenha'])) ? $dados['erroSenha'] : ""; ?></span>

        <input type="submit" class="form__button" value="Criar">

        <a href="<?php echo APP ?>">Logar</a>

    </form>
</div>
