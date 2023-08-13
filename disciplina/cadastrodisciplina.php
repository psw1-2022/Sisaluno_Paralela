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
<form method="GET" action="crudadisciplina.php">
    <div class="container">
        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                </div>

                <div class="input-group">

                    <div class="cx1">
                        <div class="input-box">
                            <label for=""> Disciplina<br></label>
                            <input type="text" name="disciplina" required>
                        </div>

                        <div class="input-box">
                            <label for="">CARGO HORARIA<br></label>
                            <input type="text" name="ch" required>
                        </div>
                    </div>

                    <div class="cx2">
                        <div class="input-box">
                            <label for="">SEMESTRE<br></label>
                            <input type="number" name="semestre" required>
                        </div>

                        <div class="input-box">
                            <label for="">ID DO PROFESSOR<br></label>
                            <input type="number" name="idprofessor" required>
                        </div>
                    </div>

                    <div class="cx4">
                        <div class="input-box">
                            <label for="">NOTA 01<br></label>
                            <input type="number" name="nota1" required>
                        </div>

                        <div class="input-box">
                            <label for="">NOTA 02<br></label>
                            <input type="number" name="nota2" required>
                        </div>
                    </div>

                </div>

                <div class="login-button">
                    <input type="submit" name="cadastrodisciplina" value="CADASTRAR">
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