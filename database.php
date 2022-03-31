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
        $this->pdo = new PDO ("mysql:host=localhost;dbname=$db",$user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }
    public function deleteFrom(string $table,string $condition){
        $sql="DELETE FROM '$table' WHERE $condition";
        return $this->pdo->exec($sql);
    }

    /**
     * Adds a new row in tableName
     * @param String $tableName The table name
     * @param array $fieldValues An associative array of field names and values
     * i.e. ['name' =>'Smith','age',=>20,'active'=>true]
     * @return int
     */

    public function insert( String $tableName,array $fieldValues):int{
        $fieldNamesStr='';
        $fieldValuesStr='';
        foreach ($fieldValues as $fieldName=>$fieldValue){
            $fieldNamesStr.="`$fieldName`,";
            $fieldValuesStr.="`$fieldValue`,";
        }
        $fieldNamesStr=rtrim($fieldNamesStr,',');
        $fieldValuesStr=rtrim($fieldValuesStr,',');
        $sql="INSERT INTO `$tableName`($fieldNamesStr) VALUES ($fieldValuesStr)";
        this->pdo->exec($sql);
        return $this->pdo->LastInsertID();
    }

    /**
     * Updates a row in $tableName.
     * @param String $tableName The table name
     * @param array $fieldValues The new field values
     * @param array $keyValues La valeur(s) de(s) champ(s) clé(s)
     * @return int
     */
    public function update(String $tableName, array $fieldValues,array $keyValues):int{
        return $this->pdo->exec($sql);
    }
    public function query(String $sql):PDOStatement{
        return $this->pdo->query($sql);
    }
}
