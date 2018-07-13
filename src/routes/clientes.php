<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


$app->options('/{routes:.+}', function ($request, $response, $args) {

    return $response;

});


$app->add(function ($req, $res, $next) {

    $response = $next($req, $res);

    return $response

            ->withHeader('Access-Control-Allow-Origin', '*')

            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')

            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

});


// Pegar todos os clientes
$app->get('/api/clientes/', function(Request $request, Response $response){

    $sql = "SELECT * FROM clientes";

    try{

        // Get DB Object
        $db = new db();

        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);

        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($customers);

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});


// Pegar um cliente
$app->get('/api/clientes/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM clientes WHERE id = $id";

    try{

        // Get DB Object
        $db = new db();

        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);

        $customer = $stmt->fetch(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($customer);

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});


// Adicionar Cliente
$app->post('/api/clientes/add', function(Request $request, Response $response){
    $primeiro_nome = $request->getParam('primeiro_nome');
    $ultimo_nome   = $request->getParam('ultimo_nome');
    $email         = $request->getParam('email');
    $telefone      = $request->getParam('telefone');
    
    $sql = "INSERT INTO clientes (primeiro_nome,ultimo_nome,email,telefone) VALUES(:primeiro_nome,:ultimo_nome,:email,:telefone)";

    try{

        // Get DB Object
        $db = new db();

        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':primeiro_nome', $primeiro_nome);
        $stmt->bindParam(':ultimo_nome',   $ultimo_nome);
        $stmt->bindParam(':email',         $email);
        $stmt->bindParam(':telefone',      $telefone);

        $stmt->execute();

        echo '{"notice": {"text": "Cliente Adicionado"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});

// Update Cliente
$app->put('/api/clientes/update/{id}', function(Request $request, Response $response){

    $id            = $request->getAttribute('id');
    $primeiro_nome = $request->getParam('primeiro_nome');
    $ultimo_nome   = $request->getParam('ultimo_nome');
    $email         = $request->getParam('email');
    $telefone      = $request->getParam('telefone');

    $sql = "UPDATE clientes SET
				primeiro_nome 	= :primeiro_nome,
				ultimo_nome 	= :ultimo_nome,
                email		    = :email,
                telefone		= :telefone
			WHERE id = $id";

    try{

        // Get DB Object
        $db = new db();

        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':primeiro_nome', $primeiro_nome);
        $stmt->bindParam(':ultimo_nome',   $ultimo_nome);
        $stmt->bindParam(':email',         $email);
        $stmt->bindParam(':telefone',      $telefone);

        $stmt->execute();

        echo '{"notice": {"text": "Cliente Alterado"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});

// Deletar Cliente
$app->delete('/api/clientes/delete/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "DELETE FROM clientes WHERE id = $id";

    try{

        // Get DB Object
        $db = new db();

        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->execute();

        $db = null;

        echo '{"notice": {"text": "Cliente Deletado"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});