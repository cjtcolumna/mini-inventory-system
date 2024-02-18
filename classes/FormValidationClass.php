<?php
include "classes/DbMgtClass.php";

class FormValidationClass extends DbMgtClass
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
}
