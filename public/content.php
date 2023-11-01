<?php
include '../source/config.php';

$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($connection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
}

$query = "SELECT * FROM Sdg ORDER BY RAND() LIMIT 3";
$result = $connection->query($query);
?>

<section class="onzesdgs">
    <div class="sdgtekst">Welkom bij de SDG's
    <p>De SDG-game is een online spel over de 17 duurzame ontwikkelingsdoelen. Dit online spel daagt studenten
        uit zich te verdiepen in de SDG’s en om challenges uit te voeren zodat zij kennis maken met alle SDG’s
        volgens de Nederlandse maatstaven.</p>
    </div>
    <div id="results">
        <?php
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $single = [
                    "image" => $row["image2"],
                    "title" => $row["Title"],
                ];
        ?>
                <a href="template.php?id=<?= $row["id"] ?>">
                    <?php include '../views/card.php'; ?>
                </a>
        <?php
            }
        } else {
            echo "Erro na consulta: " . $connection->error;
        }
        $connection->close();
        ?>
    </div>
    <div> <a class="cta-button" href="https://sdggame.nl/">Start Game! <i class="fas fa-person-breastfeeding"></i></a></div>
</section>
