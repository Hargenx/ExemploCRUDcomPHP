<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // SQL query to update data
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Dados atualizados com sucesso";
    } else {
        echo "Erro atualizado: " . mysqli_error($conn);
    }
}
?>
