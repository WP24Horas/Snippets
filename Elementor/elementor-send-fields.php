<?php
add_action( 'elementor_pro/forms/new_record', function( $record, $handler ) {

    $raw_fields = $record->get( 'fields' );
    $fields = [];
    foreach ( $raw_fields as $id => $field ) {
        $fields[ $id ] = $field['value'];
    }
    wp_remote_post( 'http://domain/script/fields.php', [
        'body' => $fields,
    ]);

}, 10, 2 );
