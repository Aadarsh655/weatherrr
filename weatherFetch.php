<?php
// connecting with database
$servername = "localhost";
$username = "root";
$password = "";
$database = "aadarsh_2332283";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the city name from JS
$city = $_GET['city'];

// API key
$apiKey = "5a77bf83cbb3a8dd1d9f741af2489cfb";
// API URL
$url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $apiKey;
// Execute the search/call
$result = file_get_contents($url);

// Insert the data into the database
$weatherdata = json_decode($result);
$temp = $weatherdata->main->temp;
$description = $weatherdata->weather[0]->description;
$pressure = $weatherdata->main->pressure;
$wind = $weatherdata->wind->speed;
$humidity = $weatherdata->main->humidity;

$sql = "INSERT INTO `weather_2332283`(`temperature`, `discription`, `city`, `pressure`, `wind`, `humidity`) VALUES ($temp, '$description', '$city', $pressure, $wind,$humidity )";
// Execute the data insertion query
mysqli_query($conn, $sql);
mysqli_close($conn);

// Echo the result
echo $result;
?>
