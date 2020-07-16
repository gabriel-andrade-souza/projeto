<?php
    require_once('functions.php');
    index();
?>
<?php  
    include("../login/protect.php");
    protect();
?>
<?php include(HEADER_TEMPLATE); ?>

<link rel="stylesheet" href="<?php echo BASEURL; ?>css/telas.css">

<div class="row" id="index">
<div class="container-fluid">
<h1>Gerenciar Agendamentos</h1>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2 class="fa fa-user fa-2x"> Agendamentos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-info" href="busca.php"><i class="fa fa-paste"></i> Relatório por data</a> 
	    	<a class="btn btn-warning" href="EmitirRelatorio.php" target="_blank"><i class="fa fa-paste"></i> Relatório</a>            
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Agendamento</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="20%">Cliente</th>
		<th>Data</th>
		<th>Hora</th>
        <th>Carro</th>
		<th>Situação</th>    
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($agendamentos) : ?>
<?php foreach ($agendamentos as $agendamento) : ?><!--Estanciando-->        

	<tr>
		<td><?php echo $agendamento['id']; ?></td>
<!--campo da tabela que realiza uma consulta no banco de dados-->        
		<td><?php
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $agendamentos['cliente_id']          
                        
                        $result = "SELECT*FROM clientes WHERE id = " . $agendamento['cliente_id'];// a variavel $result recebe todo o conteudo do SELECT
                        $resultado = mysqli_query($conn, $result);
                        while($row_clientes = mysqli_fetch_assoc($resultado)) { ?><!--criando uma array-->
                        <option value="<?php echo $row_clientes['id']; ?>"><?php echo $row_clientes['nome']; ?></option> <?php
                                                                               
                            
                        }
                        
                        ?></td>
		<td><?php 	
//data_view recebe $agendamento['data_2'], pela função strtotime e coverte para o padrão brasileiro, abaixo dou echo para exibir de que forma quero que seja exibida.
					$data_view = strtotime($agendamento['data_2']);
					echo date('d/m/Y', $data_view);

												?></td>
		<td><?php echo $agendamento['hora']; ?> hs</td>
        <td><?php
//Realiza uma consulta no banco usando um SELECT, comparando com o variavel $agendamento['veiculo_id']          
                        
                        $result = "SELECT*FROM veiculos WHERE id = " . $agendamento['veiculo_id'];// a variavel $result recebe todo o conteudo do SELECT
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) { ?><!--criando uma array-->   
                        <option value="<?php echo $row_veiculos['id']; ?>"><?php echo $row_veiculos['modelo']; ?></option> <?php
                                                                               
                            
                        }
                        
                        ?></td>
		<td><?php
                           
                           $tipo = $agendamento['situacao'];
                           
                           if ($tipo == 1){
                               echo "Agendado";
                           }elseif ($tipo == 2){
                               echo "Não Realizado";
                           }elseif($tipo == 3){
                               echo "Realizado";
                           }else{
                               echo "Não Agendado";
                           } 
                           
                            ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $agendamento['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>        
<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>