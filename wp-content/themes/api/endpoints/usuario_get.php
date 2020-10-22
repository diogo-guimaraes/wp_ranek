<?php
// add(endpoints): usuario_get
// refactor(endpoints): usuario_get 
// rm(endpoints): usuario_get
function api_usuario_get($request)
{

  return rest_ensure_response($response);

}

function registrar_api_usuario_get() {
  register_rest_route('api', '/usuario', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_usuario_get',
    ),
  ));
}
add_action('rest_api_init', 'registrar_api_usuario_get');

?>