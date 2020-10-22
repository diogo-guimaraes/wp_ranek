<?php
// add(endpoints): usuario_put
// refactor(endpoints): usuario_put   
// rm(endpoints): usuario_put
function api_usuario_put($request)
{
  $user = wp_get_current_user();
  $user_id = $user->ID;
  if($user_id > 0){
    $user_meta = get_user_meta($user_id);

    $response = array(
      "id" => $user->user_login,
      "nome" => $user->display_name,
      "email" => $user->user_email,
      "cep" => $user_meta['cep'][0],
      "numero" => $user_meta['numero'][0],
      "rua" => $user_meta['rua'][0],
      "bairro" => $user_meta['bairro'][0],
      "cidade" => $user_meta['cidade'][0],
      "estado" => $user_meta['estado'][0],
    );
  }else {
    $response = new WP_Error('permissao', 'Usuário não possui permissão', array('status' => 401));
  }

  $email = sanitize_email($request['email']);
  $senha = $request['senha'];
  $nome = sanitize_text_field($request['nome']);
  $rua = sanitize_text_field($request['rua']);
  $cep = sanitize_text_field($request['cep']);
  $numero = sanitize_text_field($request['numero']);
  $bairro = sanitize_text_field($request['bairro']);
  $cidade = sanitize_text_field($request['cidade']);
  $estado = sanitize_text_field($request['estado']);

  $user_exists = username_exists($email);
  $email_exists = email_exists($email);

  if (!$user_exists && !$email_exists && $email && $senha) {
    $user_id = wp_create_user($email, $senha, $email);

    $response = array(
      'ID' => $user_id,
      'display_name' => $nome,
      'first_name' => $nome,
      'role' => 'subscriber',
    );

    wp_update_user($response);

    update_user_meta($user_id, 'cep', $cep);
    update_user_meta($user_id, 'rua', $rua);
    update_user_meta($user_id, 'numero', $numero);
    update_user_meta($user_id, 'bairro', $bairro);
    update_user_meta($user_id, 'cidade', $cidade);
    update_user_meta($user_id, 'estado', $estado);

  }else {
    $response = new WP_Error('email', 'Email já cadastrado.', array('status' => 403));
  }
  //   return rest_ensure_response($response);
  return rest_ensure_response($response);
}

function registrar_api_usuario_put() {
  register_rest_route('api', '/usuario', array(
    array(
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'api_usuario_put',
    ),
  ));
}

add_action('rest_api_init', 'registrar_api_usuario_put');

?>