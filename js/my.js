$(document).ready(function(){

function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
        // Alternatively you could use:
        // (new Image()).src = this;
    });
}
preload([
    '../images/colbg.png',
    '../images/colbgend.png',
    '../images/hr-fat-l.png',
    '../images/hr-fat-r.png',
    '../images/logo.png',
    '../images/post-meta-drip.png',
    '../images/sale.png',
    '../images/drip.png'
]);

//icecream stick bg adjust
	var col1height = $('#col1').height();
	//col1height = col1height - 1000;Gmail
	 //console.log(col1height);
	$('.col1bg').css('height', col1height-600);
	$('.col1bg').css('margin-top',  -1*(col1height-800));

	var col2height = $('#col2').height();
	//col1height = col1height - 1000;
	 //console.log(col1height);
	$('.col2bg').css('height', col2height-500);
	$('.col2bg').css('margin-top', -1*(col2height-870));

	var col3height = $('#col3').height();
	//col1height = col1height - 1000;
	 //console.log(col1height);
	$('.col3bg').css('height', col3height-500);
	$('.col3bg').css('margin-top',  -1*(col3height-830));

	
	/* front page badge (first post in shop will get badge)*/ 
	
	//$('#scrollabile').css('visibility', 'hidden');//fix fucked col3
	
	$('.onsale:first').css('height', '100px');
	$('.onsale:first').css('width', '100px');
	$('.onsale:first').css('top', '0px');
	$('.onsale:first').css('right', '0px');
	$('.onsale:first').css('position', 'absolute');
	$('.onsale:first').css("background-image", "url(wp-content/themes/dillydallycream/images/sale.png)"); 
	 

	 //shoppingcart right menu adjust
	var shopmargin = $('#rightmenu').height();
	$('#rightmenu').css('margin-bottom',  '215px');
	if (shopmargin > 10) {
		$('#rightmenu').css('margin-bottom',  '216px');
	} else {
		$('#rightmenu').css('margin-bottom',  '232px');
	}

	

	//fix fucked col3 (aka responsive)
	var offset = $('#col2').offset();
	$('#col3').animate({left:offset.left+320}, 5);
	//$('#scrollabile').css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0},2000);
		
	//make singlepage/posts pictures fill their divs
	 $('#single_content').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    	});


	$('[title]').removeAttr('title'); //disable tooltips!(remove title atr)


	var hashes = window.location.href.slice(window.location.href.indexOf('#art_') + 1)
		
	var differenza = $("#scrollabile").height()-$("#col1").height();
	var	differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
	var percentuale;
	var percentuale_old = new Array();
	var in_scorrimento=false;
	var in_dettaglio=false;
	
	var selezionato=false;
	var cliccato;
	
	$numero_totale=0;
	$numero_corrente=0;
		
	/*Cufon.replace('h1');
	Cufon.replace('h2');
	Cufon.replace('h3');*/
	
    
    /* re-appear scroll helper */
var interval = 1;

setInterval(function(){
   if(interval == 15){ /* this is the user idle time out in sec */
         // $(".init-l,.init-r").animate({opacity:1}, 50)
          $(".whitespace").slideDown(1000);
       interval = 1; 
   }
   interval = interval+1;
    console.log(interval);
},1000);


$(document).bind('mousemove keypress scroll', function() {
    interval = 1; 
    });
/* re-appear scroll helper */

/* page fade */

