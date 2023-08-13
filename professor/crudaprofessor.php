<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastroprofessor'])){
        ##dados recebidos pelo metodo GET
        $nomeprof = $_GET["nomeprof"];
        $idade = $_GET["idade"];
        $cpf = $_GET["cpf"];
        $siape = $_GET["siape"];
        $endereco = $_GET["endereco"];
        $datanascimento = $_GET["datanascimento"];

        ##codigo SQL
        $sql = "INSERT INTO professor(nome,idade, cpf, siape, endereco, datanascimento) 
                VALUES('$nomeprof','$idade','$cpf', '$siape', '$endereco', '$datanascimento')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o professor
                $nomeprof foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nomeprof = $_POST["nomeprof"];
    $idade = $_POST["idade"];
    $siape = $_POST["siape"];
    $cpf = $_POST["cpf"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $id = $_POST["id"];

      ##codigo sql
    $sql = "UPDATE  professor SET nome = :nomeprof, idade= :idade, cpf= :cpf, SIAPE = :siape, datanascimento = :datanascimento, endereco = :endereco WHERE id= :idprofessor ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_INT);
    $stmt->bindParam(':nomeprof',$nomeprof, PDO::PARAM_STR);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->bindParam(':siape',$siape, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento',$datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$id, PDO::PARAM_INT);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o professor
             $nomeprof foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $idprofessor = $_GET['id'];
    $nomeprof = $_GET['nomeprof'];
    $sql ="DELETE FROM `professor` WHERE id = {$idprofessor}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o Professor
             $nomeprof foi excluido!!!"; 

            echo " <button class='button'><a href='listaprofessor.php'>voltar</a></button>";
        }

}

        
?>