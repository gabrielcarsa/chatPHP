<?php
<<<<<<< HEAD
 
=======

>>>>>>> master
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $this->redirect('');
    exit;
}
?>

<<<<<<< HEAD
<nav class="navbar">
    <h1>Olá bem vindo, <?php echo $_SESSION['nome'];?> </h1>
    <ul>
        <li><a href="<?php echo APP ?>usuario/sair">Sair</a></li>
        <li><a href='<?php echo APP ?>usuario/senha'>Alterar senha</a></li>
    </ul>
</nav>
<section class="container">
<form action="<?php echo APP?>usuario/atualizarSenha" method="post">
    <div>
        <label for="senha">Altera a senha</label>
        <input type="password" name="senha" id="senhaInput" require placeholder="Digite sua senha">
        <span id="validacaoErros"><?php echo(isset($dados['erroSenha'])) ? $dados['erroSenha'] : ""; ?></span>
    </div>
    <div>
        <button type="submit">Entrar</button>
    </div>
</form>

</section>


=======

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
