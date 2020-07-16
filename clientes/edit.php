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
        <font class="fa fa-user fa-2x" color="gray"><span color="black"> Atualizar Cliente</span></font>
        <hr />
    <form action="edit.php?id=<?php echo $cliente['id']; ?>" method="post">
        <!-- area de campos do form -->
        <div class="row">
            <div class="form-group col-md-8">
              <label for="name">Nome</label>
                <input type="text" class="form-control" name="cliente['nome']" value="<?php echo $cliente['nome']; ?>" placeholder="Infrome o nome">
            </div>

            <div class="form-group col-md-2">
              <label for="campo2">CPF</label>
                <input type="text" class="form-control" name="cliente['cpf']" value="<?php echo $cliente['cpf']; ?>" placeholder="Infrome o CPF ">
            </div>
          
            <div class="form-group col-md-2">
              <label for="campo2">RG</label>
                <input type="text" class="form-control" name="cliente['rg']" value="<?php echo $cliente['rg']; ?>" placeholder="Infrome o RG">
            </div>
      </div>       

      <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Data de Nascimento</label>
            <input type="date" class="form-control" name="cliente['datanasc']" value="<?php echo $cliente['datanasc']; ?>" placeholder="Infrome a data de nascimento">
        </div>
          
        <div class="form-group col-md-2">
        <label for="campo1">Sexo</label>
            <select type="text" class="form-control" name="cliente['sexo']">
               <option value="<?php echo $cliente['sexo']; ?>"><?php
                           
                           $tipo = $cliente['sexo'];
                           
                           if ($tipo == "Masculino"){
                               echo "Masculino";
                           }elseif ($tipo == "Feminino"){
                               echo "Feminino";
                           }else{
                               echo "Selecione";
                           }
                           
                            ?></option>
               <option value=""></option>
               <option value="Masculino">Masculino</option>
               <option value="Feminino">Feminino</option>
               
            </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Estado Civil</label>
            <select type="text" class="form-control" name="cliente['estadocivil']">
               <option value="<?php echo $cliente['estadocivil']; ?>"><?php
                           
                           $tipo = $cliente['estadocivil'];
                           
                           if ($tipo == "Solteiro(a)"){
                               echo "Solteiro(a)";
                           }elseif ($tipo == "Casado(a)"){
                               echo "Casado(a)";
                           }elseif($tipo == "Viuvo(a)"){
                               echo "Viuvo(a)";
                           }else{
                               echo "Selecione";
                           }
                           
                            ?></option>
               <option value=""></option>
               <option value="Solteiro(a)">Solteiro(a)</option>
               <option value="Casado(a)">Casado(a)</option>
               <option value="Viuvo(a)">Viuvo(a)</option>  
            </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Telefone</label>
          <input type="tel" class="form-control" name="cliente['telefone']" value="<?php echo $cliente['telefone']; ?>" placeholder="Infrome o telefone">
        </div>
          
        <div class="form-group col-md-4">
          <label for="campo3">E-mail</label>
          <input type="email" class="form-control" name="cliente['email']" value="<?php echo $cliente['email']; ?>" placeholder="Infrome o E-mail">
        </div>
          
        <div class="form-group col-md-2">
          <label for="campo3">CEP</label>
          <input type="text" class="form-control" name="cliente['cep']" id="cep" value="<?php echo $cliente['cep']; ?>" placeholder="Infrome o CEP"   size="10" maxlength="9"
               onblur="pesquisacep(this.value);">
        </div>
          
        <div class="row">
        <div class="form-group col-md-3">
          <label for="campo1">Rua</label>
          <input type="text" class="form-control" name="cliente['rua']" id="rua" value="<?php echo $cliente['rua']; ?>" placeholder="Infrome a rua">
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Bairro</label>
          <input type="text" id="bairro" class="form-control" name="cliente['bairro']" value="<?php echo $cliente['bairro']; ?>" placeholder="Infrome o bairro">
        </div>

        <div class="form-group col-md-1">
          <label for="campo3">Nùmero</label>
          <input type="text" class="form-control" name="cliente['numero']" value="<?php echo $cliente['numero']; ?>" placeholder="Infrome o nùmero">
        </div>
            
        <div class="form-group col-md-1">
          <label for="campo3">UF</label>
          <input type="text" class="form-control" name="cliente['uf']" id="uf" value="<?php echo $cliente['uf']; ?>" placeholder="Infrome o UF">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">Complemento</label>
          <input type="text" class="form-control" name="cliente['complemento']" value="<?php echo $cliente['complemento']; ?>" placeholder="Infrome o complemento">
        </div>
       </div>

        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
            <input type="text" class="form-control" name="cliente['criado']" disabled value="<?php echo $cliente['criado']; ?>" >
       </div>

        <div class="form-group col-md-2">
          <label for="campo3">Registrado por</label>
          <select class="form-control" name="" disabled>
<!--populando o SELECT com os dados da tabela campo do form que realiza uma consulta no banco de dados--> 
					 <?php
                        $result = "SELECT*FROM usuarios WHERE id = " . $cliente['Usuarios_id'];
//Realiza uma consulta no banco usando um SELECT, comparando com a variavel $cliente['Usuarios_id']              
                        $resultado = mysqli_query($conn, $result);
                        while($row_usuarios = mysqli_fetch_assoc($resultado)) { ?>
                        <option value="<?php echo $row_usuarios['id']; ?>"><?php echo $row_usuarios['login']; ?></option> <?php
                            
                            
                        }
                        
                        ?>	
             </select>
        </div>    
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