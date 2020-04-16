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

    function set_link($link)
    {
        $this->link = $link;
    }
}
$conn = mysqli_connect("localhost", "root", "password", "travelog");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT s.*,p.destinationName,p.link FROM listing p INNER JOIN individual s ON p.id = s.indivId WHERE s.indivId LIKE'".$_POST["inputID"] ."'";

$stack  = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $listing = new Listing();
        $listing->set_checkIn($row["checkIn"]);
        $listing->set_price($row["price"]);
        $listing->set_name($row["destinationName"]);
        $listing->set_link($row["link"]);
        array_push($stack, $listing);
    }
} else {
    echo json_encode("nulis");
}
$conn->close();
echo json_encode($stack);

?> 
