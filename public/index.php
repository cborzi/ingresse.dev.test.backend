<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

require '../src/config/db.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response) {

    $name = $request->getAttribute('name');

    $response->getBody()->write("Hello, $name");

    return $response;

});

// Clientes Routes
require '../src/routes/clientes.php';

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
// { "primeiro_nome":"Carlos",
//  "ultimo_nome":"Borzi",
//  "email":"carlosborzi@yahoo.com.br",
//  "telefone":"11 98888-7777"
// }
//

// Deletar Cliente
// DELETE - http://localhost/appslim/public/index.php/api/clientes/delete/3

$app->run();