<?php
use PHPUnit\Framework\TestCase;

// Wczytaj funkcje z DBConn.php
require_once __DIR__ . '/../Components/DBConn.php';

class DBConnTest extends TestCase
{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $password = '';
    private $db = 'hurtownia_art_spoz';

    // Test połączenia
    public function testOpenConSuccessfulConnection()
    {
        $conn = OpenCon();

        // Sprawdź, czy połączenie jest instancją mysqli
        $this->assertInstanceOf(mysqli::class, $conn);

        // Sprawdź, czy nie ma błędów połączenia
        $this->assertFalse($conn->connect_error);

        // Zamknij połączenie
        CloseConnection($conn);
    }

    // Test błędnego połączenia (przykład)
    public function testOpenConFailedConnection()
    {
        // Ustaw błędne dane do połączenia
        $this->dbhost = 'invalid_host';
        $this->dbuser = 'invalid_user';
        $this->password = 'invalid_password';
        $this->db = 'invalid_db';

        $conn = OpenCon();

        // Sprawdź, czy połączenie nie jest prawidłowe
        $this->assertTrue($conn->connect_error);

        // Zamknij połączenie
        CloseConnection($conn);
    }
}
