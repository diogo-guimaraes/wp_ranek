<?php 
// add(custom-post-type): transacao
// refactor(custom-post-type): transacao   
// rm(custom-post-type): transacao
function registrar_cpt_transacao(){
  register_post_type('transacao', array(
    'label' => 'Transacao',
    'description' => 'Transacao',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'transacao', 'with_front' => true),
    'query_var' => true,
    'supports' => array('custom-fields', 'author', 'title'),
    'publicly_queryalbe' => true
  ));
}
add_action('init', 'registrar_cpt_transacao');
?>