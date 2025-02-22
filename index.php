<?php
    require 'src/Commands/AddEstados.php'; 
    require 'src/Commands/DeleteEstados.php';
    require 'src/Commands/UpdateEstados.php';
    require 'src/Queries/GetEstados.php';
    require 'src/Queries/GetEstado.php';

    header('Content-Type: application/json');

    $method = $_SERVER['REQUEST_METHOD']; 

    if ($method === 'GET') {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Convertir id a entero para seguridad
            echo json_encode(GetEstado::execute($id));
        } else {
            echo json_encode(GetEstados::execute());
        }

    } elseif ($method === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['nombre'], $data['temperatura'], $data['viento'], $data['humedad'])) {
            echo json_encode(['success' => AddEstado::execute($data['nombre'], $data['temperatura'], $data['viento'], $data['humedad'])]);
        }
    } elseif ($method === 'PUT') {

        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'], $data['nombre'], $data['temperatura'], $data['viento'], $data['humedad'])) {
            echo json_encode(['success' => UpdateEstado::execute($data['id'], $data['nombre'], $data['temperatura'], $data['viento'], $data['humedad'])]);
        }
        
    } elseif ($method === 'DELETE') {

        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'])) {
            echo json_encode(['success' => DeleteEstado::execute($data['id'])]);
        }
    } else {

        http_response_code(405);
        echo json_encode(['error' => 'No es una operacion CRUD permitida']);
    }
?>