<?php
/*
Plugin Name: Email Notification system
Plugin URI: http://algebra.hr/lab
description: Sending custom mails for users, admins and evaluators
Version: 1.0
Author: Boris Agatić
Author URI: http://birtcoin-radionica.com
*/

add_action( 'transition_post_status', 'send_mails_on_publish', 10, 3 );

function send_mails_on_publish( $new_status, $old_status, $post )
{
    if ( 'publish' !== $new_status or 'publish' === $old_status
        or 'challenges' !== get_post_type( $post ) )
        return;

    $subscribers = get_users( array ( 'role' => 'evaluator1' ) );
    $emails      = array ();
    $headers = array('Content-Type: text/html; charset=UTF-8');

    foreach ( $subscribers as $subscriber )
        $emails[] = $subscriber->user_email;

        $evaluator = get_field('evaluator',$post_id);

        // echo '<pre>' . var_export($evaluator, true) . '</pre>';

        $display_name = $evaluator[display_name];



        $body = sprintf( 'Pozdrav <strong>%s</strong>, novi izazvo je objavljen i ti si odabran kao evaluator1!<br/>
        Naziv izazova: <strong>%s</strong><br/>
        Pogledaj izazov <strong><a href="%s">ovdje</a></strong><br/>
        ID izazova:  <strong>%s</strong><br/>
        Rok:  <strong>%s</strong><br/>
        Rok za evaluaciju: <strong>%s</strong><br/>
        Rok za kraj bootcampa:  <strong>%s</strong><br/>',
        $display_name,
        get_the_title($post),
        get_permalink( $post ),
        get_field( "challenge_ide", $post_id),
        get_field("rok", $post_id),
        get_field("rok_za_evaluaciju", $post_id),
        get_field("rok_za_kraj_bootcampa", $post_id)
    );


  wp_mail( $emails, 'Novi izazov!', $body, $headers );
}

?>
