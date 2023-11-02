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
    <div> <a class="cta-button" href="https://sdggame.nl/">Start Game! <i class="fas fa-person-breastfeeding"></i></a>
    </div>


</section>
<div id="content">
    <h3 class="h3">Over Ons</h3>
    <p>De Sustainable Development Goals (SDG’s), zijn zeventien doelen om van de wereld een betere plek te maken in
        2030. Ze zijn een mondiaal kompas voor uitdagingen als armoede, onderwijs en de klimaatcrisis. SDG Nederland
        is het netwerk van iedereen die in ons land aan de doelen wil bijdragen.
        In de wereld van vandaag staan we voor grote uitdagingen: armoede, honger, ongelijkheid, klimaatverandering en
        de biodiversiteitscrisis zijn slechts enkele van de problemen die we dringend moeten aanpakken. Grote
        uitdagingen vereisen gedurfde actie om ze te overwinnen, en dat is waar de Sustainable Development Goals om de
        hoek komen kijken. Ze zijn ontwikkeld om tegen 2030 een groenere, eerlijkere en betere wereld te bouwen, en we
        hebben allemaal een rol bij het bereiken ervan.

        Met deze doelen willen we in 2030 een duurzame wereld voor iedereen bereiken, waarin niemand wordt
        buitengesloten. In 2015 hebben alle 193 landen die lid zijn van de Verenigde Naties (VN) de Sustainable
        Development Goals aangenomen. De doelen gelden voor alle landen en voor alle mensen. </p>
</div>