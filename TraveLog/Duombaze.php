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
$conn = mysqli_connect("localhost", "root", "", "fule1");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql = "SELECT * FROM $_POST["CountryName"] WHERE Kaina >" . $_POST["inputKaina"];
//$sql = "SELECT * FROM mongolia WHERE Kaina >" . $_POST["inputKaina"];
//$sql = "SELECT * FROM " . $_POST["inputValue"];// . "WHERE Kaina>50";
$belenkas = $_POST["inputValue"];
//$sql = "SELECT s.* FROM country p INNER JOIN listing s ON s.id = p.listingId WHERE p.countryName = 'lithuania'";
$sql = "SELECT s.* FROM country p INNER JOIN listing s ON s.id = p.listingId AND s.rating>'" .$_POST["inputKaina"] ."'
WHERE p.countryName LIKE '" .$_POST["inputValue"] ."'";
//$sql = "SELECT * FROM listing";
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