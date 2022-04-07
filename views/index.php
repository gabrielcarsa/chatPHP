<?php
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $this->redirect('mensagem/chat');
    exit;
}
?>

    <div class="l-form">
        <form class="form" action="<?php echo APP?>usuario/logar" method="post">
            <h1 class="form__title">Fazer Login</h1>
            <p class="form__text">Faça Login para acessar o chat</p>
            <div class="form__div">
                <input type="email" class="form__input" name="email" value="<?php echo(isset($dados['email'])) ? $dados['email'] : ""; ?>" id="emailInput" require autocomplete="off" placeholder=" ">
                <label for="email" class="form__label">Email</label> 
            </div>
            <span id="validacaoErros"><?php echo(isset($dados['erroEmail'])) ? $dados['erroEmail'] : ""; ?></span>
            <div class="form__div">
                <input type="password" class="form__input" name="senha" id="senhaInput" require placeholder=" ">
                <label for="senha" class="form__label">Senha</label>
            </div>
            <span id="validacaoErros"><?php echo(isset($dados['erroSenha'])) ? $dados['erroSenha'] : ""; ?></span>

            <input type="submit" class="form__button" value="Entrar">

            <a href="<?php echo APP ?>usuario/cadastrar">Cria conta</a>
        </form>


    </div>
    <div id="mensagem-login">
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
            if(isset($dados['login'])){
                echo $dados['login'];
            }
        ?>
    </div>
