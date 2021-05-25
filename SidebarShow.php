//**********************************************************
// Shortcode: Vertical Buttons for sidebars or widgets
// Syntax:    [sidebarshow name="Page Name"]
// Output:    Vertical list of buttons
//**********************************************************  
function sidebar_shortcode( $atts ) {

	$catPages = shortcode_atts( array(
		array(
			'page' => 'First',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/first/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Second',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/second/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Third',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/third/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Forth',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/forth/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Fifth',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/fifth/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Sixth',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/sixth/',
			'picurl'=>'/pictures/option1.png'
		),
		array(
			'page' => 'Seventh',
			'label' =>'add-on label',
			'pgurl' =>'/sub-menu/seventh/',
			'picurl'=>'/pictures/option1.png'
		)
	), $atts);

	$url_start_part = 'https://mydomain.com';	
	
	
	$element_pos = array_search($atts['page'], array_column($catPages, 'page'));
	$output ='';
    for ($x = 0; $x < count($catPages); $x++) {
		if ($x != $element_pos ) {
           $output .= '<p><a href="'. $url_start_part.$catPages[$x]['pgurl']. '">';
           $output .= '<span class="btnSide"><img class="btnSidePic" src="';
           $output .= $url_start_part. $catPages[$x]['picurl']. '" alt="';
           $output .= $catPages[$x]['page'];
           $output .= '"/><br/><span class="btnSideText">';
           $output .= $catPages[$x]['page'].'</span></span></a></p>';	
		}
	}
    return $output;
}
add_shortcode( 'sidebarshow', 'sidebar_shortcode' );





function getCurrentYear() {
	return date('Y');
}
add_shortcode('current_year', 'getCurrentYear');

/**
* This section makes posts in the admin filterable by the author.
*/
add_action('restrict_manage_posts', 'filter_by_author');
function filter_by_author() {
    $params = array(
		'show_option_all' => 'All Users',
        'name' => 'author',
        'role__in' => array('author','editor','administrator')
    );
    if ( isset($_GET['user']) ) {
        $params['selected'] = $_GET['user'];
    }
    wp_dropdown_users( $params );
}