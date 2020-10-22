
<?php

// add(api): functions
// refactor(api): functions   
// rm(api): functions

$template_diretorio = get_template_directory();

require_once($template_diretorio . "/custom-post-type/produto.php");
require_once($template_diretorio . "/custom-post-type/transacao.php");
require_once($template_diretorio . "/endpoints/usuario_post.php");
require_once($template_diretorio . "/endpoints/usuario_get.php");
require_once($template_diretorio . "/endpoints/usuario_put.php");

require_once($template_diretorio . "/endpoints/produto_post.php");

function expire_token(){
  return time() + (60 * 60 * 24);
}

add_action('jwt_auth_expire', 'expire_token');

?>