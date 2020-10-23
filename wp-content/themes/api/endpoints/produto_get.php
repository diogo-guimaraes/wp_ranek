<?php
// add(endpoints): produto_get
// refactor(endpoints): produto_get   
// rm(endpoints): produto_get
function api_produto_get($request)
{ 
  $slug = $request["slug"];
  $post_id = get_produto_id_by_slug($slug);
  
  return rest_ensure_response($slug);
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