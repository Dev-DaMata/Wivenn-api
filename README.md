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
   
    >http://127.0.0.1:8000/api/departamento
 
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

---
- **GET /departamento/:id**

Busca um departamento no banco de dados a partir do id

Esquema da requisição:

    >http://127.0.0.1:8000/api/departamento/2

Esquema da resposta:

```json
{
	"id": 2,
	"Name": "RH",
	"created_at": "2023-02-08T20:12:34.250000Z",
	"updated_at": "2023-02-08T20:12:34.250000Z"
}
```

Esquema da resposta caso você esteja procurando um ID que não existe:

```json
{
	"message": "Erro ao pesquisar o departamento."
}
```

---
- **POST**

Insira um departamento no banco

Esquema da requisição:

    >http://127.0.0.1:8000/api/departamento

No json:
```json
{
	"nome": "Cozinha",
}
```

Esquema da resposta:

```json
{
	"Name": "Cozinha",
	"updated_at": "2023-08-02T20:39:01.407000Z",
	"created_at": "2023-08-02T20:39:01.407000Z",
	"id": 3
}
```

---

- **PUT /departamento/id**

Verbo responsavel pela atualização do departamento

Esquema da requisição:

>http://127.0.0.1:8000/api/departamento/5

No json:

```json
{
	"nome": "Diretoria",
}
```
Esquema da resposta:

```json
{
	"id": 5,
	"Name": "Diretoria",
	"created_at": "2023-02-08T20:40:13.687000Z",
	"updated_at": "2023-08-02T20:44:05.574000Z"
}
```
---
- **DELETE /departamento/id**

Verbo responsavel por excluir o departamento do banco de dados

Esquema da requisição:

>http://127.0.0.1:8000/api/departamento/5

Esquema da resposta:

```json
{
	"message": "Departamento deletado com sucesso."
}
```
---

## Funcionario 🧑‍🏭

- <spam style="color: lightgreen">__GET  /funcionario__</spam>

Confira os funcionarios registrados no banco de dados

Esquema da requisição
   
    >http://127.0.0.1:8000/api/funcionario
 
Esquema da resposta
````
[
	{
		"id": 5,
		"firstName": "Guilherme",
		"lastName": "da Mata",
		"email": "gui@gmail.com",
		"phone": "+55 (11) 98765-4321",
		"department_id": "1",
		"created_at": "2023-02-08T18:40:42.620000Z",
		"updated_at": "2023-02-08T18:40:42.620000Z"
	},
	{
		"id": 6,
		"firstName": "pedro",
		"lastName": "da Mata",
		"email": "pedro@gmail.com",
		"phone": "987654321",
		"department_id": "1",
		"created_at": "2023-02-08T18:49:44.690000Z",
		"updated_at": "2023-02-08T18:49:44.690000Z"
	}
]
````

---
- **GET /funcionario/:id**

Busca um funcionario no banco de dados a partir do id

Esquema da requisição:

    >http://127.0.0.1:8000/api/funcionario/5

Esquema da resposta:

```json
{
	"id": 5,
	"firstName": "Guilherme",
	"lastName": "da Mata",
	"email": "gui@gmail.com",
	"phone": "+55 (11) 98765-4321",
	"department_id": "1",
	"created_at": "2023-02-08T18:40:42.620000Z",
	"updated_at": "2023-02-08T18:40:42.620000Z"
}
```

Esquema da resposta caso você esteja procurando um ID que não existe:

```json
{
	"message": "Erro ao pesquisar o funcionario."
}
```
---
- **POST**

Insira um funcionario no banco

Esquema da requisição:

    >http://127.0.0.1:8000/api/funcionario
    
⚠️ esse metodo possui uma validação de email e telefone!

No json:
```json
{
		"firstName": "Guilherme",
		"lastName": "da Mata",
		"email": "gui@gmail.com",
		"phone": "999589965",
		"department_id": "1",
}
```

Esquema da resposta:

```json
{
	"message": "Funcionario cadastrado com sucesso."
}
```
Esquema da resposta erro na validação do telefone:

```json
{
	"message": "Formato de número de telefone inválido."
}
```
Esquema da resposta erro na validação do email:

```json
{
	"message": "Formato de email inválido."
}
````

---

- **PUT /funcionario/id**

Verbo responsavel pela atualização do funcionario

Esquema da requisição:

>http://127.0.0.1:8000/api/funcionario/7

⚠️ esse metodo possui uma validação de email e telefone!

No json:

```json
{
		"firstName": "Guilherme",
		"lastName": "da Mata",
		"email": "gcordeiro773@gmail.com",
		"phone": "999589965",
		"department_id": "1",
}
```
Esquema da resposta:

```json
{
	"id": 7,
	"firstName": "Guilherme",
	"lastName": "da Mata",
	"email": "gcordeiro773@gmail.com",
	"phone": "999589965",
	"department_id": "1",
	"created_at": "2023-02-08T21:07:46.800000Z",
	"updated_at": "2023-08-02T21:13:27.872000Z"
}
```

Esquema da resposta erro na validação do telefone:

```json
{
	"message": "Formato de número de telefone inválido."
}
```
Esquema da resposta erro na validação do email:

```json
{
	"message": "Formato de email inválido."
}
````

---

- **DELETE /funcionario/id**

Verbo responsavel por excluir o funcionario do banco de dados

Esquema da requisição:

>http://127.0.0.1:8000/api/funcionario/7

Esquema da resposta:

```json
{
	"message": "Funcionario deletado com sucesso."
}
```
---

## Tarefa 📜

- <spam style="color: lightgreen">__GET  /tarefa__</spam>

Confira as tarefas registradas no banco de dados

Esquema da requisição
   
    >http://127.0.0.1:8000/api/tarefa
 
Esquema da resposta
````
[
	{
		"id": 3,
		"title": "limpar pc",
		"description": "o computador do chefe ta sujo",
		"assignee_id": "2",
		"due_date": "1900-01-01 23:19:16.283",
		"created_at": "2023-02-08T21:23:27.767000Z",
		"updated_at": "2023-02-08T21:23:27.767000Z"
	},
	{
		"id": 4,
		"title": "contratar o dev",
		"description": "dev passou no teste",
		"assignee_id": "3",
		"due_date": "1900-01-01 23:19:16.283",
		"created_at": "2023-02-08T21:23:51.890000Z",
		"updated_at": "2023-02-08T21:23:51.890000Z"
	}
]
````

---

