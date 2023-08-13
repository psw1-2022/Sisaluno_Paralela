<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrodisciplina'])){
        ##dados recebidos pelo metodo GET
        $disciplina = $_GET["disciplina"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["idprofessor"];
        $nota1 = $_GET["nota1"];
        $nota2 = $_GET["nota2"];
        $media = ($_GET["nota2"] + $_GET["nota1"] / 2);
        
        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor, Nota1, Nota2, Media) 
                VALUES('$disciplina','$ch','$semestre', '$idprofessor', '$nota1', '$nota2', '$media')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute()){
            echo " <strong>OK!</strong> a disciplina
            $disciplina foi Incluido com sucesso!!!"; 
            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }
}
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id = $_POST['id'];
    $disciplina = $_POST["disciplina"];
    $ch = $_POST["ch"];
    $idprofessor = $_POST["idprofessor"];
    $semestre = $_POST["semestre"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $media = ($_POST["nota2"] + $_POST["nota1"]) / 2;

   
      ##codigo sql
    $sql = "UPDATE  disciplina SET nomedisciplina= :disciplina, ch= :ch, idprofessor= :idprofessor, semestre= :semestre, Nota1 = :nota1, Nota2 = :nota2, Media = :media WHERE id= :iddisciplina ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':iddisciplina',$id, PDO::PARAM_INT);
    $stmt->bindParam(':disciplina',$disciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_STR);
    $stmt->bindParam(':nota1',$nota1, PDO::PARAM_STR);
    $stmt->bindParam(':nota2',$nota2, PDO::PARAM_STR);
    $stmt->bindParam(':media',$media, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_INT);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_INT);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> A disciplina
             $disciplina foi Alterada com sucesso!!!"; 

            echo " <button class='button'><a href='listadisciplina.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $iddisciplina = $_GET['iddisciplina'];
    $disciplina = $_GET['disciplina'];
    $sql ="DELETE FROM `disciplina` WHERE id = $iddisciplina";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> a disciplina
             $disciplina foi excluida!!!"; 

            echo " <button class='button'><a href='listadisciplina.php'>voltar</a></button>";
        }

}

        
?>