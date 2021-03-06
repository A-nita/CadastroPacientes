<?php $v->layout("_template");?>


<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("cadastro"); ?>" enctype="multipart/form-data">
            <h1>Cadastro de Paciente</h1>
            <h3 style="color: lightcoral"><?= $msg ?> </h3>



            <div id="obrigatorio">
                <p>  (*) Campos Obrigatórios</p>
                <label for="cpf">
                    CPF*
                    <input name="cpf" type="text" required><br>
                </label>

                <label for="nome">
                    Nome Completo*
                    <input name="nome" type="text" required><br>
                </label>

                <label for="nome_social">
                    Nome Social
                    <input name="nome_social" type="text"><br>
                </label>

                <label for="data_nascimento">
                    Data de nascimento*
                    <input name="data_nascimento" type="date" required>
                </label><br>

                <label for="celular">
                    Celular*
                    <input name="celular" type="text" required>
                </label><br>

                <label for="sexo">
                    Sexo*:
                    <input name="sexo" type="radio" value="F" required>F
                    <input name="sexo" type="radio" value="M">M
                </label>
                <br>



            </div>

            <div id="convenio">
                <h3>Convênio Médico</h3>
                <label for="Convenio">Convênio</label>
                <select name="Convenio" id="fodae">
                    <option>Sem Convênio</option>
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
