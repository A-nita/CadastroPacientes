-- Criar o banco de Dados:
CREATE DATABASE SysExamesMedicos;

-- Criar a tabela de pacientes:
CREATE TABLE Paciente(
                         cpf VARCHAR(12) NOT NULL PRIMARY KEY,
                         nome VARCHAR(60) NOT NULL,
                         nome_social VARCHAR(60),
                         data_nascimento DATE NOT NULL,
                         sexo VARCHAR(2) NOT NULL,
                         telefone VARCHAR(13) NOT NULL,
                         convenio INT(6) FOREIGN KEY convenio_fk (),
                         n_convenio VARCHAR(13)
);


-- Criar a tebela de convenios:
CREATE TABLE Convenio(
                         nome VARCHAR(40) NOT NULL PRIMARY KEY,
                         tipo_plano VARCHAR(40) NOT NULL,
                         abrangencia_atuacao VARCHAR(40) NOT NULL,
                         tipo_atendimento VARCHAR(40) NOT NULL
);
-- Criar a tebela de paciente-convenios:
CREATE TABLE paciente_convenio(
                        cpf_paciente INTEGER NOT NULL REFERENCES paciente(cpf),
                        nome_convenio INTEGER NOT NULL REFERENCES convenio(nome),
                        vencimento_convenio DATE NOT NULL,
                        n_convenio VARCHAR(15) NOT NULL
);