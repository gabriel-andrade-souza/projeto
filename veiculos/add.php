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

<!--css costumizado-->

<div class="row" id="cadastro">
    <div class="container-fluid">
        <font class="fa fa-car fa-2x" color="blue"><span color="black"> Novo Veiculo</span></font>
        <hr />
    <form action="add.php" method="post">
      <!-- area de campos do form -->
      <div class="row">
       

        <div class="form-group col-md-3">
          <label for="campo2">Modelo</label>
          <input type="text" class="form-control" name="veiculo['modelo']" placeholder="Informe o modelo" required>
        </div>
          
        <div class="form-group col-md-3">
          <label for="campo2">Marca</label>
          <input type="text" class="form-control" name="veiculo['marca']" placeholder="Informe a marca" required>
        </div>
      </div>       

      <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Cor</label>
            <input type="text" class="form-control" name="veiculo['cor']" placeholder="Informe a cor" required>
        </div>
          
        <div class="form-group col-md-2">
        <label for="campo1">Ano</label>
            <input type="text" class="form-control" name="veiculo['ano']" placeholder="Informe o ano" required>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Km</label>
          <input type="text" class="form-control" name="veiculo['km']" placeholder="Informe a Km" required>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Combustivel</label>
          <select type="text" class="form-control" name="veiculo['combustivel']" required>
               <option value="">Selecione</option>
               <option value="1">Alcool</option>
               <option value="2">Gasolina</option>
              <option value="3">Diesel</option>
         </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Portas</label>
          <select type="text" class="form-control" name="veiculo['portas']" required>
               <option value="">Selecione</option>
               <option value="2">Duas Portas</option>
               <option value="4">Quatro Portas</option>
         </select>
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo3">Opcionais</label>
          <input type="text" class="form-control" name="veiculo['opcionais']" placeholder="Informe os opcionais" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="campo1">Preço</label>
          <input type="text" class="form-control" name="veiculo['preco']"placeholder="Informe o Preço" required>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Placa</label>
          <input type="text" class="form-control" name="veiculo['placa']" placeholder="Informe a placa" required>
        </div>


        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
          <input type="text" class="form-control" name="veiculo['criado']" disabled>
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo3">Registrado por</label>
          <input type="text" class="form-control" name=""  
                 value="<?php echo $_SESSION['login']; ?>" disabled>         
        </div>
          
        <div class="form-group col-md-2">
          <input type="hidden" class="form-control" name="veiculo['usuarios_id']"  
                 value="<?php echo $_SESSION['usuario_logado']; ?>" >         
        </div>       
          
      </div><!-- fim da area de campos do form -->

      <!-- Botoes de acao -->
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="index.php" class="btn btn-default" >Cancelar</a>
        </div>
      </div>
    </form>
    </div>
</div>
<?php include(FOOTER_TEMPLATE); ?>