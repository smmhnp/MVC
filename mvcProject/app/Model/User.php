<?php

class User {
    private $db;

    function __construct (){
        $this -> db = new Database;
    }

    // find user by email
    function FindUserByEmail ($email){
        $this -> db -> query('SELECT * FROM `users` WHERE email = :email');
        $this -> db -> bind('email', $email);                                                               // Bidn parameter
        $this -> db -> fetch();                                                                             // Execute 

        if ($this -> db -> RowCount() > 0){
            return true;                                                                                    // Check row (if find row -> find email and email is repetitive)
        }
        return false;
    }

    function GetUserById ($id){
        $this -> db -> query ('SELECT * FROM users WHERE id = :id');
        $this -> db -> bind(':id', $id);
        return $this -> db -> fetch();
    }

    // register User
    function register ($data){                  
        $this -> db -> query ('
            INSERT INTO `users` (name, email, password)
            VALUES (:name, :email, :password)
        ');

        $this -> db -> bind (':name', $data['name']);
        $this -> db -> bind (':email', $data['email']);
        $this -> db -> bind (':password', $data['password']);

        if ($this -> db -> execute()){
            return true;
        }
        return false;
    }

    // check user exists
    function login ($data){
        $this -> db -> query('SELECT * FROM `users` WHERE email = :email');
        $this -> db -> bind(':email', $data['email']);
        $row = $this -> db -> fetch();
        $hash_password = $row -> password;

        if (password_verify($data['password'], $hash_password)){
            return $row;
        }
        return false;
    }
}