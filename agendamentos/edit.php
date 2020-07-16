<?php 
  require_once('functions.php'); 
  edit();
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

<div class="row" id="cadastro">
    <div class="container-fluid">
        <font class="fa fa-calendar fa-2x" color="green"><span color="black"> Atualizar Agendamento - Test Drive</span></font>
        <hr />
    <form action="edit.php?id=<?php echo $agendamento['id']; ?>" method="post">
        <!-- area de campos do form -->
        <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Nome do Cliente</label>
          <select class="form-control" name="agendamento['cliente_id']">
<!--populando o SELECT com os dados da tabela 
campo do form que realiza uma consulta no banco de dados--> 
					 <?php
                        $result = "SELECT*FROM clientes WHERE id = " . $agendamento['cliente_id'];
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $agendamentos['cliente_id']              
                        $resultado = mysqli_query($conn, $result);
                        while($row_clientes = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $row_clientes['id']; ?>"><?php echo $row_clientes['nome']; ?></option> <?php
                            
                            
                        }
                        
                        ?>	
                         </select>  
        </div>
            
            <div class="form-group col-md-6">
              <label for="name">Carro</label>
          <select class="form-control" name="agendamento['veiculo_id']">
<!--campo do form que realiza uma consulta no banco de dados-->
					 <?php              
                        $result = "SELECT*FROM veiculos WHERE id = " . $agendamento['veiculo_id'];
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $agendamentos['veiculo_id']
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $agendamento['veiculo_id'];    ?>"><?php echo $row_veiculos['nome']; ?></option> <?php
                            
                            
                        }
                        
                        ?>	
                        <option>Selecione</option>
					 <?php
//populando o SELECT com os dados da tabela                       
                        $result = "SELECT*FROM veiculos ORDER BY nome";
                        $resultado = mysqli_query($conn, $result);
                        while($row_carros = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $row_carros['id']; ?>"><?php echo $row_carros['nome']; ?></option> <?php
                            
                            
                        }
                        
                        ?>
                         </select>                
                
            </div>
            <div class="form-group col-md-3">
              <label for="campo2">Data do Agendamento</label>
                <input type="date" class="form-control" name="agendamento['data_2']" value="<?php echo $agendamento['data_2']; ?>">
            </div>
          
            <div class="form-group col-md-3">
              <label for="campo2">Hora do Agendamento</label>
                 <select type="time" class="form-control" name="agendamento['hora']">
                <option value="<?php echo $agendamento['hora']; ?>"><?php echo $agendamento['hora']; ?></option>
                <option value=""></option>
                <option value="08:00:00">08:00:00</option>  
                <option value="09:00:00">09:00:00</option>  
                <option value="10:00:00">10:00:00</option>  
                <option value="11:00:00">11:00:00</option>  
                <option value="12:00:00">12:00:00</option> <option value="13:00:00">13:00:00</option>  
                <option value=""> </option> 
                <option value="13:00:00">13:00:00</option>  
                <option value="14:00:00">14:00:00</option>  
                <option value="15:00:00">15:00:00</option>  
                <option value="16:00:00">16:00:00</option>  
                <option value="17:00:00">17:00:00</option>  
          </select>
          </div>
                         
            <div class="form-group col-md-3">
              <label for="campo2">Situação</label>
                <select class="form-control" name="agendamento['situacao']">
                    <option value="<?php echo $agendamento['situacao']; ?>"><?php 
                        
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
                           
                            ?></option>
                    <option value=""></option>
                    <option value="1">Agendado</option>
                    <option value="2">Não Realizado</option>
                    <option value="3">Realizado</option>
                </select>
            </div>
        
            <div class="form-group col-md-3">
              <label for="name">Agendado por</label>
              <input type="text" name="" class="form-control" id="" placeholder="Titulo"  value="<?php echo $_SESSION['login']; ?>" disabled    >   
            </div>  

        <!--input do id do usuario logado que esta cadastrando o agendamento-->		
        <input type="hidden" name="agendamento['usuarios_id']" class="form-control" id="" placeholder="Titulo"  value="<?php echo $_SESSION['usuario_logado']; ?>" >
            
      </div><!-- fim da area de campos do form -->
      
        <!-- Botoes de acao -->
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>