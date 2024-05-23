<?php



class validation{
    public function fname($fname){
        $regex = '/^[a-zA-Z ]*$/';
        if(!preg_match($regex, $fname) ) {
            header("Location:../../register.php?error=Frist Name must be string");
            exit();
        }
    }
    public function lname($lname){
        $regex = '/^[a-zA-Z ]*$/';
        if(!preg_match($regex, $lname)){
            header("Location:../../register.php?error=Last Name must be string");
            exit();
        }
    }
    public function image($image){
        $regex_image = '/^[^\?]+\.(jpg|jpeg|gif|png|PNG)(?:\?|$)/';
        if(!preg_match($regex_image, $image)){
            header("Location:../../register.php?error=image must be like name.jpg | jpeg | gif | png | PNG"); 
            exit();
        }
    }
    public function email($email){
        $regex_email = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/';
        if(!preg_match($regex_email, $email)){
            header("Location:../../register.php?error=email must be like test@gmail.com"); 
            exit(); 
        }
    }
    public function emaillogin($email){
        $regex_email = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/';
        if(!preg_match($regex_email, $email)){
            header("Location:../../login.php?error=email must be like test@gmail.com"); 
            exit();
        }
    }
    public function phone($phone){
        $regex_phone = '/^01[0125][0-9]{8}$/';
        if(!preg_match($regex_phone, $phone)){
            header("Location:../../register.php?error=Phone must be start 011 , 012 , 010 , 015 and 11 digit");
            exit();

        } 
    }
    public function password($password,$confirmpassword){
        //"/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"
        if($password != $confirmpassword || $password == "" || $confirmpassword == "" ){
            header("Location:../../register.php?error=your password must be equeld confirm password");
            exit();
        }
    }
    public function passwordlogin($password){
        //"/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"
        if( $password == "" ){
            header("Location:../../login.php?error=your password must be equeld confirm password");
            exit();
        }
    }
}
$validation = new validation();