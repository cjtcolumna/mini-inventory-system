<?php
include "classes/DbMgtClass.php";

class UserClass extends DbMgtClass
{
    public function Authenticate($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            $result = $this->FetchRow("tbluser", "lemail='$email'");
            if (!empty($result)) {
                if (hash('sha256', $password) === $result['lpassword']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $result['lid'];
                    $_SESSION['user_email'] = $result['lemail'];
                    $_SESSION['user_firstname'] = $result['lfirstname'];
                    $_SESSION['user_lastname'] = $result['llastname'];
                    header("Location: dashboard.php");
                    return "";
                } else {
                    return "Password is wrong.";
                }
            } else {
                return "Account not found.";
            }
        }else{
            return "Please fill out email and password.";
        }
    }

    public function CreateUserRecord($firstname, $lastname, $email, $password, $confirm_password) {
        if(
            empty($firstname) ||
            empty($lastname) ||
            empty($email) ||
            empty($password) ||
            empty($confirm_password) 
        ) {
            return "Please fill out all required input fields.";
        }else{
            if($password === $confirm_password){
                $password = hash("sha256", $password);
                $this->InsertRecord(
                    "tbluser", 
                    array(
                        'lfirstname'=>$firstname, 
                        'llastname'=>$lastname, 
                        'lemail'=>$email, 
                        'lpassword'=>$password)  
                );
                header("Location: user_new.php");
                return "";
            }else{
                return "Password doesn't match.";
            }
            
        }
    }

    public function UpdateUserProfile($id, array $inputs){
        $input_email = $inputs['lemail'];
        if($this->isUserEmailExisted($id, $input_email)) {
            return "Email already taken.";
        }else {
            $this->UpdateRecord("tbluser", $inputs, "lid=$id");
            return "";
        }
    }

    public function isUserEmailExisted($id, $email) {
        $lid = $this->FetchCol("tbluser", "lemail='$email'", "lid");
        if(empty($lid)){
            return false;
        }else {
            if($id === $lid){
                return false;
            }else {
                return true;
            }
        }
    }

    public function UpdateUserPassword($id, $password, $confirm_password){
        if($password === $confirm_password){
            $password = hash("sha256", $password);
            $this->UpdateRecord("tbluser", array('lpassword'=>$password), "lid=$id");
            return "";
        }else{
            return "Password does not match.";
        }
    }

    public function DeleteUserRecord($selected_user_id, $current_user_id) {
        $selected_user_id = (int)$selected_user_id;
        $this->DeleteRecord("tbluser", "lid=$selected_user_id");
        if($selected_user_id === $current_user_id){
            header("Location: logout.php");
        }else{
            header("Location: user_list.php");
            return "Account successfully deleted.";
        }
    }
}
