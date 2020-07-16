<?php
require_once('../config.php');
require_once(DBAPI);
$agendamentos = null;
$agendamento = null;
/**
 *  Listagem de Agendamentos
 */
function index() {
	global $agendamentos;
	$agendamentos = find_all('agendamentos');
}
/**
 *  Cadastro de Agendamentos
 */
function add() {
  if (!empty($_POST['agendamento'])) {
    
    $today =   date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $agendamento = $_POST['agendamento'];
    $agendamento['modificado'] = $agendamento['criado'] = $today->format("Y-m-d H:i:s");
    
    save('agendamentos', $agendamento);
    header('location: index.php');
  }
}
/**
 *	Atualizacao/Edicao de Agendamento
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['agendamento'])) {
      $agendamento = $_POST['agendamento'];
      $agendamento['modificado'] = $now->format("Y-m-d H:i:s");
      update('agendamentos', $id, $agendamento);
      header('location: index.php');
    } else {
      global $agendamento;
      $agendamento = find('agendamentos', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Agendamento
 */
function view($id = null) {
  global $agendamento;
  $agendamento = find('agendamentos', $id);
}
/**
 *  Exclusão de um Agendamento
 */
function delete($id = null) {
  global $agendamento;
  $agendamento = remove('agendamentos', $id);
  header('location: index.php');
}

function EmitirRelatorio(){

     if (isset($_POST['data_inicio']) and ($_POST['data_fim'])) {
          header('location: EmitirRelatorio.php');
          }
      }  
?>