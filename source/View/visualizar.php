<?php $v->layout("_template"); ?>

<section id="pg-visualizar">
    <div id="dados">

        <div id="paciente">

            <h3>Dados do paciente</h3>

            <p><b>CPF:</b> <?=  $paciente->getCpf() ?></p>
            <p><b>Nome:</b> <?= $paciente->getNome() ?></p>
            <p><b>Nome Social:</b> <?= $paciente->getNomeSocial() ?></p>
            <p><b>Data Nascimento:</b> <?= $paciente->getDataNascimento() ?></p>
            <p><b>Sexo:</b> <?= $paciente->getSexo() ?></p>
            <p><b>Celular:</b> <?= $paciente->getTelefone() ?></p><br>

        </div>

        <div id="convenio">
            <h3>Convênio Médico</h3>

            <p><b>Convênio:</b> <?= $paciente_convenio->getConvenio() ?></p>
            <p><b>Número do convênio:</b> <?= $paciente_convenio->getNConvenio() ?></p>
            <p><b>Vencimento:</b> <?= $paciente_convenio->getDataVencConvenio() ?></p>

        </div>
    </div>

</section>
<form id="form-post" method="POST">
    <label id="label-post" for="cpf">
        <input name="cpf" type="text" value="<?= $paciente->getCpf() ?>"><br>
    </label>
    <button formaction="<?= url("editar"); ?>"> Editar </button>
    <button formaction="<?= url("excluir"); ?>"> Excluir </button>
</form>

