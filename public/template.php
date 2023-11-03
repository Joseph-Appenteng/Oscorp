<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="/js/icons.js"></script>
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
            die("Fout bij het verbinden met de database: " . $connection->connect_error);
        }

        if (is_numeric($sdgIndex) && $sdgIndex >= 0) {
            $query = "SELECT * FROM Sdg WHERE id = $sdgIndex";
            $result = $connection->query($query);

            if ($result) {
                if ($row = $result->fetch_assoc()) {
                    $single = [
                        "image" => $row["image"],
                        "image2" => $row["image2"],
                        "title" => $row["Title"],
                        "sub" => $row["sub"],
                        "sub2" => $row["sub2"],
                        "info" => $row["info"],
                        "info2" => $row["info2"],
                    ];

                    if ($sdgIndex >= 0 && $sdgIndex <= 9) {
                        include "../views/temp1.php";
                    } else {
                        include "../views/temp2.php";
                    }
                } else {
                    echo "SDG met het opgegeven ID is niet gevonden in de database.";
                }
            } else {
                echo "Queryfout: " . $connection->error;
            }
        } else {
            echo "SDG-ID is niet geldig.";
        }
        $connection->close();
    } else {
        echo "SDG-ID niet gevonden in URL.";
    }
    ?>
    <?php include('../public/footer.php'); ?>

</body>