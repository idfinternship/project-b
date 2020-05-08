<?php
class Country
{
    // Properties
    public $name;
    public $duration;
    public $rating;
    public $ID;
    
    // Methods
    function set_name($name)
    {
        $this->name = $name;
    }
    function set_duration($duration)
    {
        $this->duration = $duration;
    }
    function set_rating($rating)
    {
        $this->rating = $rating;
    }
    function set_ID($ID)
    {
        $this->ID = $ID;
    }
}
$conn = mysqli_connect("localhost", "root", "", "travelog");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql = "SELECT s.* FROM (SELECT k.name,i.listingId FROM country_has_listing i LEFT JOIN country k ON k.id= i.countryId) p INNER JOIN listing s ON s.id = p.listingId AND s.rating
// BETWEEN'" .$_POST["reitingas"] . "'AND '" .$_POST["reitingas1"]."' WHERE p.name LIKE '" .$_POST["inputValue"] ."'";
$sql = "SELECT s.* FROM (SELECT k.name,i.listingId FROM country_has_listing i LEFT JOIN country k ON k.id= i.countryId) p INNER JOIN listing s ON s.id = p.listingId AND s.rating
 BETWEEN'" .$_POST["reitingas"] . "'AND '" .$_POST["reitingas1"]."' WHERE p.name LIKE '" .$_POST["inputValue"] ."'";
$stack  = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $country = new Country();
        $country->set_name($row["destinationName"]);
        $country->set_duration($row["duration"]);
        $country->set_rating($row["rating"]);
        $country->set_ID($row["id"]);
        array_push($stack, $country);
    }
} else {
    echo json_encode("nulis");
}
$conn->close();
echo json_encode($stack);
?> 