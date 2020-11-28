<?php
// add(endpoints): usuario_put
// refactor(endpoints): usuario_put   
// rm(endpoints): usuario_put
function api_produto_put($request)
{
  $user = wp_get_current_user();
  $post_id = get_produto_id_by_slug($request['slug']);
  if ($post_id > 0) { 
    $nome = sanitize_text_field($request['nome']);
    $url = sanitize_text_field($request['url']);
    $descricao = sanitize_text_field($request['descricao']);
    $usuario_id = $user->user_login;

    $response = array(
      'post_author' => $post_id,
      'post_type' => 'produto',
      'post_title' => $nome,
      'post_status' => 'publish',
      'meta_input' => array(
        'nome' => $nome,
        'url' => $url,
        'descricao' => $descricao,
        'usuario_id' => $usuario_id,
        // 'vendido' => 'false',
      ),
    );

    if(!$email_exists || $email_exists === $user_id) {
      $response = array(
        'post_author' => $user_id,
        'post_type' => 'produto',
        'post_title' => $nome,
        'post_status' => 'publish',
        'meta_input' => array(
          'nome' => $nome,
          'url' => $url,
          'descricao' => $descricao,
          'usuario_id' => $usuario_id,
          // 'vendido' => 'false',
        ),
      );

      wp_update_post($response);

      update_post_meta($post_id, 'nome', $nome);
      update_post_meta($post_id, 'descricao', $descricao);
      update_post_meta($post_id, 'url', $url);
    } else {
      $response = new WP_Error('email', 'Email já cadastrado.', array('status' => 403));
    }
  } else {
    $response = new WP_Error('permissao', 'Usuário não possui permissão.', array('status' => 401));
  }
  return rest_ensure_response($response);
}

function registrar_api_produto_put() {
  register_rest_route('api', '/produto', array(
    array(
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'api_produto_put',
    ),
  ));
}

add_action('rest_api_init', 'registrar_api_produto_put');

?>