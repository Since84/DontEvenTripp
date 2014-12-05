<?php
namespace DETP;

class Theme {
	function __construct(){
		// add_action( 'init', array($this,'init_action') ); 

		$actions = array(
				'init'									=> array($this, 'init_action')
				// 'admin_init'							=> array($this, 'adminInit'),
				// 'admin_head'							=> array($this, 'adminHead'),
				,'save_post'							=> array($this, 'save_post')
				,'add_meta_boxes'						=> array(array($this, 'add_meta_boxes'), 0, 1),
				// 'init'									=> array($this,'add_query_vars'),
				// 'init'									=> array($this, 'myplugin_settings')
			);
		
		foreach($actions as $hook => $action)
			if(is_array($action[0]))
				call_user_func_array('add_action', array_merge(array($hook), $action));
			else
				add_action($hook, $action);

	}

	//Run all initialization tasks
	public function init_action(){
		$this->enqueue_scripts();
		$this->enqueue_styles();
		$this->register_nav_menus();
		$this->register_post_types();
		$this->register_ajax();

	}

	//Enqueue scripts using wp_enqueue_script
	public function enqueue_scripts(){
		wp_register_script( 'ejs', get_template_directory_uri().'/script/external/ejs/ejs_production.js', array('jquery'));
		wp_register_script( 'jquery_widget', get_template_directory_uri().'/script/external/jquery-ui-widget.js', array('jquery') );
		wp_register_script( 'detp_theme', get_template_directory_uri().'/script/theme.js', array('jquery', 'jquery_widget') );

		wp_enqueue_script( 'ejs' );
		wp_enqueue_script( 'jquery_widget' );
		wp_localize_script( 'jquery_widget', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		
		wp_enqueue_script('detp_theme');
	}

	//Enqueue styles using wp_enqueue_style
	public function enqueue_styles(){
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' );
	}

	//Register Nav Menus
	public function register_nav_menus(){
		register_nav_menus(array(
			"main_nav"		=>		"Main Site Navigation"
		));
	}

	//Register Post Types
	public function register_post_types(){
		add_theme_support( 'post-thumbnails' );
		$teamArgs = array(
			'label'             => 'Team'
			,'public'			=> true
			,'show_in_menu'		=> true
			,'supports'            => array(
				'title', 'editor', 'author', 'thumbnail',
				'excerpt','custom-fields', 'revisions', 'page-attributes', 'post-formats'
			)
		);
	
		register_post_type('team', $teamArgs);

		$projectArgs = array(
			'label'             => 'Project'
			,'public'			=> true
			,'show_in_menu'		=> true
			,'supports'            => array(
				'title', 'editor', 'author', 'thumbnail',
				'excerpt','custom-fields', 'revisions', 'page-attributes', 'post-formats'
			)
		);
	
		register_post_type('project', $projectArgs);

		$galleryArgs = array(
			'label'             => 'Gallery'
			,'public'			=> true
			,'show_in_menu'		=> true
			,'supports'         => array('title', 'author', 'thumbnail', 'excerpt')
		);
	
		register_post_type('gallery', $galleryArgs);

	}

	//Add Meta Boxes
	public function add_meta_boxes(){
		add_meta_box('meta_box', 'Member Info', array($this, 'show_member_meta_box'), 'team');
		add_meta_box('meta_box', 'Project Info', array($this, 'show_project_meta_box'), 'project');
	}

	public function save_post($post_id) {
		
		//Member Meta
		if(isset($_POST['member_title']))
			update_post_meta($post_id, 'member_title', $_POST['member_title']);

		if(isset($_POST['member_phone']))	
			update_post_meta($post_id, 'member_phone', $_POST['member_phone']);

		if(isset($_POST['member_facebook']))	
			update_post_meta($post_id, 'member_facebook', $_POST['member_facebook']);

		if(isset($_POST['member_twitter']))	
			update_post_meta($post_id, 'member_twitter', $_POST['member_twitter']);

		if(isset($_POST['member_linkedin']))	
			update_post_meta($post_id, 'member_linkedin', $_POST['member_linkedin']);

		//Project Meta
		if(isset($_POST['project_type']))
			update_post_meta($post_id, 'project_type', $_POST['project_type']);

		if(isset($_POST['project_date']))
			update_post_meta($post_id, 'project_date', $_POST['project_date']);

	}

	// Team Member meta box
	public function show_member_meta_box($post){
		$member_title = get_post_meta($post->ID, 'member_title', true);
		$member_phone = get_post_meta($post->ID, 'member_phone', true);
		$member_facebook = get_post_meta($post->ID, 'member_facebook', true);
		$member_twitter = get_post_meta($post->ID, 'member_twitter', true);
		$member_linkedin = get_post_meta($post->ID, 'member_linkedin', true);
?>
		<ul>
			<li>
				<label for="member_title">Team Position</label>
				<input type="text" id="member_title" class="widefat" name="member_title" value="<?php echo $member_title; ?>">				
			</li>
			<li>
				<label for="member_phone">Phone</label>
				<input type="text" id="member_phone" class="widefat" name="member_phone" value="<?php echo $member_phone; ?>">				
			</li>
			<li>
				<label for="member_facebook">Facebook</label>
				<input type="text" id="member_facebook" class="widefat" name="member_facebook" value="<?php echo $member_facebook; ?>">				
			</li>
			<li>
				<label for="member_twitter">Twitter</label>
				<input type="text" id="member_twitter" class="widefat" name="member_twitter" value="<?php echo $member_twitter; ?>">				
			</li>
			<li>
				<label for="member_linkedin">LinkedIn</label>
				<input type="text" id="member_linkedin" class="widefat" name="member_linkedin" value="<?php echo $member_linkedin; ?>">				
			</li>
		</ul>

<?php	}

	// Project Meta Box
	public function show_project_meta_box($post){
		$project_type = get_post_meta($post->ID, 'project_type', true);
		$project_date = get_post_meta($post->ID, 'project_date', true);
?>
		<ul>
			<li>
				<label for="project_type">Type</label>
				<input type="text" id="project_type" class="widefat" name="project_type" value="<?php echo $project_type; ?>">				
			</li>
			<li>
				<label for="project_date">Date</label>
				<input type="text" id="project_date" class="widefat" name="project_date" value="<?php echo $project_date; ?>">				
			</li>
		</ul>

<?php	}

	//Register AJAX
	public function register_ajax(){
		$service = new \Service(); 

        add_action("wp_ajax_get_posts", array($service, 'get_posts'));
        add_action("wp_ajax_nopriv_get_posts", array($service, 'get_posts'));

        add_action("wp_ajax_get_gallery", array($service, 'get_gallery'));
        add_action("wp_ajax_nopriv_get_gallery", array($service, 'get_gallery'));
	}

}

$detpTheme = new Theme();