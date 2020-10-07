<!-- 
add(custom-post-type): Produto
refactor(custom-post-type): Produto   
rm(custom-post-type): Produto
-->
<?php 
function registrar_cpt_produto(){
  register_post_type('produto', array(
    'label' => 'Produto',
    'description' => 'Produto',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'produto', 'with' => true),
    'query_var' => true,
    'supports' => array('custom-fields', 'author', 'title'),
    'publicly_queryalbe' => true
  ));
}
add_action('init', 'registrar_cpt_produto');
?>