<?php
    include("connection.php");

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
        $hobbies = isset($_POST["hobby"]) ? implode(", ", $_POST["hobby"]) : ''; 

        // Assuming 'crud' table has fields: id (auto-increment), username, email, password, gender, hobby
        $sql = "INSERT INTO crud (username, email, password, gender, hobby) 
                VALUES ('$username', '$email', '$password', '$gender', '$hobbies')";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: display.php");
        } else {
            echo "There's some error while inserting records: " . mysqli_error($conn);
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User Registration</h1>
    <form action="" method="post">
    <div>
        <label for="">username</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="">email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="">password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="">Gender</label>
        <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="female">female
    </div>
    <div>
        <label for="">Hobbies</label>
        
        <select name="hobby[]" multiple id="">
            <option value="cricket">Cricket</option>
            <option value="hockey">Hockey</option>
            <option value="football">Football</option>
        </select>
    </div>

    <input type="submit" name="submit" value="submit">Submit

    </form>
</body>
</html>