# crud-shosp
Projeto criado para teste prático!

Briefing do projeto:

Criar um crud simples com conexão ao banco de dados.

O crud será composto pelo Cadastro de Pacientes e Cadastro de Plano de Saúde.

Os campos do Cadsatro de Paciente são: Nome, Email, Data de Nascimento, Status (Ativo e Inativo), Endereço, Plano de Saúde.

Os campos do Cadastro de Plano de saúde são: Nome, RegistroANS, CNPJ, Status (Ativo e Inativo).

Os campos sublinhados são obrigatórios
.
O cadastro de plano de saúde é relacionado com cadastro de pacientes 1:n. Cada paciente pode ser relacionado a apenas um plano de saúde, e no cadastro do paciente deve ser possível selecionar um plano de saúde (campo obrigatório).

Para a tarefa, o desenvolvedor deverá criar as tabelas do banco de dados (Mysql ou Postgres) e armazenar os script de criação no arquivo “tabelas.sql”.

Ambos os cruds devem ter opções para Cadastro, Alteração e Exclusão.
