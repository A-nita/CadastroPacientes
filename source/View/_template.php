<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href= <?=url("/source/View/styles/style.css");?>>
</head>
<body>
<nav class="main_nav">
<!--    estou herdando uma sidebar??-->
    <?php if($v->section("sidebar")):
        echo $v->sectio("sidebar");
        else:
        ?>
        <a title="" href="<?=url() ?>">Home</a>
        <a title="" href="<?=url() ?>">Cadastrar Paciente</a>
        <a title="" href="<?=url() ?>">Buscar Paciente</a>


        <?php

    endif;?>

</nav>

<main class="main_content">
    <?= $v->section("content") ?>
</main>
<footer>
    Grupo 10 - Todos os Direitos Reservados
</footer>
</body>
</html>