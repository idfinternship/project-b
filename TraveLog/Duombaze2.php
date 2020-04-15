<?php
class Listing
{
    // Properties
    public $checkIn;
    public $price;
    public $name;

    // Methods
    function set_checkIn($checkIn)
    {
        $this->checkIn = $checkIn;
    }
    function set_price($price)
    {
        $this->price = $price;
    }

    function set_name($name)
    {
        $this->name = $name;
    }
}
$conn = mysqli_connect("localhost", "root", "password", "travelog2");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT s.*,p.destinationName FROM listing p INNER JOIN individual s ON p.id = s.indivId WHERE s.indivId LIKE'".$_POST["inputID"] ."'";
 /* $sql = "SELECT s.* FROM 
(SELECT k.name,i.listingId FROM country_has_listing i LEFT JOIN country k ON k.id= i.countryId) p
 INNER JOIN listing s ON s.id = p.listingId AND s.rating>'" .$_POST["inputKaina"] ."'
WHERE p.name LIKE '" .$_POST["inputValue"] ."'";  */

$stack  = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $listing = new Listing();
        $listing->set_checkIn($row["checkIn"]);
        $listing->set_price($row["price"]);
        $listing->set_name($row["destinationName"]);
        array_push($stack, $listing);
    }
} else {
    echo json_encode("nulis");
}
$conn->close();
echo json_encode($stack);

?> 
