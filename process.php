<?php
if(isset($_POST['new_task'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "to-do-list";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user input for security
    $task = mysqli_real_escape_string($conn, $_POST['new_task']);

    // Insert new task into the database
    $sql = "INSERT INTO activity_table(data) VALUES ('$task')";
    if (mysqli_query($conn, $sql)) {
       header("location: suceed.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
