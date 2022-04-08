<?php
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    $this->redirect('');
    exit;
}

?>

<<<<<<< HEAD
<nav class='navbar'>
    <h1>Olá bem vindo, <?php echo $_SESSION['nome'];?> </h1>
    <ul>
        <li><a href="<?php echo APP ?>usuario/sair">Sair</a></li>
        <li><a href='<?php echo APP ?>usuario/senha'>Alterar senha</a></li>
    </ul>
</nav>
=======

>>>>>>> master
<section class='container'>
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
   
    <div class='mensagens'>
        <div class='mensagens-textos'>
            <?php
                foreach($mensagens as $mensagem){
                    echo "
                        <div class='"; echo ($mensagem['fk_deusuario'] == $id) ? "texto1" : "texto2"; echo "'>
                            <p>
                                {$mensagem['texto']}
                            </p>
                            <div>
                                <p>{$mensagem['data']}</p>
                                <a href='".APP."mensagem/excluir/{$mensagem['id']}'><i class='ri-delete-bin-line'></i></a>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
        <div class='mensagens-form'>
            <form action='<?php echo APP.'mensagem/enviar/'.$idDestinatario?>' method='post'>
                <input class='box__mensagem' type='text' name='mensagem' autocomplete='off' id='mensagemInput' placeholder='digite a mensagem'>
                <button class='btn__mensagem' type='submit'><i class='ri-send-plane-fill btn'></i></button>
            </form>
        </div>
        
    </div>
</section>


