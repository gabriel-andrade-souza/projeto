<?php 
  require_once('functions.php'); 
  index();
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
        <font class="fa fa-calendar fa-2x" color="green"><span color="black"> Pesquisa - Relatório</span></font>
        <hr />
    <form action="ConsutarAgendamento.php" method="post">
      <!-- area de campos do form -->
      <!--campo select que realiza uma consulta no banco de dados-->
      <div class="row">
        <div class="form-group col-md-4">
          <label for="name">Data Inicio</label>
          <input type="date" class="form-control" name="data_inicio" required>  
        </div>

        <div class="form-group col-md-4">
          <label for="campo2">Data Fim</label>
          <input type="date" class="form-control" name="data_fim" required>
        </div>
      </div ><!-- fim da area de campos do form -->

      <!-- Botoes de acao -->
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" formtarget="_blank" class="btn btn-success" target="_blank">Pesquisar</button>
          <a href="index.php" class="btn btn-default" >Cancelar</a>
        </div>
      </div>
    </form>
    </div>
</div>
<?php include(FOOTER_TEMPLATE); ?>