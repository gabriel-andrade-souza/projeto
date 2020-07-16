<?php 
  require_once('functions.php'); 
  add();
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

<div class="row" id="cadastro">
    <div class="container-fluid">
        <font class="fa fa-user fa-2x" color="blue"><span color="black"> Novo Usuário</span></font>
        <hr />
        <form action="add.php" method="post">
          <!-- area de campos do form -->
          <div class="row">
            <div class="form-group col-md-7">
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="usuario['nome']" placeholder="Infrome o nome" required autofocus>
            </div>

            <div class="form-group col-md-2">
              <label for="campo2">CPF</label>
              <input type="text" class="form-control" name="usuario['cpf']" placeholder="Infrome o CPF" required>
            </div>

             <div class="form-group col-md-2">
              <label for="campo2">RG</label>
              <input type="text" class="form-control" name="usuario['rg']" placeholder="Infrome o RG" required>
            </div> 
          </div> 


          <div class="row">
                <div class="form-group col-md-7">
                  <label for="campo1">Endereço</label>
                  <input type="text" class="form-control" name="usuario['endereco']" placeholder="Infrome o endereço" required>
                </div>

                <div class="form-group col-md-2">
                  <label for="campo2">Telefone</label>
                  <input type="tel" class="form-control" name="usuario['tel']" placeholder="Infrome o telefone" required>
                </div>

                <div class="form-group col-md-2">
                  <label for="campo3">Nivel de Acesso</label>
                    <select type="text" class="form-control" name="usuario['tipoPerfil']" disabled>
                       <option name="">Selecione</option>                        
                       <option name=""></option>
                       <option value="1">Administrador</option>
                       <option value="2">Gerente</option>
                       <option value="3">Vendedor</option>
                    </select>
                </div>
            </div> 

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