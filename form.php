<?php 
    $formdata = explode('&', $_POST['data']);
     parse_str( $_POST['data'], $values);

     // connecting to database

     $server =  'localhost' ;
     $username = 'dominiqueusername';
     $password = '092516';
     $dbname = 'registration';

     $connection = mysqli_connect($server,$username,$password,$dbname);

     if (!$connection){
         echo "problem connecting";
     } 
     else {
         echo "connected successfully, ";
     }

    $encryptedPassword = password_hash($values['password'],PASSWORD_DEFAULT); 

    $sql = "Insert into userinfo (firstname,lastname,email,password,skills,phone,gender)
            VALUES('" 
            .$values['firstname'] . "', '" 
            .$values['lastname']  . "', '" 
            .$values['email']     . "', '" 
            .$encryptedPassword  . "', '"
            .$values['skills']  . "', '" 
            .$values['phone']  . "', '" 
            .$values['gender']    . "') ;";

    $query = mysqli_query($connection, $sql);
    if ($query){
        echo "1 row inserted";
    } else {
        echo "mysql_query error - cound't insert to the signup table";
    }
?>