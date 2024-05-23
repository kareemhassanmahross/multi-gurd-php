<?php

require "../connection.php";
require "../validation.php";

// 
class Auth
{
    public function login($req){
      global $validation;
      global $DB;
      $email    = trim($req['email']);
      $password = trim($req['password']);
      $validation->emaillogin($email);
      $validation->passwordlogin($password);
 
      $query = "SELECT * FROM users Where email = '$email' AND password = '$password'" ;
      echo "<pre>";

      print_r(count($DB->get($query)));
      
      echo "</pre>";
      $arr = [

        // 'email'    => $email,
        // 'password' => $password
      ];
    //   var_dump($arr);
    //   echo "<pre>";
    //   print_r($DB->getByKey($arr,$query));
    //   echo "</pre>";

    }
    public function register($req){
    global $validation;
    global $DB;
      $fname = trim($req['fname']);
      $lname = trim($req['lname']); 
      $email = trim($req['email']); 
      $image = trim($req['image']);
      $phone = trim($req['phone']);
      $password = trim($req['password']); 
      $confirmpassword = trim($req['confirmpassword']);
      $validation->fname($fname);
      $validation->lname($lname);
      $validation->email($email);
      $validation->image($image);
      $validation->phone($phone);
      $validation->password($password,$confirmpassword);
      $query = 'INSERT INTO users (fname,lname,email,password,image,phone) 
      VALUES (:fname,:lname,:email,:password,:image,:phone)';
      $arr = [
         'fname'=>$fname,
         'lname'=>$lname,
         'email'=>$email,
         'password'=>$password,
         'image'=>$image,
         'phone'=>$phone
      ] ;  
        // $DB->create($arr,$query);
        if($DB->create($arr,$query)==true){ 
            header("Location: ../../login.php");
      }      
    }
    public function logout(){

    }
}

$Auth = new Auth();
if( $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php' || 
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=your%20password%20must%20be%20equeld%20confirm%20password'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=Frist%20Name%20must%20be%20string'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=Last%20Name%20must%20be%20string'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=image%20must%20be%20like%20name.jpg%20|%20jpeg%20|%20gif%20|%20png%20|%20PNG'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=email%20must%20be%20like%20test@gmail.com'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/register.php?error=Phone%20must%20be%20start%20011%20,%20012%20,%20010%20,%20015%20and%2011%20digit'
    ){
    $Auth->register($_REQUEST);
}

if ($_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/login.php'||
    $_SERVER['HTTP_REFERER'] =='http://localhost/laravel/php/php%20oop/login.php?error=email%20must%20be%20like%20test@gmail.com'||
    $_SERVER['HTTP_REFERER'] == 'http://localhost/laravel/php/php%20oop/login.php?error=your%20password%20must%20be%20equeld%20confirm%20password'
    ){
    $Auth->login($_REQUEST);
}