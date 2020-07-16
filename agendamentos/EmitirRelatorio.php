<?php  include('../pdf/mpdf.php');
       require_once('functions.php'); 
       index();
   //include do mpdf e do functions
$pagina = "<img src='../LOGO.png' width='180'/>";
$mpdf->showImageErrors = true;


    $pagina ="
        <html>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        h2{
            text-align: center;
        }
        #linha{
            background-color: #dddddd;
         
            
        }
        </style>    
            <body>
                 
<h2><img src='../LOGO.png' width='180'/> - Relatório de Agendamento</h2>
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Carro</th>
                        <th>Placa</th>
                        <th>Situação</th>
                        <th>Atualizado em</th>    
                    </tr>
                </thead>
                <tbody>
                ";
                    if ($agendamentos) :
                    foreach ($agendamentos as $agendamentos) :
        $pagina = $pagina ."
                    <tr>
                        <td>{$agendamentos['id']}</td>                       
                         ";

                        $result = "SELECT*FROM clientes WHERE id = " . $agendamentos['cliente_id'];
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) 
                        {  $row_veiculos['id'];
       $pagina = $pagina ."
                        <td>{$row_veiculos['nome']}</td>
                        ";
                         
                         }          
       $pagina = $pagina ."

                        ";

                           //data recebe $agendamento['data_2'], pela função strtotime e coverte para o padrão brasileiro, abaixo dou $data_view recebe a função data() para exibir de que forma quero que seja exibida.
                    $data = strtotime($agendamentos['data_2']);
                    $data_view = date('d/m/Y', $data);

       $pagina = $pagina ."
                        <td>{$data_view}</td>
                        <td>{$agendamentos['hora']}</td>
                        
                        ";
                        $result = "SELECT*FROM veiculos WHERE id = " . $agendamentos['veiculo_id'];
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) 
                        {  $row_veiculos['id'];
        $pagina = $pagina ."
                        <td>{$row_veiculos['nome']}</td>
                        <td>{$row_veiculos['placa']}</td>

                        ";
                         }          
       $pagina = $pagina ."
            
                         ";
                            $tipo = $agendamentos['situacao'];
                                $nome = null;

                           if ($tipo == 1){
                               $nome = "Agendado";
                           }elseif ($tipo == 2){
                               $nome = "Não Realizado";
                           }elseif($tipo == 3){
                               $nome = "Realizado";
                           }else{
                               $nome = "Não Agendado";
                           }
       $pagina = $pagina ."
                        <td>{$nome}</td>
                        
                        <td>{$agendamentos['modificado']} </td>
	               </tr>";
                    endforeach; 
                    endif;
                    //Final do forereach
                    
                    //---------------------------------------------------------------------------
                    //total de test drive//
                    //Todos os agendamento
                    $result_msg_agendamento = "SELECT * FROM agendamentos";
                    $resultado_msg_agendamento = mysqli_query($conn , $result_msg_agendamento);
                    //Contar o total de itens
                    $total_msg_agendamento = mysqli_num_rows($resultado_msg_agendamento);
                    //---------------------------------------------------------------------------

                    //---------------------------------------------------------------------------
                    //total de test drive agendado (ativo) //
                    
                    $result_msg_agendado = "SELECT * FROM agendamentos WHERE situacao = 1";
                    $resultado_msg_agendado = mysqli_query($conn , $result_msg_agendado);
                    //Contar o total de itens
                    $total_msg_agendado = mysqli_num_rows($resultado_msg_agendado);
                    //---------------------------------------------------------------------------

                    //---------------------------------------------------------------------------
                    //total de test drive não realizados//
                    
                    $result_msg_nao_realizados = "SELECT * FROM agendamentos WHERE situacao = 2";
                    $resultado_msg_nao_realizados = mysqli_query($conn , $result_msg_nao_realizados);
                    //Contar o total de itens
                    $total_msg_nao_realizados = mysqli_num_rows($resultado_msg_nao_realizados);

                    //---------------------------------------------------------------------------
                    //total de test drive realizados//
                    
                    $result_msg_realizados = "SELECT * FROM agendamentos WHERE situacao = 3";
                    $resultado_msg_realizados = mysqli_query($conn , $result_msg_realizados);
                    //Contar o total de itens
                    $total_msg_realizados = mysqli_num_rows($resultado_msg_realizados);

        $pagina = $pagina ."                     
               
                        <!--<tr>
                            <td id='linha'></td>                        
                            <td id='linha'></td>                        
                            <td id='linha'> </td>                        
                            <td id='linha'></td>                        
                            <td id='linha'></td>                        
                            <td id='linha'></td>                        
                            <td id='linha2'>TOTAL DE REGISTROS: {$total_msg_agendamento}</td>                        
                        </tr>-->
                </tbody>
                </table>
               <br>
               <br>
                <table>
                <thead>
                    <tr>
                        <th id='linha'>TOTAL DE REGISTROS</th>
                        <th id='linha'>PRÓXINOS TEST-DRIVE (AGENDADO)</th>
                        <th id='linha'>TEST-DRIVE REALIZADOS</th>
                        <th id='linha'>TEST-DRIVE NÃO REALIZADOS</th>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$total_msg_agendamento}</td>   
                        <td>{$total_msg_agendado}</td>   
                        <td>{$total_msg_realizados}</td>   
                        <td>{$total_msg_nao_realizados}</td>   
                    </tr>
                </tbody>
                </table>
            </body>
        </html>
        ";
$arquivo = "Relatorio.pdf";
$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf->WriteHTML($pagina);
$mpdf->Output($arquivo,'i');

//I = abre no navegador.
//F = salvar o pdf.
//D = salva o arquivo no computador do usuario.
?>