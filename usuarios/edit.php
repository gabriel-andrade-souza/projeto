<?php 
  require_once('functions.php'); 
  edit();
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
        <font class="fa fa-user fa-2x" color="gray"><span color="black"> Atualizar Usuário</span></font>
        <hr />
        <form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post">
        <!-- area de campos do form -->
          <div class="row">
            <div class="form-group col-md-7">
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $usuario['nome']; ?>" placeholder="Infrome o nome">
            </div>
            <div class="form-group col-md-2">
              <label for="campo2">CPF</label>
             <input type="text" class="form-control" name="usuario['cpf']" value="<?php echo $usuario['cpf']; ?>" placeholder="Infrome o CPF">
            </div>

             <div class="form-group col-md-2">
              <label for="campo2">RG</label>
             <input type="text" class="form-control" name="usuario['rg']" value="<?php echo $usuario['rg']; ?>" placeholder="Infrome o RG">
            </div> 
          </div> 
          <div class="row">
                <div class="form-group col-md-7">
                  <label for="campo1">Endereço</label>
                    <input type="text" class="form-control" name="usuario['endereco']" value="<?php echo $usuario['endereco']; ?>" placeholder="Infrome o endereço">
                </div>

                <div class="form-group col-md-2">
                  <label for="campo2">Telefone</label>
                     <input type="tel" class="form-control" name="usuario['tel']" value="<?php echo $usuario['tel']; ?>" placeholder="Infrome o telefone">

                </div>

                <div class="form-group col-md-2">
                  <label for="campo3">Nivel de Acesso</label>
                    <select type="text" class="form-control" name="usuario['tipoPerfil']" disabled>
                       <option value=""><?php
                           
                           $tipo = $usuario['tipoPerfil'];
                           
                           if ($tipo == 1){
                               echo "Administrador";
                           }elseif ($tipo == 2){
                               echo "Gerente";
                           }elseif($tipo == 3){
                               echo "Vendedor";
                           }else{
                               echo "Selecione";
                           }
                           
                            ?></option>
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