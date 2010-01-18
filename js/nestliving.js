jQuery.noConflict();
 
jQuery(document).ready(function(){	
	
	// jQuery.each(jQuery.browser, function(i, val) {
	//   if(i=="mozilla" && jQuery.browser.version.substr(0,3)=="1.9") {
	// 		var isFF3 = true;
	// 	} else {
	// 		var isFF3 = false;
	// 	}
	// });
	
	
	if(jQuery.browser.version.substr(0,3)=="1.9") {
		
	} else {
		var inc = 2;
	}
	
	/* ------ basic input text blur/focus function */
	jQuery("input:text").blur(function(){
		jQuery(this).css( { color: "#cccccc" } );
	});
	jQuery("input:text").focus(function(){
		jQuery(this).css( { color: "#333333" } );
		jQuery(this).select();
		jQuery(this).val('');
	});
 
  // jQuery("#nav ul li.dropdown").mouseover(function(){
  //  var inc = 2; // +2 for the border thickness
  // 
  //  var thisPosition = jQuery(this).position();
  //  var thisLeft = thisPosition.left+inc; 
  //  var thisList = jQuery(this).find("ul");
  //  jQuery(thisList).show();
  //  jQuery(thisList).css({ left: thisLeft });
  //  jQuery(this).find("a:first").addClass("dropped");
  // });
  // 
  // jQuery("#nav ul li.dropdown").mouseout(function(){
  //  jQuery(this).find("ul").hide();
  //  jQuery(this).find("a:first").removeClass("dropped");
  // });
	
	jQuery(".nav ul").superfish({
    'speed': 'fast',
    'delay': '200', 
    'onShow': function() {
      jQuery(this).parent().find('a').addClass("dropped");
    },
    'onHide': function() {
      jQuery(this).parent().find('a').removeClass("dropped");
    }
  });
	
	jQuery(".help-show").click(function() {
		jQuery('.help-display').toggle('slow');
	});
 
	jQuery("#product-image-pagination a").each(function(){
		jQuery(this).mouseover(function(){
			var thisHref = jQuery(this).attr("href");
			jQuery('.product-image').attr("src", thisHref);
			jQuery('.big-image-link').attr("href", thisHref);
			return false;
		});
		jQuery(this).click(function(){
			var thisHref = jQuery(this).attr("href");
			jQuery('.product-image').attr("src", thisHref);
			jQuery('.big-image-link').attr("href", thisHref);
			return false;
		});
	});
	
	if(jQuery("#similar-products-brand").children('p').length == 0) {
		
		//jQuery("#similar-products-brand").append("nothing");
		
	}
	
	if(jQuery(".alt_dropdown").length > 0)
	{
	
		jQuery(".alt_dropdown").click(function(){
			jQuery(this).find('ul').toggle();
		});
	
		jQuery(".alt_dropdown").mouseover(function(){
			jQuery(this).addClass('alt_dropdown_over');
		});
	
		jQuery(".alt_dropdown").mouseout(function(){
			jQuery(this).removeClass('alt_dropdown_over');
		});
	
	}
 
});
 
/*------ bucket replacement */
function changeBucket(asset_url) {
	asset_url = asset_url.split("?", 1);
	var buckets_mid = Array(
		Array('buckets-gift.png', '/collections/price-under-50/', 'looking for a gift?'), 
		//Array('buckets-ceramics.png', '/pages/heath-ceramics/', 'nestliving must haves - shop ceramics'),
    //Array('buckets-outdoors.png', '/collections/outdoors/', 'spring is here shop outdoors'),
    Array('buckets-abici.png', '/collections/vendors?q=ABICI+bicycle', 'abici bikes now available'),
 
		//Array('buckets-lighting.png', '/collections/lighting/', 'nestliving must haves - shop lighting'),
		Array('buckets-knoll.png', '/pages/knoll/', 'knoll - now available'),
		Array('buckets-knoll.png', '/pages/knoll/', 'knoll - now available')
	); //close array
	
	var buckets_mid_ran = Math.floor(Math.random()*buckets_mid.length);					
	var bucket_image_url = asset_url+buckets_mid[buckets_mid_ran][0];
	
	document.write("<a href='" +  buckets_mid[buckets_mid_ran][1] + "' title='" + buckets_mid[buckets_mid_ran][2] + "'><img src='" + bucket_image_url + "' alt=''/></a>");
}
 
function remove_item(id) {
    document.getElementById('updates_'+id).value = 0;
	document.getElementById('cartform').submit();
}
 
function write_product(title, handle, price, url, image, title_truncated) {
	document.write("<p><a href='" + url + "' title='" + title + "'><img src='" + image + "' alt='" + title + "' /></a><span><a href='" + url + "'>" + title_truncated + "</a><strong>" + price + "</strong></span></p>");
}
 
function write_view_more(url) {
	document.write("<p class='more-items'><a href='/collections/" + url + "/' title='view more similar products'>view more</a></p>");
	
}
 
function goURL(url) {
	window.location = url;	
}