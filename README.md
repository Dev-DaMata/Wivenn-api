# Wivenn-api

Projeto desenvolvido em [PHP](https://www.php.net/) com framework [Laravel](https://laravel.com/)

## 📘 Pré-requisitos

- <a href="https://www.php.net/">PHP</a> - v. 8.2.4
- <a href="https://getcomposer.org/">Composer</a> - v. 2.5.8
- <a href="https://laravel.com/">Laravel</a> - v. 10.17.0
- <a href="https://www.apachefriends.org/pt_br/index.html">Xampp</a> - v. 3.3.0
- <a href="https://github.com/tymondesigns/jwt-auth">jwt-auth</a> - v. 2.x
- <a href="https://git-scm.com/downloads">Git</a>
- <a href="https://code.visualstudio.com/download">VsCode</a> ou qualquer editor de texto de preferência.
- <a href="https://insomnia.rest/download">Insomnia Rest</a> ou qualquer outra ferramenta de cliente API Rest.

## :rocket: Como instalar a aplicação localmente

1. Para clonar repositório:

    ```
    git clone https://github.com/Dev-DaMata/Wivenn-api.git
    ```

2. Entrando na pasta:

     ```
     cd ./wivenn-api
     ```
3. Para instalar as dependências necessárias/todas as dependências :

    ```Composer
    //instalar todas as dependências:
    Composer i
    ```
4. Para iniciar o projeto:



    ```
    php artisan serve
    ```
⚠️ Para que o php rode na sua maquina é necessario um servidor local, neste caso estou utilizando o Xampp
    
##  :floppy_disk:Banco
O banco de dados que está sendo utilizado neste projeto está sendo criado na pasta /database/migrations/ com os arquivos correspondentes.
- 2023_08_01_212306_create_departamentos_table.php
- 2023_08_01_212345_create_funcionarios_table.php
- 2023_08_01_212413_create_tarefas_table.php

# Para executar o script que criara o banco 

        php artisan migrate

# :high_brightness: Tabela de Entidades
<!--ts-->
   * [Departamento](#departamento)
   * [Funcionários](#funcionários)
   * [Tarefas](#pedidos)
<!--te-->

## :bus: Rotas

```
url/ http://127.0.0.1:8000/api/
```
    
## Departamento 🏬

- <spam style="color: lightgreen">__GET  /departamento__</spam>
Confira os Departamentos registrados no banco de dados
Esquema da requisição
    ```
    http://127.0.0.1:8000/api/departamento
    ```
Esquema da resposta
````
[
	{
		"id": 1,
		"Name": "T.I",
		"created_at": "2023-01-08T23:19:08.897000Z",
		"updated_at": "2023-01-08T23:19:08.897000Z"
	},
	{
		"id": 2,
		"Name": "RH",
		"created_at": "2023-02-08T20:12:34.250000Z",
		"updated_at": "2023-02-08T20:12:34.250000Z"
	}
]
````



