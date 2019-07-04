<?php

 function cek_login()
 {
   $ci = get_instance();

   if(!$ci->session->userdata('username')) {
     redirect('auth');
   } else {
     $role_id = $ci->session->userdata('role_id');
     $menu = $ci->uri->segment(1);
     $querymenu = $ci->db->get_where('user_role', ['role' => $menu])->row_array();
     $menu_role_id = $querymenu['id'];

     if ($role_id != $menu_role_id) {
       redirect('auth/blocked');
     }

   }
 }
