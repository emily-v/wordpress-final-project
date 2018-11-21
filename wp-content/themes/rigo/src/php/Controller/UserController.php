<?php
namespace Rigo\Controller;

use WP_REST_Response;

class UserController{
    
    public function getUser(){
        $current_user = wp_get_current_user();
        return $current_user;
    }
        
    
    public function putNewUser( $request ){
        $data = $request->get_json_params();
        $userdata = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_email' => $data['email'],
            'user_login' => $data['email'],
            'user_pass' => $data['password']
            );
        
        $result = wp_insert_user ( $userdata );
        
        if ( is_wp_error( $result ) ) {
            return $result->get_error_message();
        }
        
        return $result;
    }
    
}
?>