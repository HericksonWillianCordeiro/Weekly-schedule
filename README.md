# Cronograma Semanal
Aplicação simples usando php estruturado e mysql, utilizado para definir o Cronograma Semanal

### Tecnologias
- PHP 🐘
- MYSQL 🎲
- HTML & CSS 📄 - BOOTSTRAP 4

### Ferramentas
- Xamp (PHP, MYSQL, APACHE) - Configurar variaveis de ambiente
- VSCode
- Git
- SQLyog Community

### Plugins vscode
- Bootstrap 4, Font awesome 4
- Bootstrap v4 snippets
- Gitlens
- HTML CSS Support
- HTML snippets
- Javascript ES6
- PHP Docblocker
- PHP Intelephense
- One dark theme

### Links Download Ferramentas
- Xamp: https://www.apachefriends.org/xampp-files/8.0.13/xampp-windows-x64-8.0.13-0-VS16-installer.exe
- VSCode: https://code.visualstudio.com/download
- Git: https://git-scm.com/download/win
- SQLyog Community: https://s3.amazonaws.com/SQLyog_Community/SQLyog+13.1.8/SQLyog-13.1.8-0.x64Community.exe

### Links Documentações e Referências
- PHP 🐘: https://www.php.net/manual/en/
- HTML 📄: https://www.devmedia.com.br/como-criar-formularios-html-sem-usar-tabelas-tableless/28278
- Bootstrap 📄: https://getbootstrap.com/docs/4.6/getting-started/introduction/
- MYSQL 🎲: https://www.devmedia.com.br/primeiros-passos-no-mysql/28438

### Script para criação do banco de dados
```sql
/* CRIA O BANCO DE DADOS SE NÃO EXISTIR */
CREATE DATABASE IF NOT EXISTS todolist;

/* CRIA A TABELA SE NÃO EXISTIR */
CREATE TABLE IF NOT EXISTS `todos` (
  id INT NOT NULL AUTO_INCREMENT,
  title TEXT NOT NULL,
  checked TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY(id)
);
```
Explicando o script acima. Iremos criar um banco de dados e uma tabela, caso não exista, por isso utilizamos a cláusula ```IF NOT EXISTS```. Para a tabela, precisamos de 4 colunas:
- ```id```: Tipo inteiro, não pode ser nulo, e será auto incremento, ou seja, a cada inserção o último id acrescentará +1;
- ```title```: Tipo texto, não pode ser nulo;
- ```checked```: Tipo inteiro pequeno, não pode ser nulo, e terá o valor padrão 0 quando não passado nenhum valor;
- ```created_at```: Tipo datetime, não pode ser nulo, e terá o valor padrão a data/hora atual quando não passado nenhum valor;
- ```PRIMARY KEY (chave primaria)```: é uma CONSTRAINT, não permite valores nulos e impõe a exclusividade de linhas, neste exemplo informamos que a coluna id será chave primária.

