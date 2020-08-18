<?php
$submit = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password="";

    // create a datbase connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection success
    if(!$con){
        die("connection to this database failed due to ".
        mysqli_connect_error());

    }

    // echo " Success Connecting to the db";

    // collect post status
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $desc = $_POST['desc'];


    $sql = "INSERT INTO `US_trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)  VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    // execute the query
    if($con->query($sql) == TRUE){
        // echo "Successfully Inserted";

        // flag for successfull insertion
        $submit = TRUE;
    }else{
        echo "ERROR: $sql <br> $con->error";
    }


    // close te database
    $con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel from</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <img class= bg src="bg.png" alt="SMIT">  
    <div class="container">
        <h1>Welcome to SMIT US Trip Form</h1>
        <p>Enter Your Details and Submit this  to Confirm Your Participation in the Trip</p>
        <?php
        if($submit){
        echo "<p class='msg'>Thanks For Submitting This Form Happy to See You Joining us for the US trip</p>";
        }
        ?>
        
        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30"  rows="10" placeholder="Enter furthur information">

            </textarea>
            <button class="btn">Submit</button>    


            
        </form>
    
    </div>
    <script src="index.js"></script>
    
</body>
</html>