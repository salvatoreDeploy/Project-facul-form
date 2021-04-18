<?php 

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '' ;

    if($action == "save"){
        $validForm = true;

        $tamanho_nome = strlen($_POST["campo_nome"]);
            if($tamanho_nome < 5 || $tamanho_nome > 64){
            echo("O campo 'Nome' deve conter entre 5 a 64 caracteres. " . $tamanho_nome);
            $validForm = false;
        }

        $idade = (int)$_POST["campo_idade"];
        if(is_nan($idade) || $idade < 4 || $idade > 120){
            echo ("O campo 'Idade' deve ser preenchido corretamente.");
            $validForm = false;
        }

        $email = $_POST["campo_email"];
        $regex = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
        if(!preg_match($regex, $email)){
            echo("O campo 'E-mail' deve ser preenchido corertamente.");
            $validForm = false;
        }

        $sexo = $_POST["campo_sexo"];
        if($sexo != "m" && "f"){
            echo("O campo 'Sexo deve ser preenchido corretamente.'");
            $validForm = false;
        }

        $curso = $_POST["campo_curso"];
        if($curso == "" || $curso == "Selecione"){
            echo ("O campo 'Curso' deve ser preenchido.");
            $validForm = false;
        }

        $conhecimento = $_POST["campo_conhecimento"];
        if(sizeof($conhecimento) != 2){
            echo("É necessario escolher dois conhecimentos.");
        }

        if($validForm){
            echo "Formulario enviado com sucesso \n";
            var_dump($_POST);
            exit();
        }
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/style.css">
        <script type="text/javascript" src="../scripts/script.js"></script>
        <title>Formulario</title>
    </head>

    <body>
        <h1>Formulario de Teste</h1>
        <form action="?action=save" method="post" name="meuForm">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="campo_nome">Nome:</label>
                    <input class="form-control" type="text" name="campo_nome" placeholder="Digite seu Nome">
                </div>

                <div class="form-group col-md-5">
                    <label for="campo_email">E-mail:</label>
                    <input class="form-control" type="text" name="campo_email" placeholder="Digite seu e-mail">
                        
                </div>

                <div class="form-group col-md-1">
                    <label for="campo_idade">Idade:</label>
                    <input class="form-control" type="text" name="campo_idade">
                </div>
            </div>

            <fieldset>
                <div class="row">
                    <legend class="col-form-label col-sm-1 pt-0">Sexo:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="campo_sexo" value="m">
                            <label class="form-check-label" for="campo_sexo">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="campo_sexo" value="f">
                            <label class="form-check-label" for="campo_sexo">
                                Feminino
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="campo_curso">Cursos: </label>
                        <select class="form-control" name="campo_curso">
                            <option selected>Selecione...</option>
                            <option>Ciencias da Computação</option>
                            <option>Bacharelado em Informatica</option>
                            <option>Engenharia da Computação</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="form-check form-check-inline">Conhecimentos:
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="campo_conhecimento[]" value="word">
                    <label class="form-check-label" for="campo_conhecimento[]">
                        Microsoft Word
                    </label>
                    <input class="form-check-input" type="checkbox" name="campo_conhecimento[]" value="html">
                    <label class="form-check-label" for="campo_conhecimento[]">
                        HTML
                    </label>
                    <input class="form-check-input" type="checkbox" name="campo_conhecimento[]" value="js">
                    <label class="form-check-label" for="campo_conhecimento[]">
                        Java Script
                    </label>
                    <input class="form-check-input" type="checkbox" name="campo_conhecimento[]" value="php">
                    <label class="form-check-label" for="campo_conhecimento[]">
                        PHP
                    </label>
                </div>
            </div>

            <div class="botao form-row">
                <div class="form-group col-md-5">
                    <button class="btn btn-outline-warning" type="reset">Limpar</button>
                    <button class="btn btn-outline-primary" type="button" onclick="validForm()" value="Enviar" name=>
                        Enviar
                    </button>
                </div>
        </form>
    </body>

</html>