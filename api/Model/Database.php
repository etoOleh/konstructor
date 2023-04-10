<?php
declare(strict_types=1);

namespace Model;

require_once "../inc/config.php";


use Con;
use \PDO;
use PDOException;


/**
 * Класс базы данных
 *
 */
class Database
{

    /**
     * @var string|null
     */
    private ?string $hostname;         // MySQL Hostname
    /**
     * @var string|null
     */
    private string $username;         // MySQL Username
    /**
     * @var string|null
     */
    private string $password;         // MySQL Password
    /**
     * @var string|null
     */
    private string $database;         // MySQL Database

    /**
     * @var
     */
    public $pdo;

    /**
     * Конструктор
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     *
     * Функция подлкючения к базе данных
     *
     * @param $host
     * @param $db
     * @param $user
     * @param $pass
     * @return PDO
     */
    public function Connect()
    {

//        $host = "127.0.0.1", $db = "api_test", $user = "root", $pass = "rootroot"

        $this->hostname = DB_HOST; // MySQL Hostname
        $this->username = DB_USER; // MySQL Username
        $this->password = DB_PASS; // MySQL Password
        $this->database = DB_NAME;   // MySQL Database

        try {
            $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->database", "$this->username", "$this->password");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connection fail:" . $e->getMessage();

        }
        return $this->pdo;
    }


    # Func: __destruct()
    # Desc: Disconnects from the DB
//    public function __destruct()
//    {
//        // Disconnect from DB
//        $this->pdo = null;
////        echo 'Successfully disconnected from the database!';
//    }



    /**
     * Функция вывода указанных значений из класса
     *
     * @param $query
     * @return mixed
     */
    public function select($query)
    {
        return $this->pdo->prepare($query);
    }

}