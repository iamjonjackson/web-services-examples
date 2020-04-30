
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Services Example</title>
</head>
<body>

<?php

$result = array(
    "data" => array(
        "red" => 1,
        "blue" => 5,
        "purple" => 10,
        "yellow" => 7
    )
);

// converts plain text JSON result to a PHP data structure 
// $data = json_decode($result);
$data = $result;

// echo "<pre>";
// var_dump($data);
// echo "</pre>";

$key_string = "";
$val_string = "";
$i = 0;

// loop over each item in the $data array
foreach ($data['data'] as $key => $val) { 
    $key_string .= "'$key'";
    $val_string .= $val;
    $i++;
    if (count($data['data']) != $i) {
        $key_string .= ",";
        $val_string .= ",";
    }
} 

// echo $key_string;
// echo "<br />";
// echo $val_string;

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>

<div style="width:400px">

<canvas id="myChart" width="400" height="200"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $key_string ?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo $val_string ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
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
</script>

</div>

</body>
</html>

