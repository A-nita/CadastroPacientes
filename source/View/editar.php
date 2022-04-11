<?php $v->layout("_template");?>


<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("editar"); ?>" enctype="multipart/form-data">
            <h1>Cadastro de Paciente</h1>
            <h1><?= $msg?></h1>
            <div id="obrigatorio">
                <label for="cpf">CPF</label>
                <input name="cpf" type="text" value="<?= $paciente->getCpf()?>"><br>

                <label for="nome">Nome Completo</label>
                <input name="nome" type="text" value="<?= $paciente->getNome()?>"><br>

                <label for="nome_social">Nome Social</label>
                <input name="nome_social" type="text" value="<?= $paciente->getNomeSocial()?>"><br>

                <label for="data_nascimento">Data de nascimento</label>
                <input name="data_nascimento" type="date" value="<?= $paciente->getDataNascimento()?>"><br>

                <div id="sexo">
                    <p>Sexo:</p>
                    <label for="sexo">F</label>
                    <input type="radio" name="F" id="sexo_f">

                    <label for="sexo">M</label>
                    <input type="radio" name="M" id="sexo_m">
                </div>
                <h3>Contato</h3>
                <label for="ddd">DDD</label>
                <input name="ddd" type="text" id="input-menor">
                <label for="celular">Celular</label>
                <input name="celular" type="text" value="<?= $paciente->getCpf()?>">


            <div id="convenio">
                <h3>Convênio Médico</h3>
                <label for="convenio">Nome do convênio</label>
                <input name="convenio" type="text" value="<?= $paciente_convenio->getConvenio()?>"><br>

                <label for="n_convenio">Número do Convênio</label>
                <input name="n_convenio" type="text"><br>

                <select name="Convenio" id="fodae" value="<?= $paciente_convenio->getConvenio()?>">
                    <option><?= $paciente_convenio->getConvenio()?></option>
                    <?php
                    foreach($convenio as $c):
                        if ($paciente_convenio->getConvenio() != $c):
                            ?><option><?= $c?></option>
                        <?php endif;
                    endforeach ?>

                </select> <br>

            </div>


            <input type="submit" value="Salvar">

        </form>
    </div>
</section>
