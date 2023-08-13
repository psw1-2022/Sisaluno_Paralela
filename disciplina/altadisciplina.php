
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Formulário</title>
    <link rel="stylesheet" href="../pagina.css">
</head>

<body>
<?php
    require_once('../conexao.php');

   $iddisciplina = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id = :iddisciplina";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':iddisciplina',$iddisciplina, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $id = $array_retorno['id'];
   $disciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $idprofessor = $array_retorno['idprofessor'];
   $semestre = $array_retorno['semestre'];
   $nota1 = $array_retorno['Nota1'];
   $nota2 = $array_retorno['Nota2'];
  
?>
<form method="POST" action="crudadisciplina.php">
    <div class="container">
        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Alterar Disciplina</h1>
                    </div>
                </div>

                <div class="input-group">

                    <div class="cx1">
                        <div class="input-box">
                            <label for=""> Disciplina<br></label>
                            <input type="text" name="disciplina" required value="<?php echo $disciplina;?>">
                        </div>

                        <div class="input-box">
                            <label for="">CARGO HORARIA<br></label>
                            <input type="text" name="ch" required value="<?php echo $ch;?>">
                        </div>
                    </div>

                    <div class="cx2">
                        <div class="input-box">
                            <label for="">SEMESTRE<br></label>
                            <input type="number" name="semestre" required value="<?php echo $semestre;?>">
                        </div>

                        <div class="input-box">
                            <label for="">ID DO PROFESSOR<br></label>
                            <input type="number" name="idprofessor" required value="<?php echo $idprofessor;?>">
                        </div>
                    </div>

                    <div class="cx4">
                        <div class="input-box">
                            <label for="">NOTA 01<br></label>
                            <input type="number" name="nota1" required value="<?php echo $nota1;?>">
                        </div>

                        <div class="input-box">
                            <label for="">NOTA 02<br></label>
                            <input type="number" name="nota2" required value="<?php echo $nota2;?>">
                        </div>
                    </div>

                </div>

                <input type="hidden" name="id" value="<?php echo $id;?>">

                <div class="login-button">
                    <input type="submit" name="update" value="ALTERAR">
                </div>
            </form>


        </div>
    </div>

    <div class="posicionar">
        <div class="voltar-button">
            <button class="button"><a href="../index.php">VOLTAR</a></button>
        </div>
    </div>
    
</form> 
</body>

</html>