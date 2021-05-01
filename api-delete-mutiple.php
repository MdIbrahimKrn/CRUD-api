<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Access-Control-Allow-Headers,Authorization,X-Requested-With' );
include "config.php";

$mdid = mysqli_real_escape_string( $conn, file_get_contents( 'php://input' ) );
if ( !empty( $mdid ) ) {
    $query = "DELETE FROM student WHERE ID IN($mdid);";
    if ( mysqli_query( $conn, $query ) ) {
        echo json_encode( ['message' => 'Data Delete Successful', 'status' => true] );
    } else {
        echo json_encode( ['message' => 'Data Not delete' . mysqli_error( $conn ), 'status' => false] );
    }
} else {
    echo json_encode( ['message' => "Data Not Selected", 'status' => false] );

}

?>
