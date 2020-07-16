<?php  include('../pdf/mpdf.php');
       require_once('functions.php'); //include do mpdf e do functions// 
    
    //A variavel $pagina recebe o html, e tudo fica dentro de aspas ""//
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
                 
<h2><img src='../LOGO.png' width='180'/> - Relatório de Agendamento por data inicio e fim   </h2>
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
                <tbody>";
            //final do html, nesse caso pode tambem reabri-lo com a variavel "$pagina = $pagina." que significa que pagina recebe pagina concatenado(.) com o proximo pagina//
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];
            //post recebendo os campos data_inicio e data_fim para as variaveis//
            $result_agendamento = "SELECT * FROM agendamentos WHERE data_2  >= '$data_inicio' AND  data_2 <= '$data_fim' ORDER BY data_2";
            //select do banco de dados, comparando com as variaveis pela a clasula AND e ordenando por data(data_2), sendo recebido pela variavel $result//
            $resultado_agendamento = mysqli_query($conn, $result_agendamento);
            //executando a query que veio da varivel result, o php exige que exista a variavel de conexao no caso $conn//
            while($rows_agendamento = mysqli_fetch_array($resultado_agendamento)){
            //laço do while//                
                $mensagem = null;
            //inicio a variavel nula//  
                if($rows_agendamento >= 1){
            //verifico se ha pelo menos uma linha 'se'(if) houver o php imprime o codigo//                  

                
        $pagina = $pagina ."
                    <tr>
                        <td>{$rows_agendamento['id']}</td>                       
                         ";

                        $result = "SELECT*FROM clientes WHERE id = " . $rows_agendamento['cliente_id'];
                        $resultado = mysqli_query($conn, $result);
                        while($row_veiculos = mysqli_fetch_assoc($resultado)) 
                        {  $row_veiculos['id'];
       $pagina = $pagina ."
                        <td>{$row_veiculos['nome']}</td>
                        ";
                         
                         }          
       $pagina = $pagina ."
                                               ";

                    //data recebe $rows_agendamento['data_2'], pela função strtotime e coverte para o padrão brasileiro, abaixo dou $data_view recebe a função data() para exibir de que forma quero que seja exibida.//
                    $data = strtotime($rows_agendamento['data_2']);
                    $data_view = date('d/m/Y', $data);

       $pagina = $pagina ."
                        <td>{$data_view}</td>
                        <td>{$rows_agendamento['hora']}</td>
                        
                        ";
                        $result = "SELECT*FROM veiculos WHERE id = " . $rows_agendamento['veiculo_id'];
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
                            $tipo = $rows_agendamento['situacao'];
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
                        
                        <td>{$rows_agendamento['modificado']} </td>
	               </tr>";
                    }else if($rows_agendamento == 0){
                    $mensagem = "Nenhum Registro encontrado...";
    $pagina = $pagina ."
                        
                        
                    ";
                }}//Final do while//
                    
                    //---------------------------------------------------------------------------
                    //total de test drive//
                    //Todos os agendamento entre as datas selecionadas//
                    $result_msg_agendamento = "SELECT * FROM agendamentos WHERE data_2  >= '$data_inicio' AND  data_2 <= '$data_fim' ORDER BY data_2";
                    $resultado_msg_agendamento = mysqli_query($conn , $result_msg_agendamento);
                    //Contar o total de itens
                    $total_msg_agendamento = mysqli_num_rows($resultado_msg_agendamento);
                    //----------------------------------------- ----------------------------------

                    //---------------------------------------------------------------------------
                    //total de test drive agendado (ativo) //
                    
                    $result_msg_agendado = "SELECT * FROM agendamentos WHERE data_2  >= '$data_inicio' AND  data_2 <= '$data_fim' AND  situacao = 1 ORDER BY data_2";
                    $resultado_msg_agendado = mysqli_query($conn , $result_msg_agendado);
                    //Contar o total de itens
                    $total_msg_agendado = mysqli_num_rows($resultado_msg_agendado);
                    //---------------------------------------------------------------------------

                    //---------------------------------------------------------------------------
                    //total de test drive não realizados//
                    
                    $result_msg_nao_realizados = "SELECT * FROM agendamentos WHERE data_2  >= '$data_inicio' AND  data_2 <= '$data_fim' AND  situacao = 2 ORDER BY data_2";
                    $resultado_msg_nao_realizados = mysqli_query($conn , $result_msg_nao_realizados);
                    //Contar o total de itens
                    $total_msg_nao_realizados = mysqli_num_rows($resultado_msg_nao_realizados);

                    //---------------------------------------------------------------------------
                    //total de test drive realizados//
                    
                    $result_msg_realizados = "SELECT * FROM agendamentos WHERE data_2  >= '$data_inicio' AND  data_2 <= '$data_fim' AND  situacao = 3 ORDER BY data_2";
                    $resultado_msg_realizados = mysqli_query($conn , $result_msg_realizados);
                    //Contar o total de itens//
                    $total_msg_realizados = mysqli_num_rows($resultado_msg_realizados);

        $pagina = $pagina ."                     
               
                </tbody>
                </table>
                <h3>{$mensagem}</h3>
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