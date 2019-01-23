<?php

namespace controllers;
use core\Controller;

class UserController extends Controller {

    public function registrationAction() {
        if(isset($_POST['register'])) {
            $errors = array();
            $login = filter_input(INPUT_POST,'login',FILTER_SANITIZE_STRING);
            $pass1 = filter_input(INPUT_POST,'password1',FILTER_SANITIZE_STRING);
            $pass2 = filter_input(INPUT_POST,'password2',FILTER_SANITIZE_STRING);
            if(empty($login)) {
                $errors[] = 'Enter login.';
            }
            if(empty($pass1)) {
                $errors[] = 'Enter password.';
            }
            if(empty($pass2) || $pass1 != $pass2) {
                $errors[] = 'Repeat password.';
            }
            if(empty($errors)) {
                //добавить пользователя в базу
                $result = $this->model->addNewUser($login,$pass2);
                if($result) {
                    echo json_encode(
                        array(
                            'success' => true,
                            'login' => $login,
                            'pass1' => $pass1,
                            'pass2' => $pass2,
                        )
                    );
                } else {
                    echo json_encode(
                        array(
                            'success' => false,
                        )
                    );
                }

            } else {
                echo json_encode(
                    array(
                        'success' => false,
                        'errors' => $errors,
                    )
                );
            }
        }
        exit;
    }

    public function loginAction() {
        if(isset($_POST['log_in'])) {
            $errors = array();
            $login = filter_input(INPUT_POST,'login',FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
            if(empty($login)) {
                $errors[] = 'Enter login.';
            }
            if(empty($password)) {
                $errors[] = 'Enter password.';
            }
            if(empty($errors)) {
                // процедура авторизации
                $result = $this->model->loginUser($login,$password);
                if($result) {
                    $_SESSION['user_id'] = $result;
                    if($result == 1) {
                        $_SESSION['admin'] = true;
                    }
                    echo json_encode(
                        array(
                            'success' => true,
                            'user_id' => $result
                        )
                    );
                } else {
                    echo json_encode(
                        array(
                            'success' => false,
                            'result' => $result
                        )
                    );
                }
            } else {
                echo json_encode(
                    array(
                        'success' => false,
                        'errors' => $errors,
                    )
                );
            }
        }
        exit;
    }
    public function logoutAction() {
        if(isset($_POST['logout'])) {
            session_start();
            session_destroy();
        }
    }

    public function is_user_logged_in() {

    }


}