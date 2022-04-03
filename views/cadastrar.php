<?php
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $this->redirect('mensagem/chat');
    exit;
}
?>
<nav class="navbar">
    <h1>Edite o menu Nav</h1>
    <ul>
        <li><a href="<?php echo APP ?>">Login</a></li>
        <li><a href="<?php echo APP ?>usuario/cadastrar">Cadastrar</a></li>
    </ul>
</nav>

<div>
    <h2>Cadastrar</h2>
    <p>Faça Cadastro para acessar o chat</p>
</div>

<form action="<?php echo APP?>usuario/salvar" method="post">
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nomeInput" value="<?php echo(isset($dados['nome'])) ? $dados['nome'] : ""; ?>" require autocomplete="off" placeholder="Digite seu nome">
        <span id="validacaoErros"><?php echo(isset($dados['erroNome'])) ? $dados['erroNome'] : ""; ?></span>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo(isset($dados['email'])) ? $dados['email'] : ""; ?>" id="emailInput" require autocomplete="off" placeholder="Digite seu email">
        <span id="validacaoErros"><?php echo(isset($dados['erroEmail'])) ? $dados['erroEmail'] : ""; ?></span>
    </div>
    <div>
        <label for="senha">Crie uma senha</label>
        <input type="password" name="senha" id="senhaInput" require placeholder="Digite sua senha">
        <span id="validacaoErros"><?php echo(isset($dados['erroSenha'])) ? $dados['erroSenha'] : ""; ?></span>
    </div>
    <div>
        <button type="submit">Entrar</button>
    </div>
</form>
