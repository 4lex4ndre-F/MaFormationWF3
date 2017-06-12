<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress_bdd');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}dI5]*t0/0-Sa]YXj{q$X:+fP9zR@ub$~$oiaNi^H@WwYJ3YWHL;(<kD%%7mFFIj');
define('SECURE_AUTH_KEY',  ']S=]K#wwioyH{;rW`)oRicDuSV/U.]eG+#G^1.l-gs$fzYW+UO.ry@KvVW^0=PQ.');
define('LOGGED_IN_KEY',    'l`j@+kyj`E+F{uXno|b%=UVk{gds%h5FV7++IfyH?NmG+FvJTvi]5X!c+9h(#^A:');
define('NONCE_KEY',        '[7G>KRZvsw4zg)-p[An<#8b4vnEEEkjf bOiSXQ/?noR56DeL5EI|w:>G%#fDC;J');
define('AUTH_SALT',        'j3j]y|6h0Oum(7CsFxpjK$oz2=2#QLR,DFLoX)=8nP4_hvzgR6*uyP7%:P3:AxYo');
define('SECURE_AUTH_SALT', 'S=|/ {cb @am=pYcr1VrcEA:0YC2h(}0@nFT6V6<,qY=rV[z~Yt)z&jYlu]Fj}(4');
define('LOGGED_IN_SALT',   '}8:%$/3s>]cY!r5$hQQ`J@nQqUmXvMe}kj`zsNVZ8#Ik/Or}@+I!$mll18/t^Fl1');
define('NONCE_SALT',       '~yK}AgnEV%$KY,N1d;op>rz caqK#<)9rSs@Cipq<h7pnl8!ORi4hZ6%`0~u:c3U');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');