<?php

function wp24h_save_db($cf7){

    $submission = WPCF7_Submission::get_instance();

    if($submission){
        $posted_data = $submission->get_posted_data();
    }

    if($cf7->id() == 55){

        $con = mysqli_connect('localhost','username','passoword','dbname');
        
        //Define fields e values with '?'
        $sql = "INSERT INTO tablename (field1,field2) VALUES (?, ?)";

        if($stmt = mysqli_prepare($con, $sql)){

            //params
            mysqli_stmt_bind_param($stmt, 'ss', $param_nome, $param_email);

            //Examples
            $param_nome = $posted_data['your-name'];
            $param_email = $posted_data['your-email'];

            if(mysqli_stmt_execute($stmt)){

                echo '';

            }

        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);


    }

}
add_action('wpcf7_before_send_mail','wp24h_save_db', 10, 3);
