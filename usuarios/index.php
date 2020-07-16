<?php
    require_once('functions.php');
    index();
?>
<?php  
include("../login/protect.php");
protect();
?>
<?php include(HEADER_TEMPLATE); ?>
<?php
$nivel_programa = 1;
include("../login/acesso.php");
?>
<link rel="stylesheet" href="<?php echo BASEURL; ?>css/telas.css">

<div class="row" id="index">
<div class="container-fluid">
<h1>Gerenciar Usuário</h1>
    
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2 class="fa fa-users fa-2x"> Usuários</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    	<a class="btn btn-warning" href="perfil.php"><i class="fa fa-pencil"></i> Alterar Perfil</a>
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
		<th>Nivel de Acesso</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($usuarios) : ?>
<?php foreach ($usuarios as $usuario) : ?>
	<tr>
		<td><?php echo $usuario['id']; ?></td>
		<td><?php echo $usuario['nome']; ?></td>
		<td><?php echo $usuario['cpf']; ?></td>
		<td><?php
                           
                           $tipo = $usuario['tipoPerfil'];
                           
                           if ($tipo == 1){
                               echo "Administrador";
                           }elseif ($tipo == 2){
                               echo "Gerente";
                           }elseif($tipo == 3){
                               echo "Vendedor";
                           }
                           
                            ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $usuario['id']; ?>">
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