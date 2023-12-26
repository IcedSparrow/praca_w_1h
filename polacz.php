<?php
// Dane do połączenia z bazą danych
$servername = "localhost"; // Nazwa hosta
$username = "root"; // Nazwa użytkownika bazy danych
$password = ""; // Hasło użytkownika (puste w środowisku deweloperskim)
$dbname = "Formularz"; // Nazwa bazy danych

// Tworzymy połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzamy, czy połączenie z bazą danych zostało ustanowione
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Sprawdzamy, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Pobieramy dane z formularza
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    $numerTelefonu = $_POST["numer_telefonu"];

    // Tworzymy zapytanie SQL do dodania danych do tabeli
    $sql = "INSERT INTO DaneFormularza (Imie, Nazwisko, Email, NumerTelefonu) VALUES ('$imie', '$nazwisko', '$email', '$numerTelefonu')";

    // Wykonujemy zapytanie SQL
    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały dodane do bazy danych.";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

// Zamykamy połączenie z bazą danych
$conn->close();
?>
