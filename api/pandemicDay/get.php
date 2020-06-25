<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/PandemicDay.php';

$database = new Database();
$db = $database->connect();

$pandemic_day = new PandemicDay($db);

$result = $pandemic_day->read();

$number_of_rows = $result->rowCount();

if ($number_of_rows > 0) {
    $pandemic_days_arr = array();
    $pandemic_days_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $pandemic_day_item = array(
            'country_name' => $Country_name
        );

        array_push($pandemic_days_arr['data'], $pandemic_day_item);
    }

    echo json_encode($pandemic_days_arr);
} else {
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}
