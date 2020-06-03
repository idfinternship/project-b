<?php
class Country
{
    // Properties
    public $name;
    public $duration;
    public $rating;
    public $ID;
    public $image;
 
   
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
    function set_image($image)
    {
        $this->image = $image;
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
 
$orders=array("destinationName","duration","rating");
$key=array_search($_POST['Sort'],$orders);
$order=$orders[$key];
 
$stmt = $pdo->prepare("SELECT s.* FROM (SELECT k.name,i.listingId FROM country_has_listing i LEFT JOIN country k ON k.id= i.countryId) p
 INNER JOIN listing s ON s.id = p.listingId AND s.rating BETWEEN :reitingas AND :reitingas1 AND s.duration
BETWEEN :DurationFilter0 AND :DurationFilter1
 WHERE p.name LIKE :inputValue ORDER BY $order");
 
$stmt->execute([
':reitingas' => $_POST["reitingas"],
':reitingas1' => $_POST["reitingas1"],
':DurationFilter0' => $_POST["DurationFilter0"],
':DurationFilter1' => $_POST["DurationFilter1"],
':inputValue' => $_POST["inputValue"]]);
 
$stack  = array();
 
while ($row = $stmt->fetch())
{
    $country = new Country();
    $country->set_name($row["destinationName"]);
    $country->set_duration($row["duration"]);
    $country->set_rating($row["rating"]);
    $country->set_ID($row["id"]);
    $country->set_image($row["imageLink"]);
 
    array_push($stack, $country);
}
 
echo json_encode($stack);
?>