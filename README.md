# rp-ajax-post-loadmore

A WordPress plugin which gives shortcode for ajax post loadmore on scroll feature with 
**[rpAjaxPostLoadmore posts_container='#main' single_post_container='.post']** shortcode. 
Just put this line bellow post loop. Replace `#main` with all posts container class or id and `.post` with single post container Class. 
**<?php echo do_shortcode("[rpAjaxPostLoadmore posts_container='#main' single_post_container='.post']");?>**

**Contributors:**      [rahulppatidar] <https://github.com/rahulppatidar/>  
**Plugin Name:**       Rp Ajax Post Loadmore 
    
**Tags:**              Load More, Load More Post, Ajax Load More, Ajax Load More Post, On Scroll Load More, On Scroll Ajax Load More,
**Author:**            rahulppatidar  
**License:**           GPL-3.0+ 		
**License URI:**       https://www.gnu.org/licenses/gpl-3.0.en.html 			

##Synopsis

This is an easy way to add ajax load more on scroll functionality on WordPress post loop page.

###Features

* Add Ajax Load more functionality.
* Work with custom post type as well.


##Installation
1. Upload `rp-ajax-post-loadmore` folder to your `/wp-content/plugins/` directory.
2. Activate the plugin from Admin > Plugins menu.
3. Once activated then use `[rpAjaxPostLoadmore posts_container='#main' single_post_container='.post']` shortcode below on post loop page.
4. Replace `#main` for posts_container with all posts container id or class. Replace  `.post` for single_post_container with single post container class.
5. That is it. Enjoy not ajax load more on scroll.

#Contribution

Contributors are always welcome.
To contribute, just send a pull request.


[https://github.com/rahulppatidar/rp-ajax-post-loadmore](https://github.com/rahulppatidar/rp-ajax-post-loadmore)  