<?php

class Users extends Controller {    
    function __construct (){
        $this -> userModel = $this -> model ('user');
    }

    function register (){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){                                                          // if data sended whit post method :
            // secure data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // init data
            $data = [
                "name" => trim($_POST['name']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "confirm_password" => trim($_POST['confirm_password']),
                "name_error" => '',
                "email_error" => '',
                "password_error" => '',
                "confirm_password_error" => ''
            ];

            // validation name
            if (empty($data['name'])){
                $data['name_error'] = "لطفا نام خود را وارد کنید";
            }

            // validation email
            if (empty($data['email'])){                                                                     // check email field not empty
                $data['email_error'] = "لطفا ایمیل خود را وارد کنید";
            } else if ($this -> userModel -> FindUserByEmail($data['email'])){                              // check repetitive email
                    $data['email_error'] = "ایمیل قبلا انتخاب شده";
            }
            
            // validation password
            if (empty($data['password'])){
                $data['password_error'] = "لطفا رمز عبور خود را وارد کنید";
            } else if (strlen($data['password'] < 6)) {
                $data['password_error'] = "تعداد حروف رمز عبور باید بیشتر از شش کاراکتر باشد";
            }
            
            // validation confirm password
            if (empty($data['confirm_password'])){
                $data['confirm_password_error'] = "لطفا تکرار رمز عبور خود را وارد کنید";
            } else if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_error'] = "تکرار رمز عبور با رمز عبور مطابقت ندارد";
            }

            // make sure all data validated
            if (empty($data['name_error']) and empty($data['email_error']) and empty($data['password_error']) and empty($data['confirm_password_error'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);                     // hash password

                if ($this -> userModel -> register ($data)){
                    flash('register_success', 'عضویت با موفقیت انجام شد');                                  // create success maesage and show message on login page
                    Redirect('users/login');
                } else {
                    die ('Error register');
                }

            } else {
                $this -> view ("users/register", $data);
            }

        } else {                                                                                            // if data sended whit get method :
            $data = [
                "name" => '',
                "email" => '',
                "password" => '',
                "confirm_password" => '',
                "name_error" => '',
                "email_error" => '',
                "password_error" => '',
                "confirm_password_error" => ''
            ];

            $this -> view ("users/register", $data);
        }
    }

    function login (){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
           // secure data
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

           // init data
            $data = [
               "email" => trim($_POST['email']),
               "password" => trim($_POST['password']),
               "email_error" => '',
               "password_error" => '',
            ];

            // validation email
            if (empty($data['email'])){
                $data['email_error'] = "لطفا ایمیل خود را وارد کنید";
            } elseif ($this -> userModel -> FindUserByEmail($data['email'])){
                // user email found
            } else {
                $data['email_error'] = "کاربری با این ایمیل یافت نشد";
            }
            
            // validation password
            if (empty($data['password'])){
                $data['password_error'] = "لطفا رمز عبور خود را وارد کنید";
            }
            
            // make sure all data validated
            if (empty($data['email_error']) and empty($data['password_error'])){
                $loggedIn = $this -> userModel -> login($data);                                             // save user info or save false

                if ($loggedIn){
                    $this -> CreateUserSession($loggedIn);
                } else {
                    $data['password_error'] = 'رمز عبور نادرست است';
                    $this -> view ("users/login", $data);
                }

            } else {
                $this -> view ("users/login", $data);
            }

        } else {
            $data = [
                "email" => '',
                "password" => '',
                "email_error" => '',
                "password_error" => '',
            ];

            $this -> view ("users/login", $data);
        }
    }

    function CreateUserSession ($user){
        $_SESSION['user_id'] = $user -> id;
        $_SESSION['user_name'] = $user -> name;
        $_SESSION['user_email'] = $user -> email;

        Redirect('articles/index');                                                                               // when user success login redirect to define page or file 
    }


    function logout (){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();

        Redirect('users/login');
    }
}