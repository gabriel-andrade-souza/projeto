<?php
    require_once('functions.php');
    index();
?>
<?php  
include("../login/protect.php");
protect();
?>
<?php include(HEADER_TEMPLATE); ?>

<style type="text/css">
    body{
        background: #e6e6e6;
    }
    #index{
        padding: 10px 10px 30px 10px;
        background: #ffffff;
        box-shadow: 6px 6px 10px #999;
    }
</style>
<br>
<br>
<br>
<br>
<hr />
<div class="row" id="index">
<div class="container-fluid">
<h1>Gerenciar Clientes</h1>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2 class="fa fa-user fa-2x"> Clientes</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
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
		<th width="30%">Nome</th>
		<th>CPF</th>
		<th>Telefone</th>
		<th>Atualizado em</th>    
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($clientes) : ?>
<?php foreach ($clientes as $clientes) : ?>
	<tr>
		<td><?php echo $clientes['id']; ?></td>
		<td><?php echo $clientes['nome']; ?></td>
		<td><?php echo $clientes['cpf']; ?></td>
		<td><?php echo $clientes['telefone']; ?></td>
		<td><?php echo $clientes['modificado']; ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $clientes['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $clientes['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $clientes['id']; ?>">
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