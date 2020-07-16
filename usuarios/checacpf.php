<?php
 function CpfValida($cpf) {
//Etapa 1: Cria um array com apenas os digitos numÃ©ricos, isso permite receber o cpf em diferentes formatos como "000.000.000-00", "00000000000", "000 000 000 00" etc...

     
     $j=0;
        for($i=0; $i<(strlen($cpf)); $i++)
            {
                if(is_numeric($cpf[$i]))
                {
            $num[$j]=$cpf[$i];
                $j++;
                }
            }
//Etapa 2: Conta os dÃgitos, um cpf vÃ¡lido possui 11 dÃgitos numÃ©ricos.
     if(count($num)!=11)
        {
            $isCpfValid=false;
        }
//Etapa 3: CombinaÃ§Ãµes como 00000000000 e 22222222222 embora nÃ£o sejam cpfs reais resultariam em cpfs vÃ¡lidos apÃ³s o calculo dos dÃgitos verificares e por isso precisam ser filtradas nesta parte.

     else
        {
            for($i=0; $i<10; $i++)
                {
                if ($num[0]==$i && $num[1]==$i && $num[2]==$i &&
                $num[3]==$i && $num[4]==$i && $num[5]==$i && $num[6]==$i && $num[7]==$i && $num[8]==$i)
                        {
                        $isCpfValid=false;
                        break;
                        }
                }
        }
//Etapa 4: Calcula e compara o primeiro dÃgito verificador.
    if(!isset($isCpfValid))
        {
            $j=10;
            for($i=0; $i<9; $i++)
                {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
                }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2)
                {
                    $dg=0;
                }
        else
            {
                $dg=11-$resto;
            }
        if($dg!=$num[9])
            {
                $isCpfValid=false;
            }
        }
//Etapa 5: Calcula e compara o segundo dÃgito verificador.
    if(!isset($isCpfValid))
        {
            $j=11;
            for($i=0; $i<10; $i++)
                {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
                }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2)
                {
                $dg=0;
                }
        else
                {
                $dg=11-$resto;
                }
        if($dg!=$num[10])
                {
                $isCpfValid=false;
                }
        else
                {
                $isCpfValid=true;
                }
        }
//Trecho usado para depurar erros.
/*
if($isCpfValid==true)
{
echo "<font color=\"GREEN\">Cpf Ã© VÃ¡lido</font>";
}
if($isCpfValid==false)
{
echo "<font color=\"RED\">Cpf InvÃ¡lido</font>";
}
*/
//Etapa 6: Retorna o Resultado em um valor booleano.
return $isCpfValid;
}
?>