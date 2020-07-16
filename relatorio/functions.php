<?php
require_once('../config.php');
require_once(DBAPI);
$veiculos = null;
$veiculo = null;
/**
 *  Listagem de veiculos
 */
function index() {
	global $veiculos;
	$veiculos = find_all('veiculos');
}
/**
 *  Cadastro de veiculos
 */
function add() {
  if (!empty($_POST['veiculo'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $veiculo = $_POST['veiculo'];
    $veiculo['modificado'] = $veiculo['criado'] = $today->format("Y-m-d H:i:s");
    
    save('veiculos', $veiculo);
    header('location: index.php');
  }
}
/**
 *	Atualizacao/Edicao de veiculo
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['veiculo'])) {
      $veiculo = $_POST['veiculo'];
      $veiculo['modificado'] = $now->format("Y-m-d H:i:s");
      update('veiculos', $id, $veiculo);
      header('location: index.php');
    } else {
      global $veiculo;
      $veiculo = find('veiculos', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um veiculo
 */
function view($id = null) {
  global $veiculo;
  $veiculo = find('veiculos', $id);
}
/**
 *  Exclusão de um veiculo
 */
function delete($id = null) {
  global $veiculo;
  $veiculo = remove('veiculos', $id);
  header('location: index.php');
}
?>