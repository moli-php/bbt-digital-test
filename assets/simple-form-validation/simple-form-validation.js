/*
 * Title	: Simple Form Validation
 * Author	: Romulo G. Soriano Jr.
 * Date		: 2015-04-07 
 *
 */

(function($){

$.fn.simpleForm = function(options){

	var config = $.extend({
		obj : this,
		result : true,
		form : $(this.closest('form')),
		all_errors : false,
		get_data : false,
		data : [],
	},options);
	
	// remove all error messages if existing
	if(config.form.find('.simpleForm-container').length){
		config.form.find('.simpleForm-container').remove();
	}
	
	// scan the form for input fields
	$.each(config.form.children(), function(k,v){
		// field to scan on the form
		//var obj = $(v).find('input:text, input:checkbox, input:radio, input:hidden, textarea, select');
		var obj = $(v).find('input, textarea, select');
		
		if(obj.length){
		
			// get input value
			var data = $.trim(obj.val());
			// for radio, checkbox condition
			if(obj.attr('type') === 'radio' || obj.attr('type') === 'checkbox'){
				// initialized value for radio and checkbox
				data = "";
				// by group category
				if(obj.closest('.simpleForm-group').length){

					$.each(obj,function(key,object){
						if(object.checked)
							data = object.value;	
					});
					config.data.push(obj.attr('name') +'|'+ data);
					
					// make the  group container to be the target object, to render the error message
					obj = obj.closest('.simpleForm-group');
					errorOptions(obj,data);
					
				// individual category
				}else{		
					$.each(obj,function(key,object){
						data = "";
						obj = $(object);
						if(object.checked){
							data = object.value;
						}	
						errorOptions(obj,data);
					});		
				}
			// for text, hidden, textarea, select condition
			}else{
				errorOptions(obj,data);
			}
		// single element, not encapsulate by other elements, eg div, dd, etc 
		}else{
			var obj = $(v);
			var fields = ['input','textarea','select'];
			var tagName = obj.prop('tagName').toLowerCase();
			var data = $.trim(obj.val());
			if($.inArray(tagName,fields) != -1){
				if(obj.attr('type') === 'radio' || obj.attr('type') === 'checkbox'){
					data = "";
					if(obj[0].checked){
						data = obj.val();
					}	
				}
				errorOptions(obj,data);
			}
		}

	});
	
	
	// parse user input in json format
	if(config.get_data == true && config.result == true){
		var str = '{';
		$.each(config.data, function(k,v){
			var data = v.split('|');
			str += '"'+data[0] + '":"'+ data[1]+'",';
		});
		str = str.substr(0,str.length -1) + '}';
		str = $.parseJSON(str);
		return str;
	}
	
	return config.result;
	
	function errorMsg(obj,msg) {
		
		// check if error show one at a time otherwise it show all errors
		if(config.form.find('.simpleForm-container').length && config.all_errors == false){
			return false;
		}
	
		// set config.result to false;
		config.result = false;	

		/* check if the target object have no current error message
		otherwise it will generate another type of error message */
		if(obj.next().hasClass('simpleForm-container') === false){
			
			// set user defined position if available
			var userTop = 0, userLeft = 0;
			if(typeof obj.attr('simpleForm-position-top') != 'undefined' || typeof obj.attr('simpleForm-position-left') != 'undefined' ) {
				userTop = parseInt(obj.attr('simpleForm-position-top'));
				userLeft = parseInt(obj.attr('simpleForm-position-left'));
				userTop = isNaN(userTop) ? 0 : userTop;
				userLeft = isNaN(userLeft) ? 0 : userLeft;

			}
			// position error message container
			var posTop = obj.position().top + obj.height() + 10 + (userTop);
			var posLeft = obj.position().left + (userLeft);
			// generate the toltip error message
			var con = $('<span class="simpleForm-container" />');
				con.css({'left':posLeft, 'top':posTop});
				con.append($('<span id="simpleForm-arrow" />'));
			var msgContainer = $('<span id="simpleForm-message" />');
				msgContainer.text(msg);
				con.append(msgContainer);
				con.insertAfter(obj);
				con.fadeIn('normal');
				con.delay(2000).fadeOut('slow',function(){con.remove();});
		}

	}

	function errorOptions(obj,data) {
		var errMsg = "";
		// get user input
		if(obj.attr('name')){	
			var key = obj.attr('name');
			config.data.push(key+'|'+data);
		}
		
		// required validation
		if(typeof obj.attr('simpleForm-required') != 'undefined'){	
			if(data == ""){
				errMsg = obj.attr('required-message') ? obj.attr('required-message') : 'This field is required.';
				errorMsg(obj, errMsg);;
			}
		}
		// number validation
		if(typeof obj.attr('simpleForm-number') != 'undefined'){
			if(!/^[0-9]*$/.test(data)){
				errMsg = obj.attr('number-message') ? obj.attr('number-message') : 'Number only.';
				errorMsg(obj, errMsg);				
			}else{
				if(data.substr(0,1) == 0){
					errMsg = 'Number must not begin with "0"';
					errorMsg(obj, errMsg);
				}
			}
			
		}
		// minlength validation
		if(obj.attr('simpleForm-minlength')){
			if(data.length > 0 && data.length < obj.attr('simpleForm-minlength')){
				errMsg = obj.attr('minlength-message') ? obj.attr('minlength-message') : 'Field must have a minimum of '+obj.attr('simpleForm-minlength')+ ' characters';
				errorMsg(obj, errMsg);
			}
		}
		// maxlength validation
		if(obj.attr('simpleForm-maxlength')){
			if(data.length > obj.attr('simpleForm-maxlength')){
				errMsg = obj.attr('maxlength-message') ? obj.attr('maxlength-message') : 'Field must have a maximum of '+obj.attr('simpleForm-maxlength')+ ' characters long';
				errorMsg(obj, errMsg);
			}
		}
		// email validation
		if(typeof obj.attr('simpleForm-email') != 'undefined'){	
			msg = obj.attr('email-message') ? obj.attr('email-message') : 'Email is invalid';
			var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			if(pattern.test(data) === false){
				errorMsg(obj, msg);
			}
		}

	}
}


})(jQuery);