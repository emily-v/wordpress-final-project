<?php
namespace Rigo\Controller;

use WP_REST_Response;

class UserController{
    
    public function getHomeData(){ //EV un-commented this
        return [
            'name' => 'Rigoberto'
        ];
    }
    
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
        /*$username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        
        if (null == username_exists($email)){
        $user_id = wp_create_user( $username, $password, $email);
        }*/
        
        
        /*$data = $request->get_json_params();
        //print_r( $data) ;
        //die;
        $post_arr = array(
            'post_title'   => $data["post_title"],
            'post_content' => $data["post_content"],
            'post_status'  => 'publish',
            'post_type'    => 'photo',
            'meta_input'   => array(
                'this_is_custom' => $data["this_is_custom"],
            )
        );
        
        $chair = wp_insert_post($post_arr);
        
        if($chair !== 0){
            return new WP_REST_Response(
                array(
                    "code" => "success",
                    "message" => "successfully created"
                ), 200);
        }else{
            return new WP_REST_Response(
                array(
                    "code"=>"error",
                    "message" => "something went wrong while inserting"
                ), 500);
        }*/
    
}
?>