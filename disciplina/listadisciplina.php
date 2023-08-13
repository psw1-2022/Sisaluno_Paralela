<link rel="stylesheet" href="../listas.css">

<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>
                    <th>ID DA DICIPLINA</th>
                    <th>DISCIPLINA</th>
                    <th>CARGO HORARIA</th>
                    <th>SEMESTRE</th>
                    <th>ID DO PROFESSOR</th>
                    <th>NOTA 01</th>
                    <th>NOTA 02</th>
                    <th>MEDIA</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id']?>  </td> 
                            <td> <?php echo $value['nomedisciplina'] ?>   </td> 
                            <td> <?php echo $value['ch']?> </td> 
                            <td> <?php echo $value['semestre']?> </td> 
                            <td> <?php echo $value['idprofessor']?> </td> 
                            <td> <?php echo $value['Nota1']?> </td> 
                            <td> <?php echo $value['Nota2']?> </td> 
                            <td> <?php echo $value['Media']?> </td> 

                            <td>
                               <form method="POST" action="altadisciplina.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>
                            </td> 

                             <td>
                               <form method="GET" action="crudadisciplina.php">
                                        <input name="iddisciplina" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <input name="disciplina" type="hidden" value="<?php echo $value['nomedisciplina']; ?>"/>
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