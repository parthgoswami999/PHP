<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM crud WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $blogtitle = $_POST["blogtitle"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $sql = "UPDATE crud SET blogtitle='$blogtitle', content='$content', author='$author' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: display.php");
    } else {
        echo "Failed to update record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User Information</h1>
    <form action="" method="POST">
        <div>
            <label for="">Blog title</label>
            <input type="text" name="blogtitle" value="<?php echo $row['blogtitle']; ?>" required>
        </div>
        <div>
            <label for="">Content</label>
            <textarea name="content" rows="5" cols="30" required><?php echo $row['content']; ?></textarea>
        </div>
        <div>
            <label for="">Author</label>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
        </div>
       
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>