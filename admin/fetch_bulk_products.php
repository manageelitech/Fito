<?php

//fetch.php

if(!empty($_FILES['bulk_csv']['name']))
{
    $file_data = fopen($_FILES['bulk_csv']['tmp_name'], 'r');
    $column = fgetcsv($file_data);
    while($row = fgetcsv($file_data))
    {
        $row_data[] = array(
            'slno'  => $row[0],
            'product_code'  => $row[1],
            'product_name'  => $row[2],
            'hsn'  => $row[3],
            'gst'  => $row[4],
            'mrp'  => $row[5],
            'dp'  => $row[6],
            'bv'  => $row[7],
            'category'  => $row[8],
            'sub_category'  => $row[9],
            'quantity'  => $row[10],
            'image'  => $row[11],
            'description'  => $row[12]
        );
//        print_r($column);
//        print_r($row);
//        return;
    }
    $output = array(
        'column'  => $column,
        'row_data'  => $row_data
    );

    echo json_encode($output);

}

?>