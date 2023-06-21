<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // SQL query to delete data
    $sql = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Dados apagados com sucesso";
    } else {
        echo "Erro ao deletar: " . mysqli_error($conn);
    }
}
?>
