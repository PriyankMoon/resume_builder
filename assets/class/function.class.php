<?php

class Functions {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // this is for redirecting but its of no use as using this 
    // i have to just write fn->redirect(location);
    // but its not working so i  have to use this instead directly in the convert_uudecode
    public function redirect($address) {
        header("Location:" . $address);
        exit();
    }

    public function setError($msg) {
        $_SESSION['error'] = $msg;
    }

    public function setAuth($data) {
        $_SESSION['Auth'] = $data;
    }

    public function Auth() {
        return isset($_SESSION['Auth']) ? $_SESSION['Auth'] : false;
    }

    public function error() {
        if (!empty($_SESSION['error'])) {
            echo $this->getSweetAlertScript('error', $_SESSION['error']);
            $this->clearError();
        }
    }

    public function setAlert($msg, $type = 'success') {
        $_SESSION['alert'] = ['message' => $msg, 'type' => $type];
    }

    public function alert() {
        if (!empty($_SESSION['alert'])) {
            $alert = $_SESSION['alert'];
            echo $this->getSweetAlertScript($alert['type'], $alert['message']);
            $this->clearAlert();
        }
    }

    public function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function getSession($key) {
        return $_SESSION[$key] ?? '';
    }

    public function authPage() {
        if (!isset($_SESSION['Auth'])) {
            $this->redirect('login.php');
        }
    }

    public function nonAuthPage() {
        if (isset($_SESSION['Auth'])) {
            $this->redirect('myresumes.php');
        }
    }

    public function clearError() {
        unset($_SESSION['error']);
    }

    public function clearAlert() {
        unset($_SESSION['alert']);
    }

    private function getSweetAlertScript($type, $message, $showConfirmButton = true) {
        $script = "Swal.fire({
            icon: '{$type}',
            title: '{$message}',";

        if (!$showConfirmButton) {
            $script .= "showConfirmButton: false,";
        }

        $script .= "});";

        return $script;
    }

    // this function is used for gettting slug by randomize the character
    public function randomstring(){
        $string="0123456789abcdefghijklmnopqrstuvwxyz_".time().rand(1111,2222333);
        $string=str_shuffle($string);
        return str_split($string,16)[0];
    }
}

$fn = new Functions();

?>
