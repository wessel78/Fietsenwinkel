<?php 
    class Login
    {
        function __construct()
        {
            $this->username = isset($_POST['userName']) ? $_POST['userName'] : null;
            $this->password = isset($_POST['password']) ? $_POST['password'] : null;       
        }

        public function login()
        {
            if($this->username && $this->password)
            {
                $user = $this->checkIfUserExist($this->username);
                $password_hash = $user[0]['password'];
                $user_permission = $user[0]['user_permission'];
                $user_id = $user[0]['user_id'];

                if($this->checkIfUserExist($this->username) == "false") return "incorrect-login";
                if($this->checkIfPasswordCorrect($this->password, $password_hash) == "false") return "incorrect-login";
                
                $_SESSION['login'] = "true";
                $_SESSION['user_id'] = $user_id;

                if($user_permission == 1) {$_SESSION['permission'] = "user";} elseif($user_permission == 2) {$_SESSION['permission'] = "admin";}
                return "success";
            }
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
            $query = $db->db_getData("SELECT * FROM users WHERE username = '$username' OR email = '$username'");

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