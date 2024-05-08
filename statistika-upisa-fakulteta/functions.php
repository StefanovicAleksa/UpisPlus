<?php
include '../config.php';

// Function to display data from the view view_lista_upisa_po_fakultetu
function displayViewListaUpisaPoFakultetu() {
    include '../config.php';
    // Query to fetch data from the view
    $sql = "SELECT * FROM view_lista_upisa_po_fakultetu";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Popularnost Smerova"
function displayPopularnostSmerova() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL PopularnostSmerova()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Prosecan Broj Upisanih Studenata Po Godini Za Svaki Fakultet"
function displayProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL ProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Fakulteti Sa Najvećim Brojem Upisanih Studenata"
function displayFakultetiSaNajvecimBrojemUpisanihStudenata() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL FakultetiSaNajvecimBrojemUpisanihStudenata()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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

// Function to display the result of the stored procedure "Broj Upisanih Studenata Na Svakom Fakultetu Po Polu"
function displayBrojUpisanihStudenataNaSvakomFakultetuPoPolu() {
    include '../config.php';
    // Query to call the stored procedure
    $sql = "CALL BrojUpisanihStudenataNaSvakomFakultetuPoPolu()";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
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
