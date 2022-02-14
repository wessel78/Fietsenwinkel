<?php
    class Database
    {
        private $host = DB_HOST;
        private $db_name = DB_NAME;
        private $username = DB_USER;
        private $password = DB_PASSWORD;
        private $conn;

        // connect database using PDO
        function connect_pdo()
        {
            try
            {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
                return $this->conn;
            }
            catch(PDOException $ex)
            {
                return "Connection Error -->> " . $ex->getMessage();
                $this->conn = null; // close connection in PDO
            }
        }

        function db_getData($query)
        {
            $db = $this->connect_pdo();
            $query = $db->prepare($query);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function db_insertData($query)
        {
            $db = $this->connect_pdo();
            $query = $db->prepare($query);
            if($query->execute())
            {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['lastInsertId'] = $db->lastInsertId();
                return $result;
            }
            else
            {
                return "Error: " . $query . "<br>" . $db->errorInfo();
            }
            return null;
        }
    }
?>
  
