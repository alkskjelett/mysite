<?php

function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function load($data){
    foreach ($_POST as $k => $v) {
        if (array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data){
    $errors = '';
    $email = '/[0-9a-z]+@[a-z]/';
    $phone = '/^\+[0-9]\-[0-9]{3}\-[0-9]{7}$/';
    $password = '/[0-9a-zA-Z]{6,45}/';
    foreach ($data as $k => $v) {
        if($data[$k]['required'] && empty($data[$k]['value'])){
            $errors .= "<li>Вы не заполнили поле {$data[$k]['field_name']}</li>";
        }
        if ( $k == 'email' && !preg_match($email, $data[$k]['value']) && $data[$k]['required']) {
            $errors .= "<li> Введён некоректный адрес электронной почты {$data[$k]['value']} </li>>";
        }
        if ($k == 'password' && !preg_match($password, $data[$k]['value']) && $data[$k]['required']) {
            $errors .= "<li> Введён некорректный пароль {$data[$k]['value']} </li>";
        }
        if ($k == 'phone' && !preg_match($phone, $data[$k]['value']) && $data[$k]['required']) {
            $errors .= "<li> Введён некорректный номер телефона {$data[$k]['value']} </li>";
        }
    }
    return $errors;
}

function insert($data) {
    $name = $data['name']['value'];
    $email = $data['email']['value'];
    $password = $data['password']['value'];
    $phone = $data['phone']['value'];
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $sql = $mysqli->query("INSERT INTO account VALUES(default , '$name', '$email', '$password', '$phone');");
    $mysqli->close();
}

function logIn($email, $password) {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $result = $mysqli->query("SELECT login, password FROM account;");
    while($r = $result->fetch_assoc()) {
        if ($email == $r['login'] && $password == $r['password']) {
            echo 'good';
            setcookie("user", $email);
            header('Location: sessions.php');
            exit;
        }
    }
    $result->free();
    $mysqli->close();
}

function selectId($email) {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $result = $mysqli->query("SELECT id_account FROM  account WHERE login = '$email';");
    $id = $result->fetch_assoc()['id_account'];
    return $id;
}

function delete($email) {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $mysqli->query("DELETE FROM account WHERE login = '$email';");
    $mysqli->close();
}

function update($data) {
    $email = $data['email']['value'];
    $password = $data['password']['value'];
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $mysqli->query("UPDATE account SET password = '$password' WHERE login = '$email'");
    $mysqli->close();
}

function getTitle() {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $result = $mysqli->query("SELECT * FROM session WHERE id_session = 5");
    debug($result->fetch_assoc());
    return $result->fetch_assoc()['Title_of_film'];
}

function selectSessionId($time) {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $result = $mysqli->query("SELECT id_session FROM session WHERE time = '$time'");
    return $result->fetch_assoc()['id_session'];
}

function createOrder($id_account, $id_session, array $places) {
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $i = 0;
    while(isset($places[$i])) {
        $mysqli->query("INSERT INTO cinema.order VALUES(DEFAULT, '$id_session', '$id_account', '$places[$i]');");
        $i++;
    }
    $mysqli->close();
}

function selectPlacesByTime($time) {
    $session_id = selectSessionId($time);
    $mysqli = new mysqli("localhost", "root", "144255366477588Xs", "cinema");
    $result = $mysqli->query("SELECT place FROM cinema.order WHERE session_id_session = '$session_id' ");
    return $result->fetch_all();
}