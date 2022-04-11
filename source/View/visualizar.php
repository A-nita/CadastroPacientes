<?php $v->layout("_template"); ?>

<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("cadastro"); ?>" enctype="multipart/form-data">
            <h1>Visulizar Paciente</h1>
            <h3><?= $msg ?> </h3>



            <div id="obrigatorio">

                    <p>CPF: <?= $paciente->getCpf() ?></p>
                    <p>Nome: <?= $paciente->getNome() ?></p>
                    <p>Nome Social: <?= $paciente->getNomeSocial() ?></p>
                    <p>Data Nascimento: <?= $paciente->getDataNascimento() ?></p>
                    <p>Sexo: <?= $paciente->getSexo() ?></p>
                    <p>Celular: <?= $paciente->getTelefone() ?></p>

            </div>

            <div id="convenio">
                <h3>Convênio Médico</h3>
                <label for="Convenio">Convênio</label>
                <select name="Convenio" id="fodae">
                    <option>Selecione...</option>
                    <?php
                    foreach($convenios as $c):
                        ?>
                        <option><?= $c?></option>
                    <?php
                    endforeach;
                    ?>

                </select> <br>

                <label for="n_convenio">Número do Convênio</label>
                <input name="n_convenio" type="text"><br>
                <label for="val_convenio">Vencimento do Convênio</label>
                <input name="val_convenio" type="date">
            </div>
            <input type="submit" value="Cadastrar">

        </form>

    </div>
</section>
