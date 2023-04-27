
<?php
include('./connection.php');

// Validate form input
if (isset($_POST["submit"])) {
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["pass"]);
	

    // Check for empty fields
    if (empty($name) || empty($email) ) {
        echo "Please fill in all fields.";
    } else {
        // Insert form data into database
        $sql = "INSERT INTO sign_in ( Email, passwo) VALUES ('$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "Form submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}
?>    
