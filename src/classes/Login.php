<?php 
    class Login
    {
        function __construct()
        {
            $this->username = isset($_POST['userName']) ? $_POST['userName'] : null;
            $this->password = isset($_POST['password']) ? $_POST['password'] : null;       
        }

        function checkIfPasswordCorrect($password, $password_hash)
        {
            if (password_verify($password, $password_hash))
            {
                return "true";
            }
            else
            {
                return "false";
            }
        }

        function checkIfUserExist($username)
        {
            $db = new Database;
            $query = $db->db_getData("SELECT * FROM gebruiker WHERE admin_uname = '$username'");

            if(count($query) > 0)
            {
                return $query;
            }
            else
            {
                return "false";
            }
        }
    }

?>