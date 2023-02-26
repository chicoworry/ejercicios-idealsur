<?php
    require_once "db.php";

    $result = $mysqli->query("SELECT * FROM usuarios");

    while($row = $result->fetch_assoc()) {
        $USERS[] = $row; 
    }

    $men_count = 0;
    $women_count = 0;
    $students_count = 0;
    $teachers_count = 0;
    $directors_count = 0;

    foreach($USERS as $user_index => $user) {
        if ($user["SEXO"] == "H") {
            $men_count++;
        } else {
            $women_count++;
        }

        if ($user["ROLID"] == 1) {
            $students_count++;
        } elseif ($user["ROLID"] == 2) {
            $teachers_count++;
        } else {
            $directors_count++;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/assets/styles.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/apexcharts.css"/>
    <script src="/assets/tailwind.js"></script>
    <script src="/assets/apexcharts.min.js"></script>
    <script src="/assets/app.js"></script>
    <title>Ejercicio CRUD</title>
</head>
<body class="bg-rose-100">
    <main class="w-full h-full">
        <div class="font-bold text-3xl text-center p-10">Ejercicio 3 - CRUD</div>
        <div class="font-bold text-lg text-center m-10"><a href="/" class="text-indigo-600 border-b border-indigo-600 pb-0.5">Volver al listado</a></div>
        <div class="grid grid-cols-2 max-w-7xl mx-auto">
            <div class="mx-auto border border-slate-400 p-5">
                <div class="font-bold text-xl text-center mb-3">Distribución por rol</div>
                <div id="chart1"></div>
            </div>
            <div class="mx-auto border border-slate-400 p-5">
                <div class="font-bold text-xl text-center mb-3">Distribución por género</div>
                <div id="chart2"></div>
            </div>
        </div>
    </main>
    <footer class="bg-black text-white flex justify-center p-5 mt-10">
    </footer>
    <script>
        const chart1 = new ApexCharts(document.querySelector("#chart1"), {
            series: [<?php echo($students_count) ?>, <?php echo($teachers_count) ?>, <?php echo($directors_count) ?>],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Alumnos', 'Docentes', 'Directores'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        });

        const chart2 = new ApexCharts(document.querySelector("#chart2"), {
            series: [<?php echo($men_count) ?>, <?php echo($women_count) ?>],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Hombres', 'Mujeres'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        });

        chart1.render();
        chart2.render();
    </script>
</body>
</html>