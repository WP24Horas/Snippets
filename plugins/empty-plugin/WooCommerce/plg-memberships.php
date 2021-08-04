<?php

/*
WooCommerce Memberships Function Reference
https://docs.woocommerce.com/document/woocommerce-memberships-function-reference/
*/

function get_memberships_by_user(){

    // get all active memberships for a user; 
    // returns an array of active user membership objects
    
    //Get ID 
    $user_id = get_current_user_id();

    //Optional: Memberships by status
    $args = array( 
        'status' => array( 'active', 'complimentary', 'pending' ),
    );  

    /*
    @since 1.0.0 
    @param int $user_id Optional, defaults to current user 
    @param array $args Optional arguments 
    return \WC_Memberships_User_Membership[]|null array of user memberships
    */    
    $active_memberships = wc_memberships_get_user_memberships( $user_id, $args );

}

function get_memberships_plans(){

    // get membership plans
    /*
    @  since 1.0.0 
    @param array $args Optional array of arguments, same as for get_posts() 
    @return \WC_Memberships_Membership_Plan[]
    Main function for returning all available membership plans.
    */
    $plans = wc_memberships_get_membership_plans();

    // set a flag
    $active_member = array();    

    // check if the member has an active membership for any plan
    foreach ( $plans as $plan ) {
        $active = wc_memberships_is_user_active_member( get_current_user_id(), $plan );
        array_push( $active_member, $active );
    }

    //To test
    if( in_array( true,$active_member ) )
	{
		echo "Has active plan!";
	}

}