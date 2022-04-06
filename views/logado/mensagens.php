<?php
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    $this->redirect('');
    exit;
}

?>

<nav class='navbar'>
    <h1>Olá bem vindo, <?php echo $_SESSION['nome'];?> </h1>
    <ul>
        <li><a href="<?php echo APP ?>usuario/sair">Sair</a></li>
        <li><a href='<?php echo APP ?>usuario/senha'>Alterar senha</a></li>
    </ul>
</nav>
<section class='container'>
    <div class='aside'>
        <h2>Usuários</h2>
        <?php
            foreach($usuarios as $usuario){
                if($usuario['id'] != $id){
                    echo "
                    <div class='conversa'>
                        <h3>{$usuario['nome']}</h3>
                        <a href='".APP."mensagem/conversas/{$usuario['id']}'>Toque para abrir conversas</a>
                    </div>
                    ";
                }
                
            }
        ?>
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
                                <a href='".APP."mensagem/excluir/{$mensagem['id']}'>X</a>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
        <div class='mensagens-form'>
            <form action='<?php echo APP.'mensagem/enviar/'.$idDestinatario?>' method='post'>
                <input type='text' name='mensagem' autocomplete='off' id='mensagemInput'>
                <button type='submit'>Enviar</button>
            </form>
        </div>
        
    </div>
</section>


