<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: * ' );
include "config.php";

$src = mysqli_real_escape_string( $conn, $_GET["search"] );
$query = "SELECT * FROM student WHERE Name LIKE '%$src%' ORDER BY ID DESC ;";
$result = mysqli_query( $conn, $query );
if ( $result ) {

    if ( mysqli_num_rows( $result ) > 0 ) {
        $rows = mysqli_fetch_all( $result, MYSQLI_ASSOC );
        $output = json_encode( $rows );
        echo $output;
    } else {
        echo json_encode( ["massage" => "No record Found.", "status" => false] );
    }
} else {
    echo json_encode( ["massage" => "Query fild", "status" => false] );

}

?>
