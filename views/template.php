<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="<?php echo APP?>public/css/master.css">
    <!---link icon--->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


    <title>Sistema Chat - WebIII</title>
</head>

<body>
    <div class="nav__container">
        <nav class="navbar">
            <h1 class="title__nav" href="<?php echo APP; ?>">chat PHP</h1>
        </nav>
    </div>

    <!-- HOME -->
    
    <div class="conteudo">
        <?php
            include_once $arquivo_visao;
            
        ?>
    </div>

</body>

</html>