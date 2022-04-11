<?php $v->layout("_template");?>


<section>
    <div id="formulario">
        <form method="POST" action="<?= url("buscar"); ?>">
        <h1>Buscar de Paciente</h1>
            <p><?= $msg ?></p>

        <label for="cpf">
            CPF
            <input name="cpf" type="text"><br>
        </label>



        <input type="submit" value="Buscar">

        </form>
    </div>

</section>
