<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example</title>
</head>
<body>
    <h2>PHP CRUD Example</h2>

    <!-- Create -->
    <h3>Create User</h3>
    <form method="POST" action="index.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Create">
    </form>

    <?php
    // Include database connection code here (from Step 1)

    // Create operation (Step 2)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "Record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <!-- Read -->
    <h3>Users</h3>
    <?php
    // Read operation (Step 3)
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "No records found";
    }
    ?>

    <!-- Update -->
    <h3>Update User</h3>
    <form method="POST" action="index.php">
        <label for="id">ID:</label>
        <input type="text" name="id" required><br><br>
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Update">
    </form>

    <?php
    // Update operation (Step 4)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    ?>

    <!-- Delete -->
    <h3>Delete User</h3>
    <form method="POST" action="index.php">
        <label for="id">ID:</label>
        <input type="text" name="id" required><br><br>
        <input type="submit" value="Delete">
    </form>

    <?php
    // Delete operation (Step 5)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        $sql = "DELETE FROM users WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>