<?php
class Country
{
    // Properties
    public $price;
    public $duration;
    
    // Methods
    function set_price($price)
    {
        $this->price = $price;
    }
    function set_duration($duration)
    {
        $this->duration = $duration;
    }
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "fule");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql    = "SELECT * FROM " . $_POST["countryname"];
$stack  = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $country = new Country();
        $country->set_price($row["Kaina"]);
        $country->set_duration($row["Trukme"]);
        array_push($stack, $country);
    }
} else {
    echo json_encode("nulis");
}
$conn->close();
echo json_encode($stack);
?> 