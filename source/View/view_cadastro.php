<?php $v->layout("_template");?>


<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("cadastro"); ?>" enctype="multipart/form-data">
            <h1>Cadastro de Paciente</h1>
            <h3><?= $msg ?> </h3>



            <div id="obrigatorio">
                <label for="cpf">
                    CPF
                    <input name="cpf" type="text" required><br>
                </label>

                <label for="nome">
                    Nome Completo
                    <input name="nome" type="text"><br>
                </label>

                <label for="nome_social">
                    Nome Social
                    <input name="nome_social" type="text"><br>
                </label>

                <label for="data_nascimento">
                    Data de nascimento
                    <input name="data_nascimento" type="date">
                </label><br>

                <label for="sexo">
                    Sexo:
                    <label>F</label><input name="sexo" type="radio" required>
                    <label>M</label><input name="sexo" type="radio">
                </label>

                <h3>Contato</h3>
                <label for="celular">
                    Celular
                    <input name="celular" type="text">
                </label>
<!--                <div>-->
<!--                    <h3>Endereço</h3>-->
<!--                    <label for="rua">Rua</label>-->
<!--                    <input name="rua" type="text">-->
<!--                    <label for="numero">Nº</label>-->
<!--                    <input name="numero" type="text" id="input-menor"><br>-->
<!---->
<!--                    <label for="complemento">Complemento</label>-->
<!--                    <input name="complemento" type="text"><br>-->
<!---->
<!--                    <label for="cidade">Cidade</label>-->
<!--                    <input name="cidade" type="text">-->
<!---->
<!--                    <label for="estado">Estado</label>-->
<!--                    <input name="estado" type="text" id="input-menor"><br>-->
<!---->
<!--                    <label for="cep">CEP</label>-->
<!--                    <input name="cep" type="text">-->
<!---->
<!---->
<!--                </div>-->


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
