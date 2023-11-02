<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="js/kit.fontawesome.com_845fef67b3.js"></script>
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <title>Oscorp</title>
</head>

<body>
    <?php include('../public/navbar.php'); ?>

    <?php
    include '../source/config.php';

    if (isset($_GET['id'])) {
        $sdgIndex = $_GET['id'];


        $connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

  
        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if (is_numeric($SdgIndex) && $SdgIndex >= 0) {
            $query = "SELECT * FROM Sdg1 WHERE id = $SdgIndex";
            $result = $connection->query($query);

            if ($result) {
                if ($row = $result->fetch_assoc()) {
                    $single = [
                        "image" => $row["image"],
                        "image2" => $row["image2"],
                        "title" => $row["title"],
                        "sub" => $row["sub"],
                        "sub2" => $row["sub2"],
                        "info" => $row["info"],
                        "info2" => $row["info2"],
                    ];

                    if ($sdgIndex >= 0 && $sdgIndex <= 9) {
                        include "../views/information.php";
                    } else {
                        include "../views/information2.php";
                    }
                } else {
                    echo "SDG com o ID especificado não foi encontrado no banco de dados.";
                }
            } else {
                echo "Erro na consulta: " . $connection->error;
            }
        } else {
            echo "ID do SDG não é válido.";
        }
        $connection->close();
    } else {
        echo "ID do SDG não encontrado na URL.";
    }
    ?>

</body>