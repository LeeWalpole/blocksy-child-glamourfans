<?php
// Function to get the hero template name and CSS file path
function get_hero_resources() {
    // Get the current post ID
    $post_id = get_the_ID();
    
    // Get the value of the hero_template custom field
    $hero_template = get_post_meta($post_id, 'hero_template', true);


    $template_name = 'hero-simple';  // default template name
    switch ($hero_template) {
        case 'feature':
            $template_name = 'hero-feature';
            break;
        case 'simple':
            $template_name = 'hero-simple';
            break;
            case 'guide':
                $template_name = 'hero-guide';
                break;
        case 'standard':
            $template_name = 'hero-standard';
            break;
        // no default case needed since $template_name is already set to the default value
    }

    // Build the path to the CSS file based on the template name
    $global_hero_css = get_stylesheet_directory() . '/hero/' . $template_name . '.css';
    $css_file_path = get_stylesheet_directory() . '/hero/hero.css';
    
    return array($template_name, $css_file_path, $global_hero_css);
}

// Function to get the hero template
function get_hero_template() {
    list($template_name, $css_file_path) = get_hero_resources();
    include get_stylesheet_directory() . '/hero/' . $template_name . '.php';
//    include get_stylesheet_directory() . '/hero/hero-all.php';
}

// Function to add hero inline styles based on the template 
function inline_hero_styles() {
    list($template_name, $css_file_path, $global_hero_css) = get_hero_resources();

    // Check if the global CSS file exists
    if (file_exists($global_hero_css)) {
        // Read the contents of the global CSS file
        $global_css_contents = file_get_contents($global_hero_css);
        echo '<style>' . $global_css_contents . '</style>';
    }

    // Check if the specific CSS file exists
    if (file_exists($css_file_path)) {
        // Read the contents of the specific CSS file
        $css_contents = file_get_contents($css_file_path);

        // Output the CSS contents inline within a <style> block
        echo '<style>' . $css_contents . '</style>';
    } else {
        // Optionally handle the case where the CSS file doesn't exist
        // e.g., log an error or output a default style
    }
}


// Hook the get_hero_template function into the blocksy:single:content:top action hook
add_action('blocksy:single:content:top', 'get_hero_template');

// Hook the inline_hero_styles function into the wp_head action hook
add_action('wp_head', 'inline_hero_styles');

?>