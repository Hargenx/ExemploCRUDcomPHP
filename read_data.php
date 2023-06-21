<?php
// SQL query to select data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Nome: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "Dados não encontrados";
}
?>
