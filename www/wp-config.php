<?php

define( 'DISALLOW_FILE_EDIT', true );

define( 'BWPS_FILECHECK', true );

/**
* As configurações básicas do WordPress.
*
* Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
* Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
* visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
*
* Esse arquivo é usado pelo script ed criação wp-config.php durante a
* instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
* como "wp-config.php" e preencher os valores.
*
* @package WordPress
*/

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'devhouse_site');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'G0d!s777');

/** nome do host do MySQL */
define('DB_HOST', 'db');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://localhost:8080');
define('WP_SITEURL', 'http://localhost:8080');

/**#@+
* Chaves únicas de autenticação e salts.
*
* Altere cada chave para um frase única!
* Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
*
* @since 2.6.0
*/
define('AUTH_KEY',         '}9,UH3/x[b&Xu#JJ-%Y]6J;nN+[UArG(PlL-)GzS^pAhu)xg6m(x{Qw_3w]ds7AD');
define('SECURE_AUTH_KEY',  'EGY_mo(_|M?p[${^eD#{rAr$La+vfcPksH5~6lTjI(sy)Au)<@j0^R?A6<LFS=!r');
define('LOGGED_IN_KEY',    'qSa@-;$kgCiXwBL_Z*]8#3*[?m;p`[t>[ECq)7ci3;Y6DBHUZxErdLURT><K]W64');
define('NONCE_KEY',        '8!zpf&c4z]m%]#pw5|}-kvj&:GG[#QZx2Ob5_xo|1<@2p)br->tD.==xl]q#nh+`');
define('AUTH_SALT',        '%JS=w]#cX1{JM9CAVfSqCL,dep$4WA@T0<D[`M243,BYR% ,e+s)z;F<,;&MVQNh');
define('SECURE_AUTH_SALT', 'wfDK$Oc*T7W+mm,dmLWXGVWIYNC,<,Rb<dKLJZ:{FPr999YHG%)>:/$LdX.t[}4l');
define('LOGGED_IN_SALT',   '@Dy-JAt2j.Ybdyc;mga*AS9F[d6n`Vm*EiEni>R<MpPTtV6`: _|4|zY1|lt7&P.');
define('NONCE_SALT',       'CJTrCY3MzcG561QV6Ez|m:8i^CWVx#i]Zqs(7P<0QrA=i~D_>n[l|znr(Kp-Z~hd');

/**#@-*/

/**
* Prefixo da tabela do banco de dados do WordPress.
*
* Você pode ter várias instalações em um único banco de dados se você der para cada um um único
* prefixo. Somente números, letras e sublinhados!
*/
$table_prefix  = 'ab3f44oy3_';

/**
* O idioma localizado do WordPress é o inglês por padrão.
*
* Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
* idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
* pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
* ao português do Brasil.
* 
*/
define('WPLANG', 'pt_BR');

/**
* Para desenvolvedores: Modo debugging WordPress.
*
* altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
* é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
* em seus ambientes de desenvolvimento.
*/
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
