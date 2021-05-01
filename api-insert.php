<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Access-Control-Allow-Headers,Authorization,X-Requested-With' );

$data = json_decode( file_get_contents( 'php://input' ), true );

if ( !empty( $data['sname'] ) && !empty( $data['sage'] ) && !empty( $data['scity'] ) ) {
    $name = $data['sname'];
    $age = $data['sage'];
    $city = $data['scity'];
    include "config.php";
    $query = "INSERT INTO student(Name,Age,City) VALUES ('{$name}','{$age}','{$city}') ;";

    if ( mysqli_query( $conn, $query ) ) {
        echo json_encode( ['message' => 'Student Record Inserted', 'status' => true] );
    } else {
        echo json_encode( ['message' => 'Student Record Not Inserted', 'status' => false] );
    }
} else {
    echo json_encode( ['message' => 'Fild Can\'t Empty', 'status' => false] );
}

?>