$(".fade").fadeIn(800);


    $("#col4").slideDown(2500);
    $(".drip").slideDown(2400);
    $('.drip').animate({top:"+=10"},1500);
    //$(".sitetitleover").slideDown(2500);
   //  $(".sitetitle").mouseover(function(){$(".sitetitleover").fadeIn(500)});
   //$(".sitetitle").mouseout(function(){$(".sitetitleover").fadeOut(500)});  
    $(".sitetitle").mouseover(function(){
        $(".sitetitle").html("Dennis<br>De<br>Bel")
       //$('.drip').css("display","inline");
       // $('.drip').animate({top:"+=10"},1500);
        

        //$('.drip').fadeOut(50);
        });
        
        $(".sitetitle").mouseout(function(){
        $(".sitetitle").html("Dilly<br>Dally<br>Foundry")
        
      //   $('.drip').animate({top:"-=500"});
       // $('.drip').css("display","none");
        });



    $("a").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        $("body").fadeOut(500, redirectPage);      
    });
         
    function redirectPage() {
        window.location = linkLocation;
    }
 
/* page fade */	

	$(function(){
      $(".tweet").tweet({
        avatar_size: 32,
        count: 5,
        username: "lab81creative",
		loading_text: "loading tweets...",
		template: "{text} {time}"
      });
    });
	
	
	differenza = $("#scrollabile").height()-$("#col1").height();
	differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
	
	$("#navigazione").fadeOut(0)
	$('.nero').css("opacity",0)
	
	$("#selezione>li.tutto").click(function(){
		$("#col2>div."+cliccato).stop().fadeOut(500, function(){
			  $("#col2>div").fadeIn(500)
			  differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
		})
		
		$("#selezione>li").removeAttr('id')
		$(this).attr('id', 'selezionato')
		
		selezionato=false;
	})
	
	$("#selezione>li.select").click(function(){
		if(in_dettaglio==false){
			if(selezionato==false){
				selezionato=true;
				cliccato=$(this).html();
				$("#col2>div").stop().fadeOut(500, function(){
					$("#col2>div."+cliccato).fadeIn(500)
					differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
				})
			}else{
				var cliccato_2=$(this).html();
				$("#col2>div."+cliccato).stop().fadeOut(500, function(){
					cliccato=cliccato_2;
					$("#col2>div."+cliccato_2).fadeIn(500)
					differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
					
				})
			}
			
			$("#selezione>li").removeAttr('id')
			$(this).attr('id', 'selezionato')
		}else{
			cliccato=$(this).html();
			$(".frame_via").fadeOut(250)
			$("#navigazione").fadeOut(250)
			$('#dettaglio').animate({opacity:0}, 250, function(){
				$("#fisso").css("width", "560px")
				$('#dettaglio').unload();
				$("#col1").css("display", "block");
				$("#col1").animate({opacity:1}, 250, function(){
					$("#col2").css("display", "block");
					$("#col2").animate({opacity:1}, 250)
					
					$("#col2>div").stop().fadeOut(0)
					$("#col2>div."+cliccato).fadeIn(0)
					differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
				});
			});
			in_dettaglio=false;
			selezionato=true;
			
			$("#selezione>li").removeAttr('id')
			$(this).attr('id', 'selezionato')
		}
	})
	
	$("#close").hover(function(){
		$(this).find('img').stop().animate({opacity:.2}, 250)
	},function(){
		$(this).find('img').stop().animate({opacity:1}, 250)
	});
	
	$("#next").hover(function(){
		$(this).find('img').stop().animate({opacity:.2}, 250)
	},function(){
		$(this).find('img').stop().animate({opacity:1}, 250)
	});
	
	$("#prev").hover(function(){
		$(this).find('img').stop().animate({opacity:.4}, 250)
	},function(){
		$(this).find('img').stop().animate({opacity:1}, 250)
	});
	
	//animate image hover
	$(".thumb").hover(function(){
		$(this).find('img').stop().animate({opacity:0.8}, 250)
	},function(){
		$(this).find('img').stop().animate({opacity:1}, 250)
	});
	
	$("#video").hover(function(){
		$(this).find('.nero').stop().animate({opacity:1}, 250)
	},function(){
		$(this).find('.nero').stop().animate({opacity:0}, 250)
	});
	
	$("a.dettaglio").hover(function(){
		$(this).find('.nero').stop().animate({opacity:1}, 250)
	},function(){
		$(this).find('.nero').stop().animate({opacity:0}, 250)
	});

	
	$("a.dettaglio").click(function(){
		in_dettaglio=true;
		$numero_corrente=$(this).attr("href").replace('#art_','');
		$numero_totale=$(this).attr("name");
		
		if($numero_corrente==$numero_totale){
			$numero_precedente=Number($(this).attr("href").replace('#art_',''))-1;
			$("a#next").attr("href", "#art_"+$numero_totale)
			$("a#prev").attr("href", "#art_"+$numero_precedente)		
		}else if($numero_corrente==1){
			$numero_successivo=Number($(this).attr("href").replace('#art_',''))+1;
			$("a#next").attr("href", "#art_"+$numero_successivo)
			$("a#prev").attr("href", "#art_"+1)
		}else if($numero_corrente<$numero_totale && $numero_corrente>1){
			$numero_successivo=Number($numero_corrente)+1;
			$numero_precedente=Number($numero_corrente)-1;
					
			$("a#next").attr("href", "#art_"+$numero_successivo)
			$("a#prev").attr("href", "#art_"+$numero_precedente)
		}
		
		$('#dettaglio').css("opacity", 0)
		$("#col2").animate({opacity:0}, 250, function(){
			$("#col1").animate({opacity:0}, 250, function(){
				$("#fisso").css("width", "280px")
				$("#col1").css("display", "none")
				$("#col2").css("display", "none")
									
				$('#dettaglio').load('dettaglio.php?id='+ $numero_corrente, function(){
					$('#dettaglio').animate({opacity:1}, 250)
				})
				
				$("a#next").show();
				$("a#prev").show();
				
				$("#navigazione").fadeIn(250)
			})	
		})
		//return false;
	})
		
	$("#video").click(function(){
		in_dettaglio=true;
		
		$('#dettaglio').css("opacity", 0)
		$("#col2").animate({opacity:0}, 250, function(){
			$("#col1").animate({opacity:0}, 250, function(){
				$("#fisso").css("width", "280px")
				$("#col1").css("display", "none")
				$("#col2").css("display", "none")
				
				$('#dettaglio').load('showreel.php', function(){
					/*Cufon.replace('h1');
					Cufon.replace('h2');
					Cufon.replace('h3');*/
					$('#dettaglio').animate({opacity:1}, 250)
				})
				
				$("a#next").hide();
				$("a#prev").hide();
				
				$("#navigazione").fadeIn(250)
			})	
		})
		//return false;
	})	
	
	if(hashes=="http://www.lab81.com/" || hashes=="http://www.lab81.com/#" || hashes=="http://lab81.com/" || hashes=="http://localhost:8888/" || "http://www.lab81.com/?utm_source=LAB81+Creative+Studio&utm_campaign=46783a881a-ALIAH_SAVE_THE_DATE3_26_2012&utm_medium=email"){
		$('#icona').css("top", $("#scrollabile").height()/2-90)
	}else{
		$numero_corrente=hashes.replace('art_','');
		
		$numero_totale=$(this).attr("name");
		
		$('#dettaglio').css("opacity", 0)
		$("#col2").css("opacity", 0)
		$("#col1").css("opacity", 0)
		
		$("#fisso").css("width", "280px")
		$("#col1").css("display", "none")
		$("#col2").css("display", "none")
		
		$('#dettaglio').load('dettaglio.php?id='+ $numero_corrente, function(){
			/*Cufon.replace('h1');
			Cufon.replace('h2');
			Cufon.replace('h3');*/
			$('#dettaglio').animate({opacity:1}, 250)
		})
		
		$("#navigazione").fadeIn(250)
	}
	
	$("a#prev").click(function(){
		if($numero_corrente>1){
			$numero_successivo=Number($numero_corrente)+1;
			$numero_precedente=Number($numero_corrente)-1;
					
			$("a#next").attr("href", "#art_"+$numero_successivo)
			$("a#prev").attr("href", "#art_"+$numero_precedente)
		}else{
			
		}
				
		if($numero_corrente>1){
			$numero_corrente--;
			$('#dettaglio').animate({opacity:0}, 250, function(){
				$('#dettaglio').unload();
				$('#dettaglio').load('dettaglio.php?id='+ $numero_corrente, function(){
					/*Cufon.replace('h1');
					Cufon.replace('h2');
					Cufon.replace('h3');*/
					$('#dettaglio').animate({opacity:1}, 250)
				});
			});
		}
		//return false;
	})
	
	$("a#next").click(function(){
		if($numero_corrente<$numero_totale){
			$numero_successivo=Number($numero_corrente)+1;
			$numero_precedente=Number($numero_corrente)-1;
					
			$("a#next").attr("href", "#art_"+$numero_successivo)
			$("a#prev").attr("href", "#art_"+$numero_precedente)		
		}else{
			
		}
				
		if($numero_corrente<$numero_totale){
			$numero_corrente++;
			$('#dettaglio').animate({opacity:0}, 250, function(){
				$('#dettaglio').unload();
				$('#dettaglio').load('dettaglio.php?id='+ $numero_corrente, function(){
					/*Cufon.replace('h1');
					Cufon.replace('h2');
					Cufon.replace('h3');*/					
					$('#dettaglio').animate({opacity:1}, 250)
				});
			});
		};
		//return false;
	})
	
	$("a#close").click(function(){
		$(".frame_via").fadeOut(250)
		$("#navigazione").fadeOut(250)
		$('#dettaglio').animate({opacity:0}, 250, function(){
			$("#fisso").css("width", "560px")
			$('#dettaglio').unload();
			$("#col1").css("display", "block");
			$("#col1").animate({opacity:1}, 250, function(){
				$("#col2").css("display", "block");
				$("#col2").animate({opacity:1}, 250)
				in_dettaglio=false;
			});
		});
		//return false;
	});
	
	numero_test=0;
	
