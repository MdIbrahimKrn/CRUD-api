<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: GET' );
header( 'Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Access-Control-Allow-Headers,Authorization,X-Requested-With' );

if ( isset( $_GET['did'] ) ) {
    $did = $_GET['did'];
    include "config.php";
    $query = "DELETE FROM student WHERE ID = {$did};";
    if ( mysqli_query( $conn, $query ) ) {
        echo json_encode( ['message' => 'Data Delete Successful', 'status' => true] );
    } else {
        echo json_encode( ['message' => 'Data Not delete', 'status' => false] );
    }
}

?>
