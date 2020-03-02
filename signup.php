<?php
    $db_connection = mysqli_connect('localhost', 'root', '', 'signup');
    if(isset($_POST[''])){

    
        //mysql_real_escape_string  обеззараживаем данные от возможных атак, trim удаляет пробелы в начале и конце
        $username = mysqli_real_escape_string($db_connection, trim($_POST['username']));
        $password = mysqli_real_escape_string($db_connection, trim($_POST['password']));
        $password2 = mysqli_real_escape_string($db_connection, trim($_POST['password2']));
        //Проверяем логин на совпадание
        if(!empty($username) && !empty($password) && !empty($password2) && ($password==$password2)){
            $query = "SELECT * FROM users WHERE username = '$username'";
            $data = mysqli_query($db_connection, $query);
            if(mysqli_num_rows($data) == 0){
              $query = "INSERT INTO users (username, password) VALUES ('$username', SHA('$password'))";  
                mysqli_query($db_connection, $query);
                $message = 'Your account was been created!';
            } else{
                $message = 'Error! Login has already existed!';
            }
        } elseif($password != $password2){
            $message = 'Passwords are not corrent!'; 
        }
    //Authorisation
    if(!isset($_COOKIE['user_id'])){
        $user_username = mysqli_real_escape_string($db_connection, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($db_connection, trim($_POST['password']));
        if(!empty($user_username) && !empty($user_password)){
            $query = "SELECT user_id, username FROM users WHERE username = '$user_username' AND password = '$user_password'";
            $data = mysqli_query($db_connection, $query);
            if(mysqli_num_rows($data) == 1){
                $row = mysqli_fetch_assoc($data);
                setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
                setcookie('username', $row['username'], time() + (60*60*24*30));
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . 'registration1';
                Header('Location:' . $home_url);
            } else{
                $message = 'Wrong login or password!';
            }
        }
    }
}
?>