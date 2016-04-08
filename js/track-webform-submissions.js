//added by mbosma on 12/16/14
//sends:
//event category: webform submission
//action: Webform ID
//Label: Page submission occured on

//removed the top portion of this code on 4/17/15 - not all submit events were being captured because the ga code didn't have time to make the return trip from Google before the submit occured and the page refreshed. New version is below that pauses submits until the hitCallback function is ran.

//jQuery(document).ready(function($) {
// Track submission events for all forms with class="webform-client-form".
  //$('.webform-client-form').submit(function() {
	//var sUrl = location.pathname;
	//alert(sUrl);
    //ga('send', {hitType: 'event', eventCategory: 'Webform Submission', eventAction: 'Webform ID: ' + $(this).attr("id"), eventLabel: 'Submission URL: ' + sUrl});
  //});
//});


jQuery(document).ready(function($) {
	$('.webform-client-form').submit(function(e) {
		
		//The submit action is inside the GA callback so only do this if GA is loaded and working properly. 
		if (ga.hasOwnProperty('loaded') && ga.loaded) {
			
			// Prevent the form being submitted just yet
			e.preventDefault();
			
			// get the path of the form
			var sUrl = location.pathname;
			
			// Keep a reference to this dom element for the callback
			var _this = this;
			
			//send the data to GA then use a hitCallback function to submit the form. 
			ga('send', {hitType: 'event', eventCategory: 'Webform Submission', eventAction: 'Webform ID: ' + $(this).attr("id"), eventLabel: 'Submission URL: ' + sUrl,
				'hitCallback': function() {
					//submit the form
					_this.submit();
				}
			});
		}
	});
});