<?php

// function cs_post_columns($columns) {
//   $columns = array ( 
//     'cb' => "<input type='checkbox' />", 
//     'title' => '제목', 
//     'taxonomy-cs_subject' => '주제',  
//     'date' => '날짜', 
//   );


//   return $columns ;
// }

// function cs_posts_custom_column($column, $post_id) {

//   switch($column){
//     case 'cover' : 
      
//       $cover_id = get_post_meta($post_id, 'cover_id', true);
//       if(!$cover_id){
//         break;
//       }

//       $imgUrl = wp_get_attachment_image_url($cover_id);

//       if(!$imgUrl){
//         break;
//       }

//       echo "<img src='{$imgUrl}'>";
      
//       break;
//   }
// }


// add_filter('manage_cs_posts_columns', 'cs_post_columns');

// add_action('manage_cs_posts_custom_column', 'cs_posts_custom_column', 10, 2);