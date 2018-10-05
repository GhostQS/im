<?php
/**
 * Temeljna konfiguracija WordPressa.
 *
 * wp-config.php instalacijska skripta koristi ovaj zapis tijekom instalacije.
 * Ne morate koristiti web stranicu, samo kopirajte i preimenujte ovaj zapis
 * u "wp-config.php" datoteku i popunite tražene vrijednosti.
 *
 * Ovaj zapis sadrži sljedeće konfiguracije:
 *
 * * MySQL postavke
 * * Tajne ključeve
 * * Prefiks tablica baze podataka
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL postavke - Informacije možete dobiti od vašeg web hosta ** //
/** Ime baze podataka za WordPress */
define('DB_NAME', 'algebra_lab');

/** MySQL korisničko ime baze podataka */
define('DB_USER', 'root');

/** MySQL lozinka baze podataka */
define('DB_PASSWORD', 'root');

/** MySQL naziv hosta */
define('DB_HOST', 'localhost');

/** Kodna tablica koja će se koristiti u kreiranju tablica baze podataka. */
define('DB_CHARSET', 'utf8mb4');

/** Tip sortiranja (collate) baze podataka. Ne mijenjate ako ne znate što radite. */
define('DB_COLLATE', '');

/**#@+
 * Jedinstveni Autentifikacijski ključevi (Authentication Unique Keys and Salts).
 *
 * Promijenite ovo u vaše jedinstvene fraze!
 * Ključeve možete generirati pomoću {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org tajni-ključ servis}
 * Ključeve možete promijeniti bilo kada s tim da će se svi korisnici morati ponovo prijaviti jer kolačići (cookies) neće više važiti nakon izmjene ključeva.
 *
 * @od inačice 2.6.0
 */
define('AUTH_KEY',         '{g~0E,]HG2b%9H 488f:h#nqpCC!15Y{H,94W~wxCEDN*St&[VaO`Di/!FIk94iu');
define('SECURE_AUTH_KEY',  '@G[ZWTE=||4V{L<tEF(Y<#lXpqylJeB5T`Gl[M7#BwzaRfm!YjSMsrE];2dx[?yZ');
define('LOGGED_IN_KEY',    'ZWP!=VmURj~OYf!^x5:Ki[k=ZuYK8/n@u[JWr/%BGRZ0,:9QQXiz~A>0FwsNu><V');
define('NONCE_KEY',        't01Q0LKAdliN a-|xr(W[m*F&/fwIKZR,Qyp.B,sCyWJ?pWH$*MN?5d(!$E(|CJr');
define('AUTH_SALT',        'm6x#*FW[|DW|CYDM?-KFL@x*Ii8EWdtUB(ws?WI*MF^6@-rD:[uA|#>E.Bh/(I_.');
define('SECURE_AUTH_SALT', '(p!-j$G+T&Nn~Tv8z3lEMntd#zhI eZHw+0Lg%2@-n-ungNqZ?f1~NS>8cID` `7');
define('LOGGED_IN_SALT',   '(&P*k?6UdXSEOm%u J2E$3GDOOQ8V)5Mi[5U6/U?iY )7/)Ih;iM_Eim4U%8FqY,');
define('NONCE_SALT',       '^%#Y)Lhw6lj4T1eB,K$l5*y%WtiY=]Wu0^IE|5v%|[#_ClA@&@)PBMsS#4f+)MCK');

/**#@-*/

/**
 * Prefix WordPress tablica baze podataka.
 *
 * Možete imati više instalacija unutar jedne baze ukoliko svakoj dodjelite
 * jedinstveni prefiks. Koristite samo brojeve, slova, i donju crticu!
 */
$table_prefix  = 'alwpdb_';

/**
 * Za programere: WordPress debugging mode.
 *
 * Promijenit ovo u true kako bi omogućili prikazivanje poruka tijekom razvoja.
 * Izrazito preporučujemo da programeri dodataka (plugin) i tema
 * koriste WP_DEBUG u njihovom razvojnom okružju.
 *
 * Za informacije o drugim konstantama koje se mogu koristiti za debugging,
 * posjetite Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To je sve, ne morate više ništa mijenjati! Sretno bloganje. */

/** Apsolutna putanja do WordPress mape. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Postavke za WordPress varijable i već uključene zapise. */
require_once(ABSPATH . 'wp-settings.php');
