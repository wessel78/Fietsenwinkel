<?php
class Register
{
    public function __construct()
    {
        $this->firstname = isset($_POST['firstName']) ? $_POST['firstName'] : null;
        $this->lastname = isset($_POST['lastName']) ? $_POST['lastName'] : null;
        $this->email = isset($_POST['email']) ? $_POST['email'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
        $this->password1 = isset($_POST['password1']) ? $_POST['password1'] : null;
        $this->password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
    }

    public function register()
    {
        //Check if input is gevuld
        if($this->firstname && $this->lastname && $this->email && $this->username && $this->password1 && $this->password2)
        {
            $db = new Database;
            if ($this->checkIfUserExist() === "true") return 'user-exist';
            $hashed_password = $this->hashPassword();
            if($hashed_password === "false") return 'password-not-equal';
            $register_user = $db->db_insertData("INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$this->firstname', '$this->lastname', '$this->username', '$this->email', '$hashed_password')");
            return "success";
        }
        else
        {
            return "input-not-filled";
        }
    }

    private function checkIfUserExist()
    {
        $db = new Database;
        $query = $db->db_getData("SELECT * FROM users WHERE email = '$this->email' OR username = '$this->username'");
        if(count($query) <= 0) return "false";
        return "true";
    }

    private function hashPassword()
    {
        if($this->password1 === $this->password2)
        {
            return password_hash($this->password1, PASSWORD_DEFAULT);
        }
        return "false";
    }

}
