<?php

namespace App\Models\Manager;
use App\Core\Database;
use App\Models\Entity\User;


class UserManager{
    private Database $db;

    public function __construct()
    {
        //$this->db=new PDO("mysql:host=localhost;dbname=hoteldanton;charset=utf8;port=8889", "root","root");
        $this->db=new Database();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function insertUser(User $user): bool
    {
        $stmt=$this->db->prepare("INSERT INTO users (firstname,email,password_hash,role,lastname,age,username,country) VALUES (?,?,?,?,?,?,?,?)");
        $register_valid=$stmt->execute([$user->getFirstname(), $user->getEmail(), $user->getPassword(),$user->getRole(), $user->getLastname(), $user->getAge(), $user->getUsername(), $user->getCountry()]);
        return $register_valid; 
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getUserByEmail(string $email): mixed
    {
        $stmt=$this->db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(["email"=>$email]);
        $user=$stmt->fetch();
        return $user;
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function verifyPassword(string $email, string $password): bool
    {
        //$stmt=$this->db->prepare("SELECT * FROM users WHERE email=:email");
        //$stmt->execute(["email"=>$email]);
        //$user=$stmt->fetch();
        $user=$this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password_hash'])){
            return true;
        }
        return false;
    }









}