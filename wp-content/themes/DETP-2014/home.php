<?php
wp_head();

$context 				= Timber::get_context();
$context['menu'] 		= new TimberMenu();
$context['foot']		= get_sidebar('footer');
$context['donate']		= do_shortcode('[paypal-donation purpose="Generation of Dreams"]' );;

//Get Pages
$homepage 				= get_page_by_title('Home' );
if ( $homepage ) { $context['home_post']	= new TimberPost( $homepage->ID ); }

$missionpage 				= get_page_by_title('Engaging Art To Ignite Community' );
if ( $missionpage ) { 
	$context['mission_post']	= new TimberPost( $missionpage->ID ); 
	$context['mission_post']->post_content	= apply_filters( 'the_content', $context['mission_post']->post_content ); 
}



Timber::render('views/home.html.twig', $context);

wp_footer(); 
?>