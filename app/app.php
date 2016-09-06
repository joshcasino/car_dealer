<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function() {

        return "<!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                <meta charset='utf-8'>
                <title>Catch a Ride!</title>
            </head>
            <body>
                <div class='container'>
                    <h1>Find Me a Car!</h1>
                    <form action='/results'>
                        <div class='form-group'>
                            <label for='price'>Enter Maximus Price:</label>
                            <input id='price' name='price' class='form-control' type='number'>
                        </div>
                        <div class='form-group'>
                            <label for='miles'>Enter Maximus Mileage:</label>
                            <input id='miles' name='miles' class='form-control' type='number'>
                        </div>
                        <button type='submit' class='btn btn-success'name='button'>SUBMIT!</button>
                    </form>
                </div>
            </body>
        </html>
        ";
    });

    $app->get("/results", function() {


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

        $car_list = "<li class='list-group-item active'>Here in my car...</li>";
        if ($cars_matching_search) {
            foreach ($cars_matching_search as $car) {
                $car_list = $car_list .
                "<li class='list-group-item'> " . $car->get_make() . " </li>" .
                "<ul class='list-group'>" .
                    "<li class='list-group-item'> $" . $car->get_price() . " </li>" .
                    "<li class='list-group-item'> Miles: " . $car->get_miles() . " </li>" .
                    "<li class='list-group-item'><img src='" . $car->get_image() . "'></img></li>";
            }
        } else {
            $car_list = "<h1>You are a choosy bastard. Ease up and try again.</h1>";
        }

        $results = "<!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                <meta charset='utf-8'>
                <title>Catch a Ride!</title>
            </head>
            <body>
                <div class='container'>
                <ul class='list-group'>" .
                    $car_list
                . "</ul>
                </div>
            </body>
        </html>";

        return $results;
    });

    return $app;
?>
