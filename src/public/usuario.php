<?php
/**
 * Script: ações para o cadastro de usuários
 */

require_once __DIR__ . '/../../vendor/autoload.php';
header('Content-type: application/json; charset=utf-8');

use App\Controllers\UsuarioController as UsuarioController;

$usuarioController = new UsuarioController();

echo json_encode($usuarioController->getAll());

