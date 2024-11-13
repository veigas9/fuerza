<?php

function api_usuario_post($request)
{
    //RECEBE PARAMETROS DO REQUEST
    $nome = sanitize_text_field($request['nome']);
    $email = sanitize_email($request['email']);
    $senha = $request['senha'];

    $user_exists = username_exists($email);
    $email_exists = email_exists($email);

    //CRIA UM NOVO USUÁRIO
    if(!$user_exists && !$email_exists && $email && $senha){

       //CRIA USUÁRIO E JÁ RECUPERA USER_ID PARA UPDATE
       $user_id = wp_create_user($email, $senha, $email);

        //CRIA OBJETO PARA UPDATE
        $response = array(
            'ID' => $user_id,
            'display_name' => $nome,
            'first_name' => $nome,        
            'role' => 'subscriber'           
        );

        wp_update_user($response);     

    }else{
        //TRATAMENTO DE ERRO
        $response = new WP_Error('email', 'Email ja cadastrado!', array('status' => 403));
    }

    return rest_ensure_response($response);
}

function resgistrar_api_usuario_post(){
    //PARÂMETROS DA ROTA
    $namespace = 'api';
    $route     = '/usuario';
    $args      = array(
        array(
            'methods'  => WP_REST_Server::CREATABLE,
            'callback' => 'api_usuario_post',
        ),
    );

    //REGISTRA ROTA
    register_rest_route($namespace, $route, $args);    
}

//REGISTRA MÉTODO
add_action('rest_api_init', 'resgistrar_api_usuario_post');