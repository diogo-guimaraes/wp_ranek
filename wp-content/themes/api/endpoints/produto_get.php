<?php
// add(endpoints): produto_get
// refactor(endpoints): produto_get   
// rm(endpoints): produto_get
function api_produto_get($request)
{ 


  return rest_ensure_response($response);
}

function registrar_api_produto_get() {
  register_rest_route('api', '/produto/(?P<slug>[-\w]+)', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_produto_get',
    ),
  ));
}

add_action('rest_api_init', 'registrar_api_produto_get');

?>