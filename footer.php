



	
	

	
<script>
function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}

$( document ).ready(function() {




// inf scroll with crazy footer insertion...calculates height of the page, when inf scroll is done (404 error for next page to get) and adds a div to the html.
// really hacky, but didnt work with just js and/or css
// to add: on window resize: re caclculate doc hieght and move footer.....

$('#container').infinitescroll({
                navSelector  : "div.navigation",
                debug : true, 
				bufferPx	 : 200,           
                nextSelector : "div.navigation a:first",    
                itemSelector : "#container .post",
                donetext     : "where done",
                errorCallback: function(){    var originalHeight = $( document ).height(); $( window ).resize(function() {console.log($( document ).height()); $( "#test" ).css( "margin-top", originalHeight-$( document ).height() );});   $('body').append('<div id="test" style="margin-top:'+getDocHeight()+';">footer</div>');  },
                loading          : {
                        img             : "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",
                        msgText         : " ",
                        finishedMsg     : "done"
                }
       
                    }); 


});


</script>


<?php wp_footer(); ?>  <!-- needed for not breaking plugins? -->
</body>

</html>
