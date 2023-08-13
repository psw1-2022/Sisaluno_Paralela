
<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $idade = $_GET["idade"];
        $dataluno = $_GET["dataluno"];
        $endereco = $_GET["endereco"];
        $estatus = $_GET["estatus"];




        ##codigo SQL
        $sql = "INSERT INTO aluno(nome, idade, endereco, datanascimento, estatus) 
                VALUES('$nome','$idade','$endereco', '$dataluno', '$estatus')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];
    $idaluno = $_POST["id"];
   
      ##codigo sql
    $sql = "UPDATE  aluno SET nome= :nome, idade= :idade, endereco= :endereco, estatus= :estatus WHERE id= :idaluno ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':idaluno',$idaluno, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus',$estatus, PDO::PARAM_STR);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $nome foi Alterado com sucesso!!!"; 
            echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
        }

}        


if(isset($_GET['excluir'])){
    $idaluno = $_GET['id'];
    $sql = "DELETE FROM `aluno` WHERE id = {$idaluno}";  // Correção aqui
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
    {
        echo "<strong>OK!</strong> O aluno $idaluno foi excluído!!!"; 
        echo "<button class='button'><a href='listaalunos.php'>Voltar</a></button>";
    }
}


        
?>