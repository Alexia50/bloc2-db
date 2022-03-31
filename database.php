<?php
class Database
{

    private PDO $pdo;

        /**
    * Establish a connection to the database
    * @param string $db the db connection
    * @param string $user the db user
    * @param string $password the db password
    * @return PDO the pdo instance
    */
    public function connect(string $db,string $user='root',string $password=''):PDO
    {
    $this->pdo = new PDO() (dsn:"mysql:host=localhost;dbname=$db",$user, $password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    return $this->pdo;
    }
    public function deleteFrom(string $table,string $condition){
    $sql="DELETE FROM '$table' WHERE $condition";
    return $this->pdo->exec($sql);
    }
    public function insert( String $tableName,array $fieldValues):int{

    }
    public function update(String $tableName, array $fieldValues,array $keyValues):int{

    }
    public function query(String $sql):PDOStatement{

    }
}
?>