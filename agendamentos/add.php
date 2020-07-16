<?php 
  require_once('functions.php'); 
  add();
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
<script type="text/javascript" language="javascript">
  function validacampo(){
    
      alert('Por favor, preencha o campo vazio');
      
}
<!--

/*
if(document.getElementById("agendamento['cliente_id']", "agendamento['veiculo_id']").value == ""){
} else {
      
      return false
     }
-->

</script>
<!--css costumizado-->

<div class="row" id="cadastro">
    <div class="container-fluid">
        <font class="fa fa-calendar fa-2x" color="green"><span color="black"> Novo Agendamento - Test Drive</span></font>
        <hr />
    <form action="add.php" method="post">
      <!-- area de campos do form -->
      <!--campo select que realiza uma consulta no banco de dados-->
      <div class="row">
        <div class="form-group col-md-6">
          <label for="name">Nome do Cliente</label>
          <select class="form-control" name="agendamento['cliente_id']" required autofocus>
                        <option>Selecione</option>
					 <?php
                        
                        $result = "SELECT*FROM clientes ORDER BY nome";
                        $resultado = mysqli_query($conn, $result);
                        while($row_clientes = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $row_clientes['id']; ?>"><?php echo $row_clientes['nome']; ?></option> <?php
                            
                            
                        }
                        
                        ?>	
          </select>  
        </div>
        
        <!--campo select que realiza uma consulta no banco de dados-->    
        <div class="form-group col-md-6">
            
          <label for="name">Carro</label>
          <select class="form-control" name="agendamento['veiculo_id']" required>
                        <option>Selecione</option>
					 <?php
                        
                        $result = "SELECT*FROM veiculos ORDER BY modelo";
                        $resultado = mysqli_query($conn, $result);
                        while($row_carros = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $row_carros['id']; ?>"><?php echo $row_carros['modelo']; ?></option> <?php
                            
                            
                        }
                        
                        ?>
                         </select>
        </div>
          
        <div class="form-group col-md-3 ">
          <label for="campo2">Data do Agendamento</label>
          <input type="date" class="form-control" name="agendamento['data_2']"  required>
            
        </div>
         
        <div class="form-group col-md-3">
          <label for="campo2">Hora do Agendamento</label>
          <select type="time" class="form-control" name="agendamento['hora']" required>
                <option value="">Selecione</option>
                <option value=""></option>
                <option value="08:00:00">08:00:00</option>  
                <option value="09:00:00">09:00:00</option>  
                <option value="10:00:00">10:00:00</option>  
                <option value="11:00:00">11:00:00</option>  
                <option value="12:00:00">12:00:00</option> 
                <option value="13:00:00">13:00:00</option>  
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
            <select class="form-control" name="agendamento['situacao']" required>
                <option value="">Selecione</option>
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
					  
          
      </div ><!-- fim da area de campos do form -->

      <!-- Botoes de acao -->
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary" name="btnAgendamento">Salvar</button>
          <a href="index.php" class="btn btn-default" >Cancelar</a>
        </div>
      </div>
    </form>
    </div>
</div>
<?php include(FOOTER_TEMPLATE); ?>