<?php
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $this->redirect('');
    exit;
}
?>

<section class="container">
    <div class='aside'>
        <div class="perfil__container">
            <h1 class="title__perfil">Bem vindo, <?php echo $_SESSION['nome'];?> </h1>
            <a class='link' href="<?php echo APP ?>usuario/sair">Sair</a>
            <a class='link' href='<?php echo APP ?>usuario/senha'>Alterar senha</a>    
        </div>
        <div class="contato__container">
            <h2 class="title__contato">Contatos</h2>
            <?php
                foreach($usuarios as $usuario){
                    if($usuario['id'] != $id){
                        echo "
                        <div class='conversa'>
                            <h3 class='title__conversa'>{$usuario['nome']}</h3>
                            <a class='link__conversa' href='".APP."mensagem/conversas/{$usuario['id']}'> Abrir conversas</a>
                        </div>
                        ";
                    }
                    
                }
            ?>
        </div>
    </div>
</section>


