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

<center><h1>Calculo do ativo no dia desejado</h1></center>
<span><br><br></span>

<div class="container">

<?php

$db = pg_connect("host=localhost port=5432 dbname=bolsa user=postgres password=123456");

    
    $rendimento = $_POST['rendimento'];
    $result = pg_query($db, "SELECT * FROM rendimento_ativo WHERE date = '$rendimento'");

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
    };
?>

</div>

<button type="submit" class="btn btn-secondary" onclick="window.location.href = 'index.php'">Voltar</button>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</body>
</html>