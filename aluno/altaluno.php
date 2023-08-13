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

   $idaluno = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id= :idaluno";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':idaluno',$idaluno, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $endereco = $array_retorno['endereco'];
   $idade = $array_retorno['idade'];
   $dataluno = $array_retorno['datanascimento'];
   $estatus = $array_retorno['estatus'];


?>
<form method="POST" action="crudaluno.php">
    <div class="container">
        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Alterar Aluno</h1>
                    </div>
                </div>

                <div class="input-group">

                    <div class="cx1">

                        <div class="input-box">
                            <label for=""> ALUNO<br></label>
                            <input type="text" name="nome" value="<?php echo $nome;?>" required>
                        </div>

                        <div class="input-box">
                            <label for="">IDADE<br></label>
                            <input type="number" name="idade" value="<?php echo $idade;?>" required>
                        </div>

                    </div>

                    <div class="cx3">

                        <div class="input-box">
                            <label for="">STATUS<br></label>
                            <select name="estatus" id="">
                                <option value="1">APROVADO</option>
                                <option value="0">REPROVADO</option>
                            </select>
                        </div>

                    </div>

                    <div class="cx2">

                        <div class="input-box">
                            <label for="">ENDEREÇO<br></label>
                            <input type="text" name="endereco" value="<?php echo $endereco;?>" required>
                        </div>

                        <div class="input-box">
                            <label for="">DATA ALUNO<br></label>
                            <input type="date" name="dataluno" value="<?php echo $dataluno;?>" required>
                        </div>

                    </div>

                    <input type="hidden" name="id" value="<?php echo $idaluno;?>">

                </div>

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