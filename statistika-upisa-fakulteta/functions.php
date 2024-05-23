<?php
include '../config.php';

function displayViewListaUpisaPoFakultetu() {
    include '../config.php';

    $sql = "SELECT * FROM view_lista_upisa_po_fakultetu";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID Fakulteta'] . "</td>";
            echo "<td>" . $row['Fakultet'] . "</td>";
            echo "<td>" . $row['Smer Fakulteta'] . "</td>";
            echo "<td>" . $row['Generacija'] . "</td>";
            echo "<td>" . $row['Smer'] . "</td>";
            echo "<td>" . $row['Broj Upisa'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found</td></tr>";
    }
}

function displayPopularnostSmerova() {
    include '../config.php';

    $sql = "CALL PopularnostSmerova()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Fakultet'] . "</td>";
            echo "<td>" . $row['Naziv_smera'] . "</td>";
            echo "<td>" . $row['Broj_upisa'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
}


function displayProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet() {
    include '../config.php';

    $sql = "CALL ProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Naziv_fakulteta'] . "</td>";
            echo "<td>" . $row['Prosecan_broj_studenata'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
}

function displayFakultetiSaNajvecimBrojemUpisanihStudenata() {
    include '../config.php';

    $sql = "CALL FakultetiSaNajvecimBrojemUpisanihStudenata()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Naziv_fakulteta'] . "</td>";
            echo "<td>" . $row['Broj_studenata'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
}

function displayBrojUpisanihStudenataNaSvakomFakultetuPoPolu() {
    include '../config.php';

    $sql = "CALL BrojUpisanihStudenataNaSvakomFakultetuPoPolu()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Naziv_fakulteta'] . "</td>";
            echo "<td>" . $row['Pol'] . "</td>";
            echo "<td>" . $row['Broj_studenata'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
}

?>
