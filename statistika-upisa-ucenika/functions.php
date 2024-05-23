<?php
include '../config.php';

function displayViewData() {
    include '../config.php';

    $sql = "SELECT * FROM view_lista_upisa";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['JMBG'] . "</td>";
            echo "<td>" . $row['Ime I Prezime'] . "</td>";
            echo "<td>" . $row['Pol'] . "</td>";
            echo "<td>" . $row['Generacija'] . "</td>";
            echo "<td>" . $row['Smer'] . "</td>";
            echo "<td>" . $row['Odeljenje'] . "</td>";
            echo "<td>" . $row['Godina Upisa'] . "</td>";
            echo "<td>" . $row['Upisni Rok'] . "</td>";
            echo "<td>" . $row['Upisani Fakultet'] . "</td>";
            echo "<td>" . $row['Smer Fakulteta'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No data found</td></tr>";
    }
}

function displayProcedureResult() {
    include '../config.php';

    $sql = "CALL BrojUpisaPoGodini()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Godina'] . "</td>";
            echo "<td>" . $row['Broj Upisa'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
}

function displayPolProcedureResult() {
    include '../config.php';

    $sql = "CALL RaspodelaUpisaPoPolu()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Pol'] . "</td>";
            echo "<td>" . $row['Broj_upisa'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
}


function displayUpisniRokProcedureResult() {
    include '../config.php';

    $sql = "CALL BrojUpisaPoUpisnomRoku()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Naziv_upisnog_roka'] . "</td>";
            echo "<td>" . $row['Broj_upisa'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
}

?>
