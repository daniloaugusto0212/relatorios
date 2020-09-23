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
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março'],
                datasets: [{
                    label: '# Receita do mês',
                    data: [0,0,0],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        '#b39ddb ',
                        '#42a5f5 '
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)'
                    ],
                    borderWidth: 1
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
        $('a').click(function(e){
            e.preventDefault()
            atualizarGrafico();
        })

        function atualizarGrafico(){
            $.ajax({
            url:'info.php',
            dataType:'json',
            success: function(dataInfo){
                console.log(dataInfo);
                chart.destroy();
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: ['Janeiro', 'Fevereiro', 'Março'],
                        datasets: [{
                            label: ' # Receita do mês',
                            data: [dataInfo[0].valor, dataInfo[1].valor, dataInfo[2].valor],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                '#b39ddb ',
                                '#42a5f5 '
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 99, 132)'
                            ],
                            borderWidth: 1
                        }]
                    },

                    // Configuration options go here
                    options: {
                        scales:{
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        })
        }
        
    </script>
</body>
</html>