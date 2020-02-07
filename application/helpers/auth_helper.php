<?php

function is_logged_in()
{ 
    $login=get_instance();
    if(!$login->session->userdata('email')){
        redirect('admin/Auth');
    }
}

function is_logged()
{ 
    $login=get_instance();
    if(!$login->session->userdata('email_pelanggan')){
        redirect('Auth');
    }
}
