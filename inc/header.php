<?php
session_name("login");
protect();

 
$login=$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sistema Lounge Cars</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css"><!--BASEURL  define o caminho deste webapp no servidor web.-->
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/font-awesome.css">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASEURL; ?>css/bootstrap.min.css" rel="stylesheet">
    <!--Script para buscar o cep-->
	<script src="<?php echo BASEURL; ?>js/cep.js"></script>


</head>
<body>

<!--Inicio Menu de Navegaçao-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">   
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo BASEURL; ?>menu.php" class="navbar-brand"><i class="fa fa-home"></i> Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i>
                    Função<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>usuarios/">Gerenciar Usuário</a></li>
                    <li><a href="<?php echo BASEURL; ?>usuarios/perfil.php">Perfil de Acesso</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                    Clientes<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>clientes">Gerenciar Clientes</a></li>
                    <li><a href="<?php echo BASEURL; ?>clientes/add.php">Novo Cliente</a></li>
                </ul>
            </li>
          </ul>
<!-- -->  
            <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file"></i> 
                    Estoque<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>veiculos/">Gerenciar Veiculos</a></li>
                    <li><a href="<?php echo BASEURL; ?>veiculos/consultaVeiculo.php">Consulta</a></li>
                </ul>
              </li>
            </ul>
            
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dollar"></i> 
                    Financeiro<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>pagamentos/">Gerenciar Pagamento</a></li>
                    <li><a href="<?php echo BASEURL; ?>vendas">Venda</a></li>
                    <li><a href="<?php echo BASEURL; ?>#">Recibo</a></li>							                  
                </ul>
              </li>
            </ul>
            
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paste"></i> 
                    Relatório<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>relatorio/relsemanal.php">Semanal</a></li>
                    <li><a href="<?php echo BASEURL; ?>relatorio/relmensal.php">Mensal</a></li>
                    <li><a href="<?php echo BASEURL; ?>relatorio/relanual.php">Anual</a></li>							                  
                </ul>
              </li>
            </ul>        

          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hourglass"></i> 
                    Agendar<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>agendamentos/">Gerenciar Agendamento</a></li>
                    <li><a href="<?php echo BASEURL; ?>agendamentos/EmitirRelatorio.php" target="_blank">Relatório</a></li>
                    <li><a href="<?php echo BASEURL; ?>agendamentos/busca.php">Busca por Data</a></li>
                    <!--<li><a href="<?php echo BASEURL; ?>#">Entrega</a></li>
                    <li><a href="<?php echo BASEURL; ?>#">Retorno</a></li>
                    <li><a href="<?php echo BASEURL; ?>#">Test-Driver</a></li>-->	
                </ul>
              </li>
            </ul> 
            
		  <!--<ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i>
                    Configuração<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>#">Realizar Backup</a></li>
                    <li><a href="<?php echo BASEURL; ?>#">Restaurar</a></li>
					<li><a href="<?php echo BASEURL; ?>#">Contrato</a></li>
                </ul>
            </li>
          </ul>-->
		  
		  <ul class="nav navbar-nav navbar-right">
			  <li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-fw fa-sign-out"></i> Sair </a>
			  </li>
		  </ul>
            
         <ul class="nav navbar-nav navbar-right">
			  <li class="nav-item" 	><!-- depois tenho de trocar o link do usuario de menu para usuario-->
				<a class="nav-link" href="<?php echo BASEURL; ?>usuarios/"> <i class="fa fa-user"></i> Usuário <b><font color="#FF0000"><?php echo strtoupper($_SESSION['login']); ?></font></b> Logado.</a>
			  </li>
		  </ul>
		  <!--/.navbar-collapse -->
        </div>
      </div><!--Fim Menu de Navegaçao-->        	 
  </nav>
    
<main class="container">
<?php include('modal_logout.php'); ?>