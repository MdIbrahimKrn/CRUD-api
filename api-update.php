<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Access-Control-Allow-Headers,Authorization,X-Requested-With' );

$data = json_decode( file_get_contents( 'php://input' ), true );

if ( !empty( $data['up-id'] ) && !empty( $data['up-name'] ) && !empty( $data['up-age'] ) && !empty( $data['up-city'] ) ) {
    $up_id = $data["up-id"];
    $up_name = $data["up-name"];
    $up_age = $data["up-age"];
    $up_city = $data["up-city"];
    include "config.php";
    $query = "UPDATE student SET Name = '{$up_name}',Age = '{$up_age}', City = '{$up_city}' WHERE ID = '{$up_id}' ;";

    if ( mysqli_query( $conn, $query ) ) {
        echo json_encode( ['message' => 'Student Record Update', 'status' => true] );
    } else {
        echo json_encode( ['message' => 'Student Record Not Update', 'status' => false] );
    }
} else {
    echo json_encode( ['message' => 'Fild Can\'t Empty', 'status' => false] );
}

?>
