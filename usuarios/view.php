<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>
<!--Require do functions-->

<?php  
include("../login/protect.php");
protect();
?>
<!--include do protect-->
<?php
$nivel_programa = 1;
include("../login/acesso.php");
?>
<?php include(HEADER_TEMPLATE); ?>
<!--include do header-->

<link rel="stylesheet" href="<?php echo BASEURL; ?>css/telas.css">

<!--css costumizado-->

<div class="row" id="visao">
    <div class="container-fluid">

        <h2>Usuário <?php echo $usuario['nome']; ?></h2>
        <!--titulo costumizado-->
        <hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

                <div class="row">
                    <div class="container-fluid">
                        <dl class="dl-horizontal">
                    <dt>Nome:</dt>
                    <dd><?php echo $usuario['nome']; ?></dd>

                    <dt>RG:</dt>
                    <dd><?php echo $usuario['rg']; ?></dd>

                    <dt>CPF:</dt>
                    <dd><?php echo $usuario['cpf']; ?></dd>

                    <dt>Endereço:</dt>
                    <dd><?php echo $usuario['endereco']; ?></dd>

                    <dt>Telefone:</dt>
                    <dd><?php echo $usuario['tel']; ?></dd>


                    <dt>Nivel de Acesso:</dt>
                    <dd><?php
                           
                           $tipo = $usuario['tipoPerfil'];
                           
                           if ($tipo == 1){
                               echo "Administrador";
                           }elseif ($tipo == 2){
                               echo "Gerente";
                           }elseif($tipo == 3){
                               echo "Vendedor";
                           }
                           
                            ?></dd>

                </dl>

                <div id="actions" class="row">
                    <div class="col-md-12">
                      <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-primary">Editar</a>
                      <a href="index.php" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include(FOOTER_TEMPLATE); ?>