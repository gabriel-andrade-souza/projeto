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

        <h2>Agendamento <?php echo $agendamento['cliente_id']; ?></h2>
        <!--titulo costumizado-->        
        <hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>
        <!--seçao-->        


        <div class="row">
          <div class="container-fluid">

            <dl class="dl-horizontal">
<!--campo da tabela que realiza uma consulta no banco de dados--> 
                <dt>Nome do Cliente:</dt>
                <dd><?php
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $agendamentos['cliente_id'] 
                        $result = "SELECT*FROM clientes WHERE id = " . $agendamento['cliente_id'];// a variavel $result recebe todo o conteudo do SELECT
                        $resultado = mysqli_query($conn, $result);
                        while($row_clientes = mysqli_fetch_assoc($resultado)) { ?><!--criando uma array-->
                        <option value="<?php echo $row_clientes['id']; ?>"><?php echo $row_clientes['nome']; ?></option> <?php
                            
                            
                        }
                        
                        ?>  </dd>

                <dt>Data do Agendamento:</dt>
                <dd><?php   
//data_view recebe $agendamento['data_2'], pela função strtotime e coverte para o padrão brasileiro, abaixo dou echo para exibir de que forma quero que seja exibida.
          $data_view = strtotime($agendamento['data_2']);
          echo date('d/m/Y', $data_view);

                        ?></dd>

                <dt>Hora do Agendamento:</dt>
                <dd><?php echo $agendamento['hora']; ?> hs</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Carro:</dt>
                <dd><?php              
                        $result = "SELECT*FROM veiculos WHERE id = " . $agendamento['veiculo_id'];
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) { ?><!--criando uma array-->
                        <option value="<?php echo $row_clientes['id']; ?>"><?php echo $row_veiculos['modelo']; ?></option> <?php
                            
                            
                        }
                        
                        ?></dd>

                <dt>Agendado por:</dt>
                <dd><?php
                           
                           $tipo = $agendamento['usuarios_id'];
                           
                           if ($tipo == 1){
                               echo "Administrador";
                           }elseif ($tipo == 2){
                               echo "Gerente";
                           }elseif ($tipo == 3){
                               echo "Vendedor";
                           }else{
                               echo " ";
                           }
                           
                            ?></dd>
                
            <dt>Situação:</dt>
                <dd><?php 
                        
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
                           
                            ?></dd>
              

            <div id="actions" class="row">
                <div class="col-md-12">
                  <a href="edit.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-primary">Editar</a>
                  <a href="index.php" class="btn btn-default">Voltar</a>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>        

<?php include(FOOTER_TEMPLATE); ?>