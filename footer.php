



<div class="clear"></div>  
	

	
<script>

var templateDir = "<?php bloginfo('template_directory') ?>";

$( document ).ready(function() {

var originalHeight = $( document ).height(); 

$( window ).resize(function() { 
    //console.log( ($( document ).height()-originalHeight) );  
    //$('#test').css("margin-top",+($( document ).height()-originalHeight));    
});  

// inf scroll with crazy footer insertion...calculates height of the page, when inf scroll is done (404 error for next page to get) and adds a div to the html.
// really hacky, but didnt work with just js and/or css
// hardcoded footer url , argh...

$('#container').infinitescroll({
                navSelector  : "div.navigation",
                debug : false, 
				bufferPx	 : 300,           
                nextSelector : "div.navigation a:first",    
                itemSelector : "#container .post",
                donetext     : "where done",
                errorCallback: function(){      $('body').append('<div id="test" style="margin-top:'+(originalHeight)+';"></div>'); $( "#test" ).load( templateDir+"/footer-content.php" ); },
                loading          : {
                        img             : "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",
                        msgText         : " ",
                        finishedMsg     : " "
                }
       
                    }); 






});


</script>


<?php wp_footer(); ?>  <!-- needed for not breaking plugins? -->
</body>

</html>
