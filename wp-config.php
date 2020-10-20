<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'ranek_db' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-<^_gCaaKaM]:pTuebb[QnhQ#h9uUUi@%0}hRmo:vH:>M(0d4QGfDWJSJ_n.-B,3' );
define( 'SECURE_AUTH_KEY',  '}B p44UBE=9Z/sz7T0``tNN<Y{Tl^yB,a2K2l9s%qp7~VZU[GW,N88Vs;L2JEByG' );
define( 'LOGGED_IN_KEY',    'EHp(=VuiwG}Pxq4tThQ;8c,^^ruI6dVo2LknM)&xaPlH~e)W}iwiU%s^GG9HqHma' );
define( 'NONCE_KEY',        'CVjb1l1(y+EI)2vZh`U&Vyt aED2p;EVX79fyY/S?T4rVq2@>BFON]Oa5l`;1ZlJ' );
define( 'AUTH_SALT',        '7x&`YDzuh/(=h@@l>S{K^MU(FZwXK%4W_.k[EAczAj5z_htw3LJ!|CJ!M[;*18J;' );
define( 'SECURE_AUTH_SALT', ';ADWh$iWHbnDhE/vGtMo(%H?iL:E+$(CO<<W}B53qIdoA9.&~}4NEc9E[sja8/4K' );
define( 'LOGGED_IN_SALT',   '(C^J<StbNV;0Ht(GMvBu#=TS3/p4u M#z$gjcx=6Yz!3*02qdNd!N}*X[Yf~T*1C' );
define( 'NONCE_SALT',       'yjo:]1YfuIse7)W+kilcQQm,N6gj4QoNu6~Xb{k5alHTc?B2 Y!lm{[/]qp_vEsC' );
define('JWT_AUTH_SECRET_KEY', '~`-B%0SFa<nb&e{AcaR_(319v59;|K#[LH#93eS-I/]:z#B4bPkK8s)U&F!&Ge?C');
define('JWT_AUTH_CORS_ENABLE', true);
/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
