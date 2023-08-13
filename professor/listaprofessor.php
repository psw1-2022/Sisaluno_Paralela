<link rel="stylesheet" href="../listas.css">

<?php
require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM professor');
  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>

                    <th>NOME  DO PROFESSOR</th>
                    <th>IDADE</th>
                    <th>SIAPE</th>
                    <th>CPF </th>
                    <th>ENDEREÇO</th>
                    <th>DATA DE NASCIMENTO</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>

                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['idade']?> </td> 
                            <td> <?php echo $value['siape']?> </td> 
                            <td> <?php echo $value['cpf']?> </td> 
                            <td> <?php echo $value['endereco']?> </td> 
                            <td> <?php echo $value['datanascimento']?> </td> 


                            <td>
                               <form method="POST" action="altaprofessor.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                               <form method="GET" action="crudaprofessor.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                                        <input name="nomeprof" type="hidden" value="<?php echo $value['nome']; ?>"/>
                                        <button name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
<?php         
   echo "<button class='button button3'><a href='../index.php'>voltar</a></button>";
?>