/* my codespacelalall steal me */

	$("#scrollabile").scroll(function(){
		percentuale = $("#scrollabile").scrollTop()/differenza_scorrimento;
		$("#col1").animate({"top":differenza*percentuale},5)
        $("#col3").animate({"top":differenza*(percentuale*3)+100},5)
        //$("#col4").animate({"top":differenza*percentuale},50)
		//$(".init-l,.init-r").animate({opacity:0}, 150);
        //$(".init-r").animate({opacity:0}, 350);
        $(".whitespace").slideUp(1000);
        
        
        
		if(numero_test==1){
			$("#bianco_utilizzo").animate({opacity:0}, 250, function(){
				//$("#bianco_utilizzo").hide();
				$("#col2").remove("#bianco_utilizzo");
				$("#bianco_utilizzo").css("display","none");
				$("#bianco_utilizzo").css("visibility","hidden")
			});
		}
		
		numero_test++;
		//$("#col4").html(percentuale + " / " + differenza + " / " + differenza_scorrimento + " / " + $("#scrollabile").scrollTop())
	});
	
	$(window).resize(function(){
		//make col3 responsive
		var offset = $("#col2").offset();
		$("#col3").animate({left:offset.left+320}, 5);


		differenza = $("#scrollabile").height()-$("#col1").height();
		differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
		
		$('#icona').css("top", $("#scrollabile").height()/2-90)
	});
	
	jQuery.fn.oneFingerScroll = function() {
		var scrollStartPos = 0;
		$(this).bind('touchstart', function(event) {
			// jQuery clones events, but only with a limited number of properties for perf reasons. Need the original event to get 'touches'
			var e = event.originalEvent;
			scrollStartPos = $(this).scrollTop() + e.touches[0].pageY;
			//e.preventDefault();
		});
		$(this).bind('touchmove', function(event) {
			var e = event.originalEvent;
			$(this).scrollTop(scrollStartPos - e.touches[0].pageY);
			//e.preventDefault(); (this disables normal pinch-zoom when on)
		});
		return this;
	};
	
	//usage
	$('#scrollabile').oneFingerScroll();
	
	
	$.fn.tweet = function(o){
    var s = $.extend({
      username: null,                           // [string or array] required unless using the 'query' option; one or more twitter screen names
      list: null,                               // [string]   optional name of list belonging to username
      favorites: false,                         // [boolean]  display the user's favorites instead of his tweets
      query: null,                              // [string]   optional search query
      avatar_size: null,                        // [integer]  height and width of avatar if displayed (48px max)
      count: 3,                                 // [integer]  how many tweets to display?
      fetch: null,                              // [integer]  how many tweets to fetch via the API (set this higher than 'count' if using the 'filter' option)
      page: 1,                                  // [integer]  which page of results to fetch (if count != fetch, you'll get unexpected results)
      retweets: true,                           // [boolean]  whether to fetch (official) retweets (not supported in all display modes)
      intro_text: null,                         // [string]   do you want text BEFORE your your tweets?
      outro_text: null,                         // [string]   do you want text AFTER your tweets?
      join_text:  null,                         // [string]   optional text in between date and tweet, try setting to "auto"
      auto_join_text_default: "i said,",        // [string]   auto text for non verb: "i said" bullocks
      auto_join_text_ed: "i",                   // [string]   auto text for past tense: "i" surfed
      auto_join_text_ing: "i am",               // [string]   auto tense for present tense: "i was" surfing
      auto_join_text_reply: "i replied to",     // [string]   auto tense for replies: "i replied to" @someone "with"
      auto_join_text_url: "i was looking at",   // [string]   auto tense for urls: "i was looking at" http:...
      loading_text: null,                       // [string]   optional loading text, displayed while tweets load
      refresh_interval: null ,                  // [integer]  optional number of seconds after which to reload tweets
      twitter_url: "twitter.com",               // [string]   custom twitter url, if any (apigee, etc.)
      twitter_api_url: "api.twitter.com",       // [string]   custom twitter api url, if any (apigee, etc.)
      twitter_search_url: "search.twitter.com", // [string]   custom twitter search url, if any (apigee, etc.)
      template: "{avatar}{time}{join}{text}",   // [string or function] template used to construct each tweet <li> - see code for available vars
      comparator: function(tweet1, tweet2) {    // [function] comparator used to sort tweets (see Array.sort)
        return tweet2["tweet_time"] - tweet1["tweet_time"];
      },
      filter: function(tweet) {                 // [function] whether or not to include a particular tweet (be sure to also set 'fetch')
        return true;
      }
    }, o);

    // See http://daringfireball.net/2010/07/improved_regex_for_matching_urls
    var url_regexp = /\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»""'']))/gi;

    // Expand values inside simple string templates with {placeholders}
    function t(template, info) {
      if (typeof template === "string") {
        var result = template;
        for(var key in info) {
          var val = info[key];
          result = result.replace(new RegExp('{'+key+'}','g'), val === null ? '' : val);
        }
        return result;
      } else return template(info);
    }
    // Export the t function for use when passing a function as the 'template' option
    $.extend({tweet: {t: t}});

    function replacer (regex, replacement) {
      return function() {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(regex, replacement));
        });
        return $(returning);
      };
    }

    $.fn.extend({
      linkUrl: replacer(url_regexp, function(match) {
        var url = (/^[a-z]+:/i).test(match) ? match : "http://"+match;
        return "<a href=\""+url+"\">"+match+"</a>";
      }),
      linkUser: replacer(/@(\w+)/gi, "@<a href=\"http://"+s.twitter_url+"/$1\">$1</a>"),
      // Support various latin1 (\u00**) and arabic (\u06**) alphanumeric chars
      linkHash: replacer(/(?:^| )[\#]+([\w\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff\u0600-\u06ff]+)/gi,
                         ' <a href="http://'+s.twitter_search_url+'/search?q=&tag=$1&lang=all'+((s.username && s.username.length == 1) ? '&from='+s.username.join("%2BOR%2B") : '')+'">#$1</a>'),
      capAwesome: replacer(/\b(awesome)\b/gi, '<span class="awesome">$1</span>'),
      capEpic: replacer(/\b(epic)\b/gi, '<span class="epic">$1</span>'),
      makeHeart: replacer(/(&lt;)+[3]/gi, "<tt class='heart'>&#x2665;</tt>")
    });

    function parse_date(date_str) {
      // The non-search twitter APIs return inconsistently-formatted dates, which Date.parse
      // cannot handle in IE. We therefore perform the following transformation:
      // "Wed Apr 29 08:53:31 +0000 2009" => "Wed, Apr 29 2009 08:53:31 +0000"
      return Date.parse(date_str.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i, '$1,$2$4$3'));
    }

    function relative_time(date) {
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - date) / 1000, 10);
      var r = '';
      if (delta < 60) {
        r = delta + ' seconds ago';
      } else if(delta < 120) {
        r = 'a minute ago';
      } else if(delta < (45*60)) {
        r = (parseInt(delta / 60, 10)).toString() + ' minutes ago';
      } else if(delta < (2*60*60)) {
        r = 'an hour ago';
      } else if(delta < (24*60*60)) {
        r = '' + (parseInt(delta / 3600, 10)).toString() + ' hours ago';
      } else if(delta < (48*60*60)) {
        r = 'a day ago';
      } else {
        r = (parseInt(delta / 86400, 10)).toString() + ' days ago';
      }
      return 'about ' + r;
    }

    function build_auto_join_text(text) {
      if (text.match(/^(@([A-Za-z0-9-_]+)) .*/i)) {
        return s.auto_join_text_reply;
      } else if (text.match(url_regexp)) {
        return s.auto_join_text_url;
      } else if (text.match(/^((\w+ed)|just) .*/im)) {
        return s.auto_join_text_ed;
      } else if (text.match(/^(\w*ing) .*/i)) {
        return s.auto_join_text_ing;
      } else {
        return s.auto_join_text_default;
      }
    }

    function build_api_url() {
      var proto = ('https:' == document.location.protocol ? 'https:' : 'http:');
      var count = (s.fetch === null) ? s.count : s.fetch;
      if (s.list) {
        return proto+"//"+s.twitter_api_url+"/1/"+s.username[0]+"/lists/"+s.list+"/statuses.json?page="+s.page+"&per_page="+count+"&callback=?";
      } else if (s.favorites) {
        return proto+"//"+s.twitter_api_url+"/favorites/"+s.username[0]+".json?page="+s.page+"&count="+count+"&callback=?";
      } else if (s.query === null && s.username.length == 1) {
        return proto+'//'+s.twitter_api_url+'/1/statuses/user_timeline.json?screen_name='+s.username[0]+'&count='+count+(s.retweets ? '&include_rts=1' : '')+'&page='+s.page+'&callback=?';
      } else {
        var query = (s.query || 'from:'+s.username.join(' OR from:'));
        return proto+'//'+s.twitter_search_url+'/search.json?&q='+encodeURIComponent(query)+'&rpp='+count+'&page='+s.page+'&callback=?';
      }
    }

    // Convert twitter API objects into data available for
    // constructing each tweet <li> using a template
    function extract_template_data(item){
      var o = {};
      o.item = item;
      o.source = item.source;
      o.screen_name = item.from_user || item.user.screen_name;
      o.avatar_size = s.avatar_size;
      o.avatar_url = item.profile_image_url || item.user.profile_image_url;
      o.retweet = typeof(item.retweeted_status) != 'undefined';
      o.tweet_time = parse_date(item.created_at);
      o.join_text = s.join_text == "auto" ? build_auto_join_text(item.text) : s.join_text;
      o.tweet_id = item.id_str;
      o.twitter_base = "http://"+s.twitter_url+"/";
      o.user_url = o.twitter_base+o.screen_name;
      o.tweet_url = o.user_url+"/status/"+o.tweet_id;
      o.reply_url = o.twitter_base+"intent/tweet?in_reply_to="+o.tweet_id;
      o.retweet_url = o.twitter_base+"intent/retweet?tweet_id="+o.tweet_id;
      o.favorite_url = o.twitter_base+"intent/favorite?tweet_id="+o.tweet_id;
      o.retweeted_screen_name = o.retweet && item.retweeted_status.user.screen_name;
      o.tweet_relative_time = relative_time(o.tweet_time);
      o.tweet_raw_text = o.retweet ? ('RT @'+o.retweeted_screen_name+' '+item.retweeted_status.text) : item.text; // avoid '...' in long retweets
      o.tweet_text = $([o.tweet_raw_text]).linkUrl().linkUser().linkHash()[0];
      o.tweet_text_fancy = $([o.tweet_text]).makeHeart().capAwesome().capEpic()[0];

      // Default spans, and pre-formatted blocks for common layouts
      o.user = t('<a class="tweet_user" href="{user_url}">{screen_name}</a>', o);
      o.join = s.join_text ? t(' <span class="tweet_join">{join_text}</span> ', o) : ' ';
      o.avatar = o.avatar_size ?
        t('<a class="tweet_avatar" href="{user_url}"><img src="{avatar_url}" height="{avatar_size}" width="{avatar_size}" alt="{screen_name}\'s avatar" title="{screen_name}\'s avatar" border="0"/></a>', o) : '';
      o.time = t('<span class="tweet_time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>', o);
      o.text = t('<span class="tweet_text">{tweet_text_fancy}</span>', o);
      o.reply_action = t('<a class="tweet_action tweet_reply" href="{reply_url}">reply</a>', o);
      o.retweet_action = t('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>', o);
      o.favorite_action = t('<a class="tweet_action tweet_favorite" href="{favorite_url}">favorite</a>', o);
      return o;
    }

    return this.each(function(i, widget){
      var list = $('<ul class="tweet_list">').appendTo(widget);
      var intro = '<p class="tweet_intro">'+s.intro_text+'</p>';
      var outro = '<p class="tweet_outro">'+s.outro_text+'</p>';
      var loading = $('<p class="loading">'+s.loading_text+'</p>');

      if(s.username && typeof(s.username) == "string"){
        s.username = [s.username];
      }

      if (s.loading_text) $(widget).append(loading);
      $(widget).bind("tweet:load", function(){
		  
        $.getJSON(build_api_url(), function(data){
          if (s.loading_text) loading.remove();
          if (s.intro_text) list.before(intro);
          list.empty();

          var tweets = $.map(data.results || data, extract_template_data);
          tweets = $.grep(tweets, s.filter).sort(s.comparator).slice(0, s.count);
          list.append($.map(tweets, function(o) { return "<li>" + t(s.template, o) + "</li>"; }).join('')).
              children('li:first').addClass('tweet_first').end().
              children('li:odd').addClass('tweet_even').end().
              children('li:even').addClass('tweet_odd');
          if (s.outro_text) list.after(outro);
          $(widget).trigger("loaded").trigger((tweets.length === 0 ? "empty" : "full"));
          if (s.refresh_interval) {
            window.setTimeout(function() { $(widget).trigger("tweet:load"); }, 1000 * s.refresh_interval);
          }
		  differenza = $("#scrollabile").height()-$("#col1").height();
		  differenza_scorrimento = $("#col2").height() - $("#scrollabile").height();
        });
      }).trigger("tweet:load");
    });
  };
});