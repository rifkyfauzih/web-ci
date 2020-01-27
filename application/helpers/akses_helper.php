<?php 

function hak_akses()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email_institusi')) {
		redirect('auth');
	} else {
		
	}
}