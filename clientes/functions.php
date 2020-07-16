<?php
require_once('../config.php');
require_once(DBAPI);
$clientes = null;
$cliente = null;
/**
 *  Listagem de clientes
 */
function index() {
	global $clientes;
	$clientes = find_all('clientes');
}
/**
 *  Cadastro de clientes
 */
function add() {
  if (!empty($_POST['cliente'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $cliente = $_POST['cliente'];
    $cliente['modificado'] = $cliente['criado'] = $today->format("Y-m-d H:i:s");
    
    save('clientes', $cliente);
    header('location: index.php');
  }
}
/**
 *	Atualizacao/Edicao de cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['cliente'])) {
      $cliente = $_POST['cliente'];
      $cliente['modificado'] = $now->format("Y-m-d H:i:s");
      update('clientes', $id, $cliente);
      header('location: index.php');
    } else {
      global $cliente;
      $cliente = find('clientes', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um cliente
 */
function view($id = null) {
  global $cliente;
  $cliente = find('clientes', $id);
}
/**
 *  Exclusão de um cliente
 */
function delete($id = null) {
  global $cliente;
  $cliente = remove('clientes', $id);
  header('location: index.php');
}
?>