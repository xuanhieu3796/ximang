
'use strict';

var nhReview = {
	init: function(){
		var self = this;
		self.review.init();
	},
	review: {
		init: function(){
			var self = this;

			var formElement = $('form[nh-form="review-form"]');
			if(formElement == null || formElement == _UNDEFINED || formElement.length == 0){
				return false;
			}

		  	formElement.on('click', '[nh-btn-action="submit"]', function(e){
		  		e.preventDefault();
		  		nhMain.reCaptcha.check(function(token){
		  			var formData = formElement.serialize();
		  			if(token != null){
	  					formData = formData + '&'+ _TOKEN_RECAPTCHA +'=' + token;
	  				}

					nhMain.callAjax({
						url: formElement.attr('action'),
						data: formData
					}).done(function(response) {
					   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
			        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
			        	var status = typeof(response.status) != _UNDEFINED ? response.status : {};
			        	if(status == 403){
			        		nhMain.showAlert(_ERROR, message);
			        		location.reload();
			        	}
			            if (code == _SUCCESS) {
			            	formElement.find('input').val('');
			            	nhMain.showAlert(_SUCCESS, message);
			            } else {
			            	nhMain.showAlert(_ERROR, message);
			            }
					});
		  		});		  		
			});

		}
	},
}	

nhReview.init();