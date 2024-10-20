<?php
    include("connection.php");

    if(isset($_POST["submit"])){
        $blogtitle = $_POST["blogtitle"];
        $content = $_POST["content"];
        $author = $_POST["author"];
       
        $sql = "insert into crud (`blogtitle`, `content`, `author`) values('$blogtitle','$content','$author');";

        $result = mysqli_query($conn,$sql);

        if($result){
            header ("location:display.php");
        }else{
            echo "there's someerror while inserting records";
        }


    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
</head>
<body>
    <h1>Blog Management</h1>
    
    <form action="" method="post">
        <div>
            <label for="blogtitle">Blog Title</label>
            <input type="text" name="blogtitle" required>
        </div>
        
        <div>
            <label for="content">Content</label>
            <textarea name="content" rows="5" cols="30" required></textarea>
        </div>

        <div>
            <label for="author">Created By</label>
            <input type="text" name="author" required>
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>
</html>
