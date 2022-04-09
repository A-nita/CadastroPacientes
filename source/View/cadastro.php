<?php $v->layout("_template");?>

<div class="cadastro">
    <form method="POST" action="<?= url("cadastro"); ?>" enctype="multipart/form-data">
        <h1>Cadastro de Paciente</h1>
        <h1><?= $msg?></h1>

        <div id="obrigatorio">
            <label for="cpf">CPF</label>
            <input name="cpf" type="text"><br>

            <label for="nome">Nome Completo</label>
            <input name="nome" type="text"><br>

            <label for="nome_social">Nome Social</label>
            <input name="nome_social" type="text"><br>

            <label for="data_nascimento">Data de nascimento</label>
            <input name="data_nascimento" type="date">

            <div id="sexo">
                <p>Sexo:</p>
                <label for="sexo">F</label>
                <input type="radio" name="F" id="sexo_f">

                <label for="sexo">M</label>
                <input type="radio" name="M" id="sexo_m">
            </div>
            <h3>Contato</h3>
            <label for="ddd">ddd</label>
            <input name="ddd" type="text">
            <label for="celular">Celular</label>
            <input name="celular" type="text">


        <div id="convenio">
            <h3>Convênio Médico</h3>
            <label for="convenio">Nome do convênio</label>
            <input name="convenio" type="text"><br>

            <label for="n_convenio">Número do Convênio</label>
            <input name="n_convenio" type="text"><br>

            <select name="Convenio" id="fodae">
                <option value="unimed">unimed</option>
                <option value="provida">provida</option>
                <option value="ami">ami</option>
            </select>

            <label for="vencimento_convenio">validade
                <input name="vencimento_convenio" type="date">
            </label><br>

        </div>


        <input type="submit" value="Cadastrar">

    </form>
</div>

