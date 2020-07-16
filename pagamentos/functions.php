<?php
require_once('../config.php');
require_once(DBAPI);
$pagamentos = null;
$pagamento = null;
/**
 *  Listagem de Pagamentos
 */
function index() {
	global $pagamentos;
	$pagamentos = find_all('pagamentos');
}
/**
 *  Cadastro de Pagamentos
 */
function add() {
  if (!empty($_POST['pagamento'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $pagamento = $_POST['pagamento'];
    $pagamento['modificado'] = $pagamento['criado'] = $today->format("Y-m-d H:i:s");
    
    save('pagamentos', $pagamento);
    header('location: index.php');
  }
}
/**
 *	Atualizacao/Edicao de Pagamento
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['pagamento'])) {
      $pagamento = $_POST['pagamento'];
      $pagamento['modified'] = $now->format("Y-m-d H:i:s");
      update('pagamentos', $id, $pagamento);
      header('location: index.php');
    } else {
      global $pagamento;
      $pagamento = find('pagamentos', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Pagamento
 */
function view($id = null) {
  global $pagamento;
  $pagamento = find('pagamentos', $id);
}
/**
 *  Exclusão de um Pagamento
 */
function delete($id = null) {
  global $pagamento;
  $pagamento = remove('pagamentos', $id);
  header('location: index.php');
}
?>