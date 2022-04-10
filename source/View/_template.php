<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    <link rel="stylesheet" href=--><?//=url("source/View/styles/reset.css");?><!-->
    <link rel="stylesheet" href=<?=url("source/View/styles/style.css");?>>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
<header>

    <h1>Cadastro de Pacientes</h1>

    <!-- logotipo -->
    <div id="logo">
        <a href="<?=url();?>"><img src=<?=url("source/View/styles/home-button.svg");?> alt="home"></a>
    </div>

</header>

<main class="main_content">
    <!--não mudar-->
    <?= $v->section("content") ?>
</main>

<footer>
    <p>Grupo 10 - TODOS OS DIREITOS RESERVADOS</p>
</footer>
</body>
</html>