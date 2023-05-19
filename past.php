<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "aadarsh_2332283";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT * FROM `weather_2332283`";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Temperature</th><th>Description</th><th>City</th><th>Pressure</th><th>Wind</th><th>Humidity</th></tr>";
    while ($rows = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rows['id'] . "</td>";
        echo "<td>" . $rows['temperature'] . "</td>";
        echo "<td>" . $rows['discription'] . "</td>";
        echo "<td>" . $rows['city'] . "</td>";
        echo "<td>" . $rows['pressure'] . "</td>";
        echo "<td>" . $rows['wind'] . "</td>";
        echo "<td>" . $rows['humidity'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
