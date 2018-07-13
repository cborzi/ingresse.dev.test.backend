# ingresse.dev.test.backend
Ingresse Backend Developer test

Foi utilizado para a APP

https://www.apachefriends.org/pt_br/index.html

https://getcomposer.org/

https://www.getpostman.com/ 

https://www.slimframework.com/

Instalar todos os softwares acima:

- APÓS BAIXAR OS ARQUIVOS NA PASTA C:\xampp\htdocs\appslim

na pasta appslim, digitar:

composer require slim/slim "^3.0" 

- PARA TESTAR A APP ABRIR O Postman 

// Comandos para teste no Postman

// Todos os clientes

// GET - http://localhost/appslim/public/index.php/api/clientes/

// Somente um cliente

// GET - http://localhost/appslim/public/index.php/api/clientes/1

// Insere cliente

// POST - http://localhost/appslim/public/index.php/api/clientes/add

//

// Headers

// Key=Content-Type, Values=application/json 
//

// Body - opção raw - JSON

// { "primeiro_nome":"xCarlos",

//  "ultimo_nome":"xBorzi",


//  "email":"xcarlosborzi@yahoo.com.br",

//  "telefone":"11 98888-7777"

// }

//

// Altera cliente

// PUT - http://localhost/appslim/public/index.php/api/clientes/update/1

//

// Headers

// Key=Content-Type, Values=application/json 

//

// Body - opção raw - JSON

// { "primeiro_nome":"Ingresse",

//  "ultimo_nome":"Teste",

//  "email":"teste@yahoo.com.br",

//  "telefone":"11 98888-7777"

// }

//

// Deletar Cliente

// DELETE - http://localhost/appslim/public/index.php/api/clientes/delete/3


