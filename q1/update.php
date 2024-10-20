<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM crud WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $hobbies = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : '';

    $sql = "UPDATE crud SET username='$username', email='$email', password='$password', gender='$gender', hobby='$hobbies' WHERE id=$id";

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
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
        </div>
        <div>
            <label for="">Gender</label>
            <input type="radio" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?>>Male
            <input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?>>Female
        </div>
        <div>
            <label for="">Hobbies</label>
            <select name="hobby[]" multiple>
                <option value="cricket" <?php if (strpos($row['hobby'], 'cricket') !== false) echo 'selected'; ?>>Cricket</option>
                <option value="hockey" <?php if (strpos($row['hobby'], 'hockey') !== false) echo 'selected'; ?>>Hockey</option>
                <option value="football" <?php if (strpos($row['hobby'], 'football') !== false) echo 'selected'; ?>>Football</option>
            </select>
        </div>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>