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
    </ul>
</nav>
<section class="container">
    <div class="aside">
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
    <div class="mensagens">
        <p>Abra uma conversa para visualizar aqui</p>
    </div>
</section>


