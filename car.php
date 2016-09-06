<?php
    class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($make_model, $price, $miles, $image)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;
    }

    function get_price()
    {
        return $this->price;
    }
    function get_make()
    {
        return $this->make_model;
    }
    function get_miles()
    {
        return $this->miles;
    }
    function get_image()
    {
        return $this->image;
    }
}

$porche = new Car("2014 Porche 911", 140000, 8700, "img/car1.jpg");
$ford = new Car("2011 Ford F450", 45000, 12000, "img/car2.jpg");
$lexus = new Car("2013 Lexus Whatchamacallit", 47000, 20000, "img/car3.jpg");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 28102, "img/car4.jpg");

$cars = array($porche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->get_price() < $_GET["price"] && $car->get_miles() < $_GET["miles"]) {
        array_push($cars_matching_search, $car);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <meta charset="utf-8">
        <title>Here In My Car...</title>
    </head>
    <body>
        <div class="container">
            <h1>Numan Motors</h1>
            <ul class="list-group">
                <li class="list-group-item active">Here in my car...</li>
                <?php
                    if ($cars_matching_search) {
                        foreach ($cars_matching_search as $car) {
                            echo "<li class='list-group-item'> " . $car->get_make() . " </li>";
                            echo "<ul class='list-group'>";
                                echo "<li class='list-group-item'> $" . $car->get_price() . " </li>";
                                echo "<li class='list-group-item'> Miles: " . $car->get_miles() . " </li>";
                                echo "<li class='list-group-item'><img src='" . $car->get_image() . "'></img></li>";
                            echo "</ul>";
                        }
                    } else {
                        echo "<h1>You are a choosy bastard. Ease up and try again.</h1>";
                    }
                ?>
            </ul>
        </div>
    </body>
</html>
