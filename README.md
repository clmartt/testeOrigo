

# Teste Órigo

#### Desenvolvido por:

<li>Claudio Martinele: claudio.martt@kvminformatica.com.br</li>
<li>https://www.linkedin.com/in/claudio-marttinielles/</li>
<li>https://github.com/clmartt</li>



### Guia para deploy

#### Dependências
~~~
PHP v ^7.4 ou superior
Composer v2 ou superior
Nodejs npm
~~~

<p>Após a instação do PHP e Composer acesse a raiz do projeto via terminal e execute
os seguintes comandos:</p>

~~~
composer install
npm install
npm run dev
~~~

Ná raiz do projeto cópie o arquivo **.env.exemple** para a raiz do projeto com o nome **.env**
e adicione/troque os valores das variaveis de ambiente.



- Conexão com o banco de dados
~~~
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=NOME_DO_BANCO_DE_DADOS
 DB_USERNAME=LOGIN
 DB_PASSWORD=SENHA
~~~

- Gere a chave da aplicação

~~~
 php artisan key:generate --ansi
~~~

- Crie as tabelas no banco de dados

~~~
 php artisan migrate 
~~~



# Crud via API

Para os testes de requisições foi usada uma extensão do Chrome Talent API Tester.

# Registrando um novo Usuário : POST

![dotenv](./doc/img/registro.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/auth/registro


# Logando para Obter Token : POST

![dotenv](./doc/img/login.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/auth/login



> [!NOTE]
> A resposta será um token que deverá ser informado a cada requisição.


# Lista Todos os Clientes

![dotenv](./doc/img/tc.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/lista/clientes

> [!NOTE]
> Deve ser informado o Authorization e o Token informado no login, Ex: Bearer {token}


> [!IMPORTANT]
> Para todas as requisições o token deve ser informado.


# Consulta por ID

![dotenv](./doc/img/id.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/lista/clientes/3 -- este é o id do cliente


# Consulta por Editar(update)

![dotenv](./doc/img/edit.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/editar/clientes/21 -- este é o id do cliente.

# Novo Cliente 

![dotenv](./doc/img/novo.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/inserir/clientes


# Delete Cliente 

![dotenv](./doc/img/delete.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/delete/clientes/2 -- Id do Cliente.

> [!WARNING]
> Cliente com plano Free não podem ser deletados, com marcado em amarelo acima.




# Logout

![dotenv](./doc/img/logout.png)

<li>Requisição: POST</li>
http://127.0.0.1:8000/api/auth/logout


> [!TIP]
> Olá Pessoal, Agradeço muito pela atenção e oportunidade.

O CRUD via API, está feito.
Como ainda não trabalhei com Angular, posso desenvolver usando outro como o próprio Blade? ou Jascript e Ajax e outros?

Recebi o teste na Sexta feira dia 06 próximo ao fim do dia e só conseguir fazer agora 10/08, pois estava em uma conferência da empresa em que trabalho atualmente.

Qualque duvida estou a disposição.
"# origo" 
