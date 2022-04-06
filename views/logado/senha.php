<?php
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $this->redirect('');
    exit;
}
?>

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


