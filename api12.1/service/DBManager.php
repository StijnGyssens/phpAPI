<?php

class DBManager
{
    private $configuration;
    private $conn;
    private $logger;

    public function __construct(array $configuration,$logger){
        $this->configuration=$configuration;
        $this->logger=$logger;
    }

    /**
     * @return PDO
     */
    public function CreateConnection()
    {
        // Create and check connection
        try {
            $this->conn = new PDO(
                "mysql:host=".$this->configuration['servername'].";dbname=".$this->configuration['dbname'],
                $this->configuration['username'],
                $this->configuration['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }

    /**
     * @param $sql
     * @return array
     */
    public function GetData( $sql )
    {
        $this->logger->Log($sql);
        $this->CreateConnection();

        //define and execute query
        $result = $this->conn->query( $sql );

        //show result (if there is any)
        if ( $result->rowCount() > 0 )
        {
            //$rows = $result->fetchAll(PDO::FETCH_ASSOC); //geeft array zoals ['lan_id'] => 1, ...
            //$rows = $result->fetchAll(PDO::FETCH_NUM); //geeft array zoals [0] => 1, ...
            $rows = $result->fetchAll(PDO::FETCH_BOTH); //geeft array zoals [0] => 1, ['lan_id'] => 1, ...
            //var_dump($rows);
            return $rows;
        }
        else
        {
            return [];
        }

    }

    /**
     * @param $sql
     * @return mixed
     */
    public function ExecuteSQL( $sql )
    {
        $this->logger->Log($sql);
        $this->CreateConnection();

        //define and execute query
        $result = $this->conn->query( $sql );

        return $result;
    }

}