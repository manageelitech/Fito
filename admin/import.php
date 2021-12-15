<?php

//import.php

if(isset($_POST["pcode"]))
{
    $connect = new PDO("mysql:host=localhost; dbname=fitohm", "root", "");

    session_start();

    $file_data = $_SESSION['file_data'];

    unset($_SESSION['file_data']);

    foreach($file_data as $row)
    {
        $data[] = '("'.$row[$_POST["pcode"]].'", "'.$row[$_POST["pname"]].'", "'.$row[$_POST["hsn"]].'", "'.$row[$_POST["mrp"]].'", "'.$row[$_POST["dpp"]].'", "'.$row[$_POST["bv"]].'", "'.$row[$_POST["gst"]].'", "'.$row[$_POST["qty"]].'", "'.$row[$_POST["catname"]].'", "'.$row[$_POST["subcat"]].'", "'.$row[$_POST["imgname"]].'")';
    }

    if(isset($data))
    {
        $query = "
  INSERT INTO products
  (`product_code`, `product_name`, `hsncode`, `mrp`, `dp`, `bv`, `gst`, `product_quantity`, `category`, `sub_category`, `product_image`) 
  VALUES ".implode(",", $data)."
  ";

        $statement = $connect->prepare($query);

        if($statement->execute())
        {
            echo 'Data Imported Successfully';
        }
        else{
            echo $query;
        }
    }
}



?>