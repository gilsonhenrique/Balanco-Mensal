# Balanço Mensal
Inicialmente este app foi criado com o objetivo de armazenar a movimentação financeira
de uma igreja e disponiblizar relatórios mensais para prestação de contas.
Caso deseje utilizar para outros fins, altere o formulário:
cadastrarb.php ,  "option value=....."  , conforme necessidade.

## Instalação
- Crie um banco de dados MySQL e importe a estrura executando o arquivo banco.sql.
- Duplique o arquivo conexao.exemplo.php como conexao.php e preencha as
configurações de conexão com seu banco

## Sobre o desenvolvimento
PHP >5.6 , Bootstrap 5  , Mysql

## O que aprendi
Manipulação de datas , valor/moeda (Classe NumberFormatter)
Utilização de formulários com "POST" para mesma página.
Obs.: No momento não adicionei proteção contra SQL Injection,
pois o app tem o objetivo de ser usado localmente.

## Oportunidades de melhorias
Identação/Comentários, Refatoração, Implementação de POO, Composer/Biblioteca PDF

## Capturas de tela

### Tela de Cadastro
![image](https://user-images.githubusercontent.com/80334774/156066149-5e838b91-0b2a-4a5c-aa13-6fce61145aa4.png)


### Tela do Relatório
![image](https://user-images.githubusercontent.com/80334774/156065981-67dcbb57-b2a9-400f-afd8-4ac442d25145.png)

