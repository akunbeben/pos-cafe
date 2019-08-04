<?php

function is_not_login()
{
    $ci = &get_instance();
    $login_token    = $ci->session->userdata('username');
    $hash           = $ci->session->userdata('Login_Token');
    if (!password_verify($login_token, $hash)) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger">Access denied, login to get access.</div>');
        redirect('auth/');
    }
}

function kode_random($length)
{
    $data = '1234567890';
    $string = 'ID';

    for ($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data) - 1);
        $string .= $data{
            $pos};
    }
    return $string;
}
