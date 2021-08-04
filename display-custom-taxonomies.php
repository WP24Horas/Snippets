<?php
// Get the taxonomy's terms
$terms = get_terms(
    array(
        'taxonomy'   => 'your-taxonomy', //name of taxonomy
        'hide_empty' => false, //Show all
    )
);

// Check if any term exists
if ( ! empty( $terms ) && is_array( $terms ) ) {
    // Run a loop and print them all
    foreach ( $terms as $term ) { ?>
        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
            <?php echo $term->name; ?>
        </a><?php
    }

    // Alternative: if categories exist, display the dropdown
	echo '<select name="categoryfilter"><option value="">Select category...</option>';
	foreach ( $terms as $term ) :
		echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as an option value
	endforeach;
	echo '</select>';

} 