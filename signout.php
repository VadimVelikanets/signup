<?php
    unset($_COOKIE['user_id']);
    unset($_COOKIE['username']);
    setcookie('user_id', '', -1, '/');
    setcookie('username', '', -1, '/');
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/registration1';
    Header('Location:' . $home_url);