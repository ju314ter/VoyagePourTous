<?php 

function transformSQLDate($sql_date){

    $date = date_create($sql_date); //fonction PHP native
    return date_format($date, 'd/m/Y');

}

?>