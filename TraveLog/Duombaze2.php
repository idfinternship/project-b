<?php
class Listing
{
    // Properties
    public $checkIn;
    public $price;
    public $name;
    public $checkOut;
    public $beforePrice;
    public $savings;
    public $listingID;
    public $oDate;

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
    function set_checkOut($checkOut)
    {
        $this->checkOut = $checkOut;
    }
    function set_beforePrice($beforePrice)
    {
        $this->beforePrice = $beforePrice;
    }
    function set_savings($savings)
    {
        $this->savings = $savings;
    }
    function set_listingID($listingID)
    {
        $this->listingID = $listingID;
    }
    function set_oDate($oDate)
    {
        $this->oDate = $oDate;
    }
}
require('config/config.php');
require('config/db.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT s.*,p.destinationName,p.link FROM listing p INNER JOIN individual s ON p.id = s.indivId WHERE s.indivId
 LIKE '".$_POST["inputID"] ."' AND s.price BETWEEN'" . $_POST["priceFilter0"] ."' AND '" .$_POST["priceFilter1"] ."'";
//AND s.checkIn LIKE'" . $_POST["checkIn"]."'";// AND s.checkOut LIKE '" .$_POST["checkOut"] ."'";
// PDO
$stack  = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $listing = new Listing();
        $listing->set_checkIn($row["checkIn"]);
        $listing->set_checkOut($row["checkOut"]);
        $listing->set_price($row["price"]);
        $listing->set_beforePrice($row["beforePrice"]);
        $listing->set_savings($row["savings"]);
        $listing->set_name($row["destinationName"]);
        $listing->set_link($row["link"]);
        $listing->set_listingID($row["listingID"]);
        $listing->set_oDate($row["oDate"]);
        array_push($stack, $listing);
    }
} else {
    echo json_encode("nulis");
}
$conn->close();
echo json_encode($stack);

?> 