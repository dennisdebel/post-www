



	<!--<?php wp_footer(); ?>-->
	
	<!-- Don't forget analytics -->
	
<script>
$( document ).ready(function() {

$('#container').infinitescroll({
                navSelector  : "div.navigation", 
				bufferPx	 : 200,           
                nextSelector : "div.navigation a:first",    
                itemSelector : "#container .post",
                loading          : {
                        img             : "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",
                        msgText         : " ",
                        finishedMsg     : "done"
                }
       
                    }); });
</script>

</body>

</html>
