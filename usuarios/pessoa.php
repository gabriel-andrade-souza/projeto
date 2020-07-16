<?php include 'checacpf.php'; ?>
<form method="post">
 CPF <input type="text" name="cpf" />
 <input type="submit" name="opcao" value="Valida">
</form>
<?php
 $valida = CpfValida($_POST['cpf']);
 if ($valida) {
 echo 'CPF VÁLIDO';
 } else {
 echo 'CPF INVÁLIDO';
 }
?>