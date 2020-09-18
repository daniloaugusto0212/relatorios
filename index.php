<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Relatório do mês</title>
</head>
<body>

<header>
    <div class="center">
        <a href="#">Atualizar Gráfico!</a>
    </div>
</header>


<div class="graficos">
    <canvas id="myChart"></canvas>
</div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Receita do mês',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
            
        });

        $.ajax({
            url:'info.php',
            dataType:'json',
            success: function(dataInfo){
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Receita do mês',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [dataInfo[0], dataInfo[1], dataInfo[2], dataInfo[3], dataInfo[4], dataInfo[5], dataInfo[6]]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            }
        })
    </script>
</body>
</html>