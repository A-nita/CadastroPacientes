<?php $v->layout("_template");?>


<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("editado"); ?>" enctype="multipart/form-data">
            <h1>Editar dados do paciente</h1>
            <h1><?= $msg?></h1>
            <div id="obrigatorio">
                <label for="cpf">CPF</label>
                <input name="cpf" type="text" value="<?= $paciente->getCpf()?>" ><br>

                <label for="nome">Nome Completo</label>
                <input name="nome" type="text" value="<?= $paciente->getNome()?>"><br>

                <label for="nome_social">Nome Social</label>
                <input name="nome_social" type="text" value="<?= $paciente->getNomeSocial()?>"><br>

                <label for="data_nascimento">Data de nascimento</label>
                <input name="data_nascimento" type="date" value="<?= $paciente->getDataNascimento()?>"><br>

                <label for="sexo">
                    Sexo:
                    <input name="sexo" type="radio" value="F" required>F
                    <input name="sexo" type="radio" value="M">M
                </label>

                <h3>Contato</h3>
                <label for="celular">Celular</label>
                <input name="celular" type="text" value="<?= $paciente->getCpf()?>">


            <div id="convenio">
                <h3>Convênio Médico</h3>

                <label for="Convenio">
                    Nome do Convênio
                    <select name="Convenio" id="fodae" value="<?= $paciente_convenio->getConvenio()?>">
                        <option><?= $paciente_convenio->getConvenio()?></option>
                    <?php
                    foreach($convenio as $c):
                        if ($paciente_convenio->getConvenio() != $c):
                            ?><option><?= $c?></option>
                        <?php endif;
                    endforeach ?>

                    </select>
                </label><br>

                <label for="n_convenio">Número do Convênio</label>
                <input name="n_convenio" type="text" value="<?= $paciente_convenio->getNConvenio()?>"><br>

                <label for="val_convenio">Validade do convênio</label>
                <input name="val_convenio" type="date" value="<?= $paciente_convenio->getDataVencConvenio()?>"><br>

            </div>

            <input type="submit" value="Salvar">

        </form>
    </div>
</section>
