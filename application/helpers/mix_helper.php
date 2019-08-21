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

function is_admin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('role') != 1) {
        $ci->session->set_flashdata('message', 'You have no access to this menu!');
        redirect('admin/');
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

function FormatNoTrans($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "KP0000" . $num;
            break;
        case 2:
            $NoTrans = "KP000" . $num;
            break;
        case 3:
            $NoTrans = "KP00" . $num;
            break;
        case 4:
            $NoTrans = "KP0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function OtomatisID()
{
    $ci = &get_instance();
    $ci->db->from('sales');
    $result = $ci->db->get()->num_rows();
    return $result;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function xss($string)
{
    echo htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function dd($val)
{
    return var_dump($val);
}
