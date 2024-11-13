<?php

function api_usuario_get($request)
{
    //RETORNA USUARIO LOGADO
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0){
        $user_meta = get_user_meta($user_id);

        $response = array(
            "id" => $user->user_login,
            "nome" => $user->display_nome,
            "email" => $user->user_email            
        );
    }

    return rest_ensure_response($response);
}

function resgistrar_api_usuario_get(){
    //PARÂMETROS DA ROTA
    $namespace = 'api';
    $route     = '/usuario';
    $args      = array(
        array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => 'api_usuario_get',
        ),
    );

    //REGISTRA ROTA
    register_rest_route($namespace, $route, $args);    
}

//REGISTRA MÉTODO
add_action('rest_api_init', 'resgistrar_api_usuario_get');