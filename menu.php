<?php require_once 'config.php'; ?>
<?php require_once DBAPI;?>
<!-- require das config do banco -->

<?php  
include("login/protect.php");
protect();

?>
<!--include do app protect para restrição de paginas-->

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<!-- Abertura do banco-->
<?php if ($db) : ?>

<link rel="stylesheet" href="<?php echo BASEURL; ?>css/telas.css">
<!--estilo personalizado da dashboard-->

<div class="row" id="dashboard">
    <div class="container-fluid">
        <i class="fa fa-desktop fa-2x" > Dashboard</i>
    </div>
</div>

<!--<hr />-->
<div class="row">
   <div class="container-fluid" id="acesso">

    <font face="Verdana" class="fa fa-bolt fa-2x" color="gray"> ACESSO RÁPIDO</font>
    <!--<hr />-->
   </div>
</div>
 <!--<?php echo $_SESSION['tipoPerfil']; ?>-->   
  
<div class="row">
    <div class="container-fluid" id="badge">
        	<?php
				//Mensagens não lidas
				$result_msg_agendamento = "SELECT * FROM agendamentos WHERE situacao = 1";
				$resultado_msg_agendamento = mysqli_query($conn , $result_msg_agendamento);
				//Contar o total de itens
				$total_msg_agendamento = mysqli_num_rows($resultado_msg_agendamento);
			?>
			<div class="container-fluid" id="mensagem">
				<h2 class="fa fa-exclamation-triangle fa-2x"> Mensagens:</h2>
			</div>
            <div class="container-fluid">
			<a href="<?php echo BASEURL; ?>agendamentos/"><h3>Agendamentos <span class="badge"><?php echo $total_msg_agendamento; ?></span></h3></a><hr>
            </div>
            <div class="container-fluid">        
			<?php    
				//Todas as Mensagens
				$result_msg_agendamento = "SELECT * FROM agendamentos";
				$resultado_msg_agendamento = mysqli_query($conn , $result_msg_agendamento);
				//Contar o total de itens
				$total_msg_agendamento = mysqli_num_rows($resultado_msg_agendamento);
			?>
			<button class="btn btn-success" type="button">
				Total de Test-Drivers <span class="badge"><?php echo $total_msg_agendamento; ?></span>
			</button>
			
			
			<?php
				//Mensagens não lidas
				$result_msg_agendamento = "SELECT * FROM agendamentos WHERE situacao = 1";
				$resultado_msg_agendamento = mysqli_query($conn , $result_msg_agendamento);
				//Contar o total de itens
				$total_msg_agendamento = mysqli_num_rows($resultado_msg_agendamento);
			?>
			
			<button class="btn btn-primary" type="button">
				Test-Drivers Agendados <span class="badge"><?php echo $total_msg_agendamento; ?></span>
			</button>
			
        </div>
        </div><br>

<div class="row" >
    <div class="container-fluid" id="widget">
		<!--<h4>Função</h4>-->
		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>usuarios/" class="btn btn-primary">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Gerenciar Usuário</p>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>usuarios/perfil.php" class="btn btn-warning">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-file-text-o fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Perfil de Acesso</p>
					</div>
				</div>
			</a>
		</div>
	
		<!--<h4>Clientes</h4>-->
		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>clientes/add.php" class="btn btn-info">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-plus fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Novo Cliente</p>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>clientes" class="btn btn-danger">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Gerenciar Clientes</p>
					</div>
				</div>
			</a>
		</div>
    
    <!--<h4>Estoque</h4>-->
		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>veiculos/" class="btn btn-success">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-car fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Gerenciar Veiculos</p>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="<?php echo BASEURL; ?>veiculos/consultaVeiculo.php" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-search fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Consulta Veiculos</p>
					</div>
				</div>
			</a>
		</div>        
	</div>
</div>


<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>