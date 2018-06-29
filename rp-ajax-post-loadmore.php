<?php
/*
* Plugin Name: Rp Ajax Post Loadmore
* Author: RP
* Description: A plugin that give shortcode for ajax post loadmore feature on scroll with <strong>[rpAjaxPostLoadmore post_container='#main' single_post_container='.post']</strong> shortcode. Just put this line bellow post loop. Replace '#main' with all posts container class or id and '.post' with single post container Class. <br><strong><?php echo do_shortcode("[rpAjaxPostLoadmore post_container='#main' single_post_container='.post']");?></strong>
* Version: 1.0
*/



function rpAjaxPostLoadmoreTemplate($arg){ 
ob_start();
$plugin_path=plugin_dir_url( __FILE__ );
?>
<div class="rp-loader-img">
  	 <!-- <img src="<?php echo $plugin_path;?>img/bars.svg"> -->

<?php 
$image_path=file_get_contents($plugin_path.'img/bars.svg');
echo $image_path;
?>




</div>
<div class="rpPostStatus"></div>
<style type="text/css">
.rp-loader-img {
    position: fixed;
    top: 50%;
    width: 100%;
    left: 45%;
    display: none;
}
.rp-loader-img img{
	margin: auto;
    max-width: 100px;
}
.pagination{
  display: none;
}
</style>

<script type="text/javascript">
	jQuery(document).ready(function($){
                 
var currentPage = 2;
var containerItemSelector =<?php echo '"'.$arg['post_container'].'"'; ?>;
var postItemSelector = <?php echo '"'.$arg['single_post_container'].'"'; ?>;
var hasMore=true;

 
$(window).scroll(function() {
     
if($(window).scrollTop() + $(window).height() == $(document).height()) {

if(hasMore){
jQuery('.rp-loader-img').show();
    $.ajax({    
      type: "GET",
      url: "<?php echo $_SERVER["REQUEST_URI"] ?>?paged=" + currentPage,
      data: "",
      success: function(results) {
      
      	jQuery('.rp-loader-img').hide();
        
         $('body, html').animate({
         scrollTop: '-=600'
    }, 500);
        var item = $(containerItemSelector + " > " + postItemSelector, results);
        item.each(function() {
          $(containerItemSelector).append($(this));
        });
       currentPage++;
 
      },
      error: function(results) {

      	jQuery('.rp-loader-img').hide();
      	hasMore=false; 

        if(results.status == 404) {
          $(".rpPostStatus").html('No more posts to show...');
        }
        else {
          $(".rpPostStatus").html('Error retrieving posts...');
        }
      }
 
    });

	}

  }

});

 
});

</script>



<?php 
echo ob_get_clean();
} ?>
<?php

function rpAjaxPostLoadmore( $atts ) {
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $arg = shortcode_atts( array(
        'post_container' => '#main',
        'single_post_container'=> '.post'
    ), $atts );
    rpAjaxPostLoadmoreTemplate($arg);
}



function rpAjaxPostLoadmore_register_shortcodes(){
  add_shortcode( 'rpAjaxPostLoadmore', 'rpAjaxPostLoadmore' );
}

add_action( 'init', 'rpAjaxPostLoadmore_register_shortcodes');






