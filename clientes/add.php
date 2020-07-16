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
        <font class="fa fa-user fa-2x" color="blue"><span color="black"> Novo Cliente</span></font>
        <hr />
    <form action="add.php" method="post">
      <!-- area de campos do form -->
      <div class="row">
        <div class="form-group col-md-8">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="cliente['nome']" placeholder="Infrome o nome" required autofocus>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">CPF</label>
          <input type="text" class="form-control" name="cliente['cpf']" placeholder="Infrome o CPF" required>
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo2">RG</label>
          <input type="text" class="form-control" name="cliente['rg']" placeholder="Infrome o RG" required>
        </div>
      </div>       

      <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Data de Nascimento</label>
            <input type="date" class="form-control" name="cliente['datanasc']" placeholder="Infrome o data de nascimento" required>
        </div>
          
        <div class="form-group col-md-2">
        <label for="campo1">Sexo</label>
            <select type="text" class="form-control" name="cliente['sexo']" required>
               <option value="">Selecione</option>
               <option name=""></option>
               <option value="Masculino">Masculino</option>
               <option value="Feminino">Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Estado Civil</label>
          <select type="text" class="form-control" name="cliente['estadocivil']" required>
               <option value="">Selecione</option>
               <option value=""></option>
               <option value="Solteiro(a)">Solteiro(a)</option>
               <option value="Casado(a)">Casado(a)</option>
              <option value="Viuvo(a)">Viuvo(a)</option>
         </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Telefone</label>
          <input type="tel" class="form-control" name="cliente['telefone']" placeholder="Infrome o telefone" required>
        </div>

        <div class="form-group col-md-4">
          <label for="campo3">E-mail</label>
          <input type="email" class="form-control"
            name="cliente['email']" placeholder="Infrome o E-mail" required>
        </div>          
          
        <div class="form-group col-md-2">
          <label for="campo3">CEP</label>
          <input type="text" id="cep" class="form-control" name="cliente['cep']" placeholder="Infrome o CEP"  size="10" maxlength="9"
               onblur="pesquisacep(this.value);" required>
        </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="campo1">Rua</label>
          <input type="text" id="rua" class="form-control" name="cliente['rua']" placeholder="Infrome o rua" required>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Bairro</label>
          <input type="text" id="bairro" class="form-control" name="cliente['bairro']" placeholder="Infrome o bairro" required>
        </div>

        <div class="form-group col-md-1">
          <label for="campo3">Nùmero</label>
          <input type="text" id="numero" class="form-control" name="cliente['numero']" placeholder="Nùmero" required>
        </div>
        
        <div class="form-group col-md-1">
          <label for="campo3">UF</label>
          <input type="text" id="uf" class="form-control" name="cliente['uf']" placeholder="Infrome o UF" required>
        </div>
            
        <div class="form-group col-md-2">
          <label for="campo3">Complemento</label>
          <input type="text" id="complemento" class="form-control" name="cliente['complemento']" placeholder="Complemento" required>
        </div>

        </div>
                            
        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
          <input type="text" class="form-control" name="cliente['criado']"  disabled>
        </div>  
        
        <div class="form-group col-md-2">
          <label for="campo3">Registrado por</label>
          <input type="text" class="form-control" name=""  
                 value="<?php echo $_SESSION['login']; ?>" disabled>         
        </div>
          
        <div class="form-group col-md-2">
          <input type="hidden" class="form-control" name="cliente['usuarios_id']"  
                 value="<?php echo $_SESSION['usuario_logado']; ?>" >         
        </div>
      </div>

<!-- fim da area de campos do form -->
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