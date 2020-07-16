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
<h1>Relatório mensal</h1>

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



</tbody>
</table>
</div>
</div>        
<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>