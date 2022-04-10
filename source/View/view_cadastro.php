<?php $v->layout("_template");?>


<section id="pg-cadastro">
    <div id="formulario">

        <form method="POST" action="<?= url("cadastro"); ?>" enctype="multipart/form-data">
            <h1>Cadastro de Paciente</h1>

            <select name="Convenio" id="fodae">
                <?php
                foreach($convenios as $c):
                    ?>
                    <option><?= $c[0]?></option>
                <?php
                endforeach;
                ?>
<!--//                <option value="unimed">unimed</option>-->
<!--//                <option value="provida">provida</option>-->
<!--//                <option value="ami">ami</option>-->
            </select>

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
                <label for="ddd">DDD</label>
                <input name="ddd" type="text" id="input-menor">
                <label for="celular">Celular</label>
                <input name="celular" type="text">
                <div>
                    <h3>Endereço</h3>
                    <label for="rua">Rua</label>
                    <input name="rua" type="text">
                    <label for="numero">Nº</label>
                    <input name="numero" type="text" id="input-menor"><br>

                    <label for="complemento">Complemento</label>
                    <input name="complemento" type="text"><br>

                    <label for="cidade">Cidade</label>
                    <input name="cidade" type="text">

                    <label for="estado">Estado</label>
                    <input name="estado" type="text" id="input-menor"><br>

                    <label for="cep">CEP</label>
                    <input name="cep" type="text">


                </div>


            </div>

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

            </div>


            <input type="submit" value="Cadastrar">

        </form>

    </div>
</section>