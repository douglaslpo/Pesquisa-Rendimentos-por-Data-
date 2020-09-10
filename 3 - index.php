<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Calcula rendimento de ativos</title>
</head>
<body>

<center><h1>Calcula rendimento diario de ativos</h1></center>
<span><br><br></span>

<div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="form-group row">

                <form method="POST" action="rendimento.php">
                    
                        <?php
                        //Conexao com Banco de Dados refazer com seus dados
                        $db = pg_connect("host=localhost port=5432 dbname=bolsa user=postgres password=123456");
                        $resultAtivos = pg_query($db, "SELECT DISTINCT simbol FROM instrument_quote;");
                        $resultDatas = pg_query($db, "SELECT DISTINCT date FROM instrument_quote ORDER BY date desc;");
 
                        echo "<div class='form-group row'>";
                        echo "<label for='example-text-input' class='col-3 col-form-label'>DATA:</label>";
                        echo "<select class='form-control col-9' id='rendimento' name='rendimento'>";
                        echo "<option value='optionData'>Selecione uma Data</option>";
                        while ($row = pg_fetch_assoc($resultDatas)) {
                            echo "<option name='rendimento'>" . $row['date'] . "</option>";
                        };?>    
                    </select>
                        
                        </div>
                        <span><a><br></span>
                        
                        <button type="submit" class="btn btn-primary" value="ENVIAR">Rendimentos</button>
                        </form>
                        <span> </span><br><a> </a>
                    
                    </div>
        </div>
            <div class="col-8">

                <?php
                    //Conexao com Banco de Dados refazer com seus dados
                    $db = pg_connect("host=localhost port=5432 dbname=bolsa user=postgres password=123456");
                    $result = pg_query($db, "SELECT * FROM rendimento_ativo");

                    while ($row = pg_fetch_assoc($result)) {
                        echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr>";
                        echo "<th scope='col'>ID</th>";
                        echo "<th scope='col'>Data</th>";
                        echo "<th scope='col'>Ativo</th>";
                        echo "<th scope='col'>Qtd Ativo</th>";
                        echo "<th scope='col'>% Rendimento</th>";
                        echo "<th scope='col'>R$ Saldo</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "</tbody>";
                        echo "<tr>";                  
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['ativo'] . "</td>";
                        echo "<td>" . $row['qtd_acao'] . "</td>";
                        echo "<td>" . $row['percentual'] . "</td>";
                        echo "<td>" . $row['saldo'] . "</td>";            
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                };?>
            </div>
        </div>

</div>
</body>
</html>
