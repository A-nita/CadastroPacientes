<?php $v->layout("_template");?>


<section>
    <div id="formulario">
        <form method="POST" action="">
        <h1>Buscar de Paciente</h1>
            <p><?= $msg ?></p>

        <label for="cpf">CPF</label>
        <input name="cpf" type="text"><br>



        <input type="submit" value="Buscar">

        </form>
    </div>

</section>
