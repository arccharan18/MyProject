<?php
$status = "";
$msg = "";
$city = "";
if (isset($_POST['submit'])) {
    $city = $_POST['city'];
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);
    if ($result['cod'] == 200) {
        $status = "yes";
    } else {
        $msg = $result['message'];
    }

    // Get daily forecast
    $url_forecast = "http://api.openweathermap.org/data/2.5/forecast?q=$city&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch_forecast = curl_init();
    curl_setopt($ch_forecast, CURLOPT_URL, $url_forecast);
    curl_setopt($ch_forecast, CURLOPT_RETURNTRANSFER, true);
    $result_forecast = curl_exec($ch_forecast);
    curl_close($ch_forecast);
    $result_forecast = json_decode($result_forecast, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css"/>
    <style>
        body {
            background-color: #2C3E50;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 48px;
            font-weight: 300;
        }

        .widget {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: #34495E;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .weatherIcon {
            flex: 1;
            font-size: 128px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .weatherIcon i {
            padding-top: 20px;
        }

        .weatherInfo {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .temperature {
            font-size: 48px;
            font-weight: 300;
        }

        .description {
            font-size: 24px;
            font-weight: 300;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .place {
            font-size: 24px;
            font-weight: 300;
        }

        .weather-forecast {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .forecast-item {
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #34495E;
            box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
text-align: center;
min-width: 150px;
}
.forecast-item p {
        font-size: 18px;
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .forecast-item i {
        font-size: 48px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .forecast-item .day {
        font-size: 24px;
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .error {
        text-align: center;
        color: #e74c3c;
        font-size: 24px;
        font-weight: 300;
        margin-top: 50px;
    }

    .error p {
        margin-top: 20px;
    }
</style>
</head>
<body>
<?php if ($status == "yes") { ?>
    <h1>Weather in <?php echo $result['name'] ?></h1>
<div class="widget">
    <div class="weatherIcon"><i class="wi <?php echo "wi-owm-" . $result['weather'][0]['id']; ?>"></i></div>
    <div class="weatherInfo">
        <div class="temperature"><?php echo round($result['main']['temp'] - 273.15) ?>°C</div>
        <div class="description"><?php echo ucfirst($result['weather'][0]['description']) ?></div>
        <div class="place"><?php echo $result['name'] ?>, <?php echo $result['sys']['country'] ?></div>
    </div>
</div>

<div class="weather-forecast">
    <?php foreach ($result_forecast['list'] as $forecast) { ?>
        <?php if (strpos($forecast['dt_txt'], '12:00:00') !== false) { ?>
            <div class="forecast-item">
                <div class="day"><?php echo date('l', strtotime($forecast['dt_txt'])) ?></div>
                <i class="wi <?php echo "wi-owm-" . $forecast['weather'][0]['id']; ?>"></i>
                <p><?php echo round($forecast['main']['temp'] - 273.15) ?>°C</p>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<?php } elseif ($status == "no") { ?>
    <div class="error">
    <p><?php echo $msg ?></p>
</div>
<?php } ?>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
<form action="" method="post">
    <input type="text" name="city" placeholder="Enter city name" value="<?php echo $city ?>">
    <input type="submit" name="submit" value="Get Weather">
</form>
</body>
</html>
