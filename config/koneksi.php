<?php
class Database {
    private static $pdo = null;
    private static $host = 'localhost';
    private static $dbname = 'survei_kepuasan_masyarakat';
    private static $username = 'root';
    private static $password = '';

    private function __construct() {

    }

    public static function getConnection() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>