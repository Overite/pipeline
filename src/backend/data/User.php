<?php
include 'process.php';

class User
{
    public $sql;
    public $sql1;
    public $processQuery;
    public $execute;
    public $query;
    public $prepare;

    public function insert_user($a, $b)
    {
        $this->processQuery = new processQuery();
        $this->query = 'INSERT INTO admin (email,password)VALUES(?,?)';
        $this->prepare = $this->processQuery->query($this->query);
        $this->prepare->execute([$a, $b]);
        return $this->prepare;
    }
    public function select($email)
    {
        $this->processQuery = new processQuery();
        $this->query = "SELECT * FROM admin WHERE email='$email'";
        $this->prepare = $this->processQuery->query($this->query);
        $this->prepare->execute();
        return $this->prepare;
    }
    public function login_user()
    {
        $this->processQuery = new processQuery();
        $this->query = 'SELECT * FROM admin WHERE email=?';
        $this->execute = $this->processQuery->query($this->query);
        return $this->execute;
    }

    public function hash($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
}
