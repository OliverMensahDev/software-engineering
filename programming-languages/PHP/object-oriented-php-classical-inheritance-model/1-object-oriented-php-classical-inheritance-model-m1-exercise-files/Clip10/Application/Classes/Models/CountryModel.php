<?php
/**
 * Country Model Class
 */
class CountryModel {
    protected $db;

    /**
     * @param $pdo
     */
    public function __construct($pdo){
        $this->db = $pdo;
    }

    /**
     * @return mixed
     */
    public function getCountries(){
        $sql = 'SELECT `name` FROM country';
        try{
            $stmt = $this->db->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
            sort($results);
            return $results;
        }catch(PDOException $e){
            //Log error ...
            echo $e->getMessage();
        }
    }
}