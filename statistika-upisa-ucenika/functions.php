<?php
include '../config.php';

// Function to display data from the view
function displayViewData() {
    include '../config.php';
    // Query to fetch data from the view
    $sql = "SELECT * FROM view_lista_upisa";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Broj Upisa Po Godini"
function displayProcedureResult() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL BrojUpisaPoGodini()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Raspodela Upisa Po Polu"
function displayPolProcedureResult() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL RaspodelaUpisaPoPolu()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Broj Upisa Po Upisnom Roku"
function displayUpisniRokProcedureResult() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL BrojUpisaPoUpisnomRoku()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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
