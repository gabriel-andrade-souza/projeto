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
        <font class="fa fa-dollar fa-2x" color="green"><span color="black"> Novo Pagamento</span></font>
        <hr />
    <form action="add.php" method="post">
      <!-- area de campos do form -->
      <div class="row">
        <div class="form-group col-md-8">
          <label for="name">Nome Cliente</label>
          <select class="form-control" name="pagamento['cliente_id']" id="cliente_id">
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

        <div class="form-group col-md-2">
          <label for="campo2">CPF</label>
          <span class="caregando">Agauarde, caregando...</span>
          <select name="pagamento['cpf']" class="form-control" id="cpf">
           
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo2">RG</label>
          <input type="text" class="form-control" name="pagamento['rg']" placeholder="Infrome o RG">
        </div>
      </div>       

      <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Data de Nascimento</label>
            <input type="date" class="form-control" name="pagamento['datanasc']" placeholder="Infrome o data de nascimento">
        </div>
          
        <div class="form-group col-md-2">
        <label for="campo1">Sexo</label>
            <select type="text" class="form-control" name="pagamento['sexo']">
               <option value="">Selecione</option>
               <option name=""></option>
               <option value="Masculino">Masculino</option>
               <option value="Feminino">Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Estado Civil</label>
          <select type="text" class="form-control" name="pagamento['estadocivil']">
               <option value="">Selecione</option>
               <option value=""></option>
               <option value="Solteiro(a)">Solteiro(a)</option>
               <option value="Casado(a)">Casado(a)</option>
              <option value="Viuvo(a)">Viuvo(a)</option>
         </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">CEP</label>
          <input type="text" class="form-control" name="pagamento['cep']" placeholder="Infrome o CEP">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">UF</label>
          <input type="text" class="form-control" name="pagamento['uf']" placeholder="Infrome o UF">
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
          <input type="text" class="form-control" name="pagamento['criado']"  disabled>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="campo1">Rua</label>
          <input type="text" class="form-control" name="pagamento['rua']" placeholder="Infrome o rua">
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Bairro</label>
          <input type="text" class="form-control" name="pagamento['bairro']" placeholder="Infrome o bairro">
        </div>

        <div class="form-group col-md-1">
          <label for="campo3">Nùmero</label>
          <input type="text" class="form-control" name="pagamento['numero']" placeholder="Infrome o nùmero">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Complemento</label>
          <input type="text" class="form-control" name="pagamento['complemento']" placeholder="Infrome o complemento">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Telefone</label>
          <input type="tel" class="form-control" name="pagamento['telefone']" placeholder="Infrome o telefone">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">E-mail</label>
          <input type="email" class="form-control"
            name="pagamento['email']" placeholder="Infrome o E-mail">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Registrado por</label>
          <input type="text" class="form-control" name=""  
                 value="<?php echo $_SESSION['login']; ?>" disabled>         
        </div>
          
        <div class="form-group col-md-2">
          <input type="hidden" class="form-control" name="pagamento['Usuarios_id']"  
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