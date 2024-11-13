<?php

function api_usuario_put($request)
{
    //RETORNA USUARIO LOGADO
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0){
        $nome = sanitize_text_field($request['nome']);
        $email = sanitize_email($request['email']);
        $senha = $request['senha'];
        
        $user_exists = username_exists($email);
        $email_exists = email_exists($email);

        if(!$email_exists || $email_exists === $user_id){        
            $response = array(
                'ID' => $user_id,
                'user_pass' => $senha,
                'user_email' => $email,
                'display_name' => $nome,
                'first_name' => $nome
            );

            wp_update_user($response);        
        }else{
            //TRATAMENTO DE ERRO
            $response = new WP_Error('email', 'Email ja cadastrado!', array('status' => 403));
        }
    }else{
        //TRATAMENTO DE ERRO
        $response = new WP_Error('permissao', 'Usuario nao possui permissao!', array('status' => 401)); 
    }

    return rest_ensure_response($response);
}

function resgistrar_api_usuario_put(){
    //PARÂMETROS DA ROTA
    $namespace = 'api';
    $route     = '/usuario';
    $args      = array(
        array(
            'methods'  => WP_REST_Server::EDITABLE,
            'callback' => 'api_usuario_put',
        ),
    );

    //REGISTRA ROTA
    register_rest_route($namespace, $route, $args);    
}

//REGISTRA MÉTODO
add_action('rest_api_init', 'resgistrar_api_usuario_put');