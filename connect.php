<?php
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];

    // Redirecting function
    function redirect(){
        header('Location: index.html');
    }

    // Database connection
    $conn = new mysqli('localhost','root','','form');

    if(!$conn){
        // Database connection error
		echo "Connection Failed : " . mysqli_connect_error();

	} else {
        // Database connected successfully

        // Create sql
        $sql = "INSERT INTO details(email, firstName, lastName, address) values('$email', '$firstName', '$lastName', '$address')";

        if(mysqli_query($conn, $sql)){
            // Success
            echo "Details submitted successfully";

            // Redirecting to index.html
            redirect();

        }else{
            // Error
            echo "Query error : " . mysqli_error($conn);
        }

        // Closing the connection
		mysqli_close($conn);
    }
?>