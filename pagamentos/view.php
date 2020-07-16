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

<?php include(HEADER_TEMPLATE); ?>
<!--include do header-->

<link rel="stylesheet" href="<?php echo BASEURL; ?>css/telas.css">

<!--css costumizado-->

<div class="row" id="visao">
    <div class="container-fluid">

        <h2>Cliente <?php echo $cliente['nome']; ?></h2>
        <!--titulo costumizado-->        
        <hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>
        <!--seçao-->        


        <div class="row">
          <div class="container-fluid">

            <dl class="dl-horizontal">
                <dt>Nome:</dt>
                <dd><?php echo $cliente['nome']; ?></dd>

                <dt>CPF:</dt>
                <dd><?php echo $cliente['cpf']; ?></dd>

                <dt>RG:</dt>
                <dd><?php echo $cliente['rg']; ?></dd>

                <dt>Data de Nascimento:</dt>
                <dd><?php echo $cliente['datanasc']; ?></dd>

                <dt>Estado Civil:</dt>
                <dd><?php echo $cliente['estadocivil']; ?></dd>

                <dt>Sexo:</dt>
                <dd><?php echo $cliente['sexo']; ?></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Rua:</dt>
                <dd><?php echo $cliente['rua']; ?></dd>

                <dt>Nùmero:</dt>
                <dd><?php echo $cliente['numero']; ?></dd> 

                <dt>Bairro:</dt>
                <dd><?php echo $cliente['bairro']; ?></dd>

                <dt>Complemento:</dt>
                <dd><?php echo $cliente['complemento']; ?></dd>

                <dt>CEP:</dt>
                <dd><?php echo $cliente['cep']; ?></dd>

            </dl>

            <dl class="dl-horizontal">
                <dt>E-mail:</dt>
                <dd><?php echo $cliente['email']; ?></dd>

                <dt>Telefone:</dt>
                <dd><?php echo $cliente['telefone']; ?></dd>

                <dt>UF:</dt>
                <dd><?php echo $cliente['uf']; ?></dd>
                
                <dt>Cadastrado por:</dt>
                <dd>
<!--populando o SELECT com os dados da tabela campo do form que realiza uma consulta no banco de dados--> 
					 <?php
                        $result = "SELECT*FROM usuarios WHERE id = " . $cliente['Usuarios_id'];
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $cliente['Usuarios_id']              
                        $resultado = mysqli_query($conn, $result);//executando
                        while($row_usuarios = mysqli_fetch_assoc($resultado)) { 
                        echo $row_usuarios['login'];
                        }
                        ?></dd>

                <dt>Data de Cadastro:</dt>
                <dd><?php echo $cliente['criado']; ?></dd>
            </dl>

            <div id="actions" class="row">
                <div class="col-md-12">
                  <a href="edit.php?id=<?php echo $cliente['id']; ?>" class="btn btn-primary">Editar</a>
                  <a href="index.php" class="btn btn-default">Voltar</a>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>        

<?php include(FOOTER_TEMPLATE); ?>