$( document ).ready(function() {

	var entriesHeight = $(".timelineEntries").height();

	function timelinecheck() {
		entriesHeight = $(".timelineEntries").height();
		//console.log(entriesHeight);
		$(".timeline").height(entriesHeight);
	}
	
	timelinecheck();
	
	
	
	
	$(".timelineInner a").click(function(e) {
		
		e.preventDefault();
		
		$(this).toggleClass("toggled");
		
	});
	
	$(".futureEvents").click(function(e) {
		
		$(".timelineEntries .future").toggleClass("futureHidden");
		
		$(".timeline .today").toggleClass("future");
		
		$('.timelineEntries').isotope();
		setTimeout(function() { adjustTimeline(); timelinecheck(); },500);
		
		
	});
	
	
	$('.timelineEntries').isotope({
	  // options...
	  itemSelector: '.singletimelineentry',
	  filter: ':not(.futureHidden)',
	  masonry: {
	    columnWidth: '.singletimelineentry'
	  }
	});
	
	var entryCounter = 0;
	
	function isOdd(num) { return num % 2;}
	
	$(".timelineEntries .singletimelineentry.past").each(function(index) {
		if(!isOdd(index)) {
			$(this).addClass("odd");
		} else {
			$(this).addClass("even");
		}
	});
	
	function adjustTimeline() {
		$(".timelineEntries .singletimelineentry").each(function() {
			
			var currentLeft = $(this).css("left");
			
			
			//console.log(currentLeft);
			
			if(currentLeft != "auto") {
					
				if(currentLeft == "0px") {
					//$(this).css("margin-top","0px");
					$(this).addClass("right-dot");
					$(this).removeClass("left-dot");
				} else {
					//$(this).css("margin-top","80px");
					$(this).addClass("left-dot");
					$(this).removeClass("right-dot");
				}
			
			}
			
			
		});
	}

	adjustTimeline();
	timelinecheck();

	
	if($('body').is('.home')){
	
	var f;

	 var peoplecount = 0;

	//Regular Expression Search Filter Auto Complete
		$("#input-16").keyup(function () {
			
			
			
			var filter = $(this).val(), count = 0;
			$("#input-16").attr("value",filter);
			
			
			
			
			var resultscounted = 0;
			
			
			
			if (filter.length < 1) {
				
				$('.timelineEntries').isotope({
				  // options...
				  itemSelector: '.singletimelineentry',
				  filter: ':not(.futureHidden)',
				  masonry: {
				    columnWidth: '.singletimelineentry'
				  }
				});
				clearTimeout(f);
				f = setTimeout(function() { adjustTimeline(); timelinecheck(); },500);
			
			} else {
				$('.timelineEntries').isotope({
			 
				  itemSelector: '.singletimelineentry',
				  filter: function() {
					  var name = $(this).find(".textContent").text();
					  var re = new RegExp(filter, "i");
					  return name.match(re);
					},
				  masonry: {
				    columnWidth: '.singletimelineentry'
				  }
				});
				clearTimeout(f);
				f = setTimeout(function() { adjustTimeline(); },500);
			}
			    
			$(".timelineEntries .singletimelineentry").each(function () {
				
				
				
			
		        /*if ($(this).text().search(new RegExp(filter, "i")) < 0) {
		        	$(this).addClass("hidden"); 
		        	$(this).removeClass("visible"); 
			       
			        
		        } else {*/
				
					
					
					//$(".cleartrigger").fadeIn(300);
				/*$('.instructions').fadeOut('fast', function() {
		        		// Animation complete
					
		     		 });*/
				
		          /*  $(this).removeClass("hidden");
		            $(this).addClass("visible");
		            
		            $(".timelineEntries .visible").each(function(index) {
					$(this).attr("data-counted",resultscounted);
					resultscounted = resultscounted + 1;
					
					
					});
		            
		            count++;
		           
		            
		        }*/
		    });
		    
		    if(filter == "") {
			    $(".timelineEntries .singletimelineentry").removeClass("visible").removeClass("hidden");
			    $(".timelineEntries").removeClass("expanded");
		    } else {
			    if(resultscounted > 0) {
			    			    $(".timelineEntries").addClass("expanded");
			    			   }
		    }
		   
		    
		  /* $(".filtered li.visible").each(function () {
		    	//console.log('ran');
		    		$(this).addClass("checking");
		    		var currentobj = $(this);
		    		var currenttextobj = $(this).text();
		    		
		    		//var nexttextobj = $(this).next("li.visible").text();
		    		$(".filtered li.visible").not($(".checking")).each(function () {
			    		var nexttextobj = $(this).text();
			    		if(currenttextobj == nexttextobj) {
				    		//console.log(currenttextobj +" "+ nexttextobj);
				    		$(this).addClass("duplicate");
				    		currentobj.removeClass("checking");
			    		}
		    		});
		    		
	
		    });*/
		    
		   
		    
		    //$("#filter-count").text(count+peoplecount);
		    
		    /*if((count + peoplecount) > 0) {
			            $(".filtered").show();
			            $("#input-16").addClass("notEmpty");
			            //$(".searchClear").show();
		            } else {
		            $("#input-16").removeClass("notEmpty");
			            $(".filtered").stop().fadeOut(300);
			            
		            }
		          if(filter.length > 0) {
			        $(".searchClear").show();
		        }  else {
			        $(".searchClear").hide();
		        }*/
		       timelinecheck();   
		       
    	});
    	
		
		
		setInterval(function() { adjustTimeline(); timelinecheck(); $('.timelineEntries').isotope(); },2000);
    	 
			
}//END if body is page-home




});