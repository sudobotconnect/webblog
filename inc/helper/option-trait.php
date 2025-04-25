<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait OptionsTrait {

  /**
   * @abstract get theme mod
   * return boolean
   */
  public static function get_axil_options($name) {
      $modval = get_theme_mod($name);
      if (!empty($modval)) {
          if (!is_array($modval))
              $newval = unserialize($modval);
          else
              $newval = $modval;
          //var_dump($modval);
          //unserialize($modval);
          return $newval;
      }
      return false;
      
  }

  /**
   * @abstract get theme options
   * return object
   */
  public static function axil_get_options(){
    
    include AXIL_FREAMWORK_RI . 'predefined-data.php';
    $papr_optionss = json_decode( $predefined_data, true );
    if ( class_exists( 'Redux' ) ) {  
       global $options;
    $papr_optionss = wp_parse_args( $GLOBALS['papr_options'], $options );
    }
    return $papr_optionss;
  }

  /**
   * @abstract get post object
   * return object
   */
  public static function axil_get_post_object(){
      global $post;
      return $post;
  }

  /**
   * @abstract get current user info
   * return array
   */

  public static function axil_get_current_user_var(){
      return wp_get_current_user();
  }

}
