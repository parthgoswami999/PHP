<?php
include("connection.php");

$sql = "SELECT * FROM crud";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
</head>
<body>
    <h1>Users List</h1>
    <table border="1">
        <thead>
            <tr>
              <th>Blog title</th>
              <th>Content</th>
              <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['blogtitle']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>