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
$host = 'localhost';
$db   = 'travelog';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);
 
$orders=array("price","beforePrice","savings");
$key=array_search($_POST['SortIndividual'],$orders);
$order=$orders[$key];

$stmt = $pdo->prepare("SELECT s.*,p.destinationName,p.link FROM listing p INNER JOIN individual s ON p.id = s.indivId WHERE s.indivId
 LIKE :inputID AND s.price BETWEEN :priceFilter0 AND  :priceFilter1
  AND s.checkIn> :checkIn AND s.checkOut < :checkOut ORDER BY $order");

$stmt->execute([
    ':inputID' => $_POST["inputID"],
    ':priceFilter0' => $_POST["priceFilter0"],
    ':priceFilter1' => $_POST["priceFilter1"],
    ':checkIn' => $_POST["checkIn"],
    ':checkOut' => $_POST["checkOut"]]);
    
$stack  = array();
if ($stmt->rowCount() > 0) {
while ($row = $stmt->fetch()) {
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
echo json_encode($stack);

?> 