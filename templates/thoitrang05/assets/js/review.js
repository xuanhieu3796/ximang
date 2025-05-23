
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
				var _id =  $('input[name="review"]:checked').val();
	
	            if(_id == null || _id == _UNDEFINED || _id.length == 0){
					return false;
				}

				nhMain.showLoading.page();
				nhMain.callAjax({
					url: '/review/send-info',
	                data:{
	                    id: _id
	                }
				}).done(function(response) {
					
				   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
		        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
		        	var status = typeof(response.status) != _UNDEFINED ? response.status : {};
		        	if(status == 403){
		        		nhMain.showAlert(_ERROR, message);
		        	}

		            if (code == _SUCCESS) {
		            	nhMain.showLoading.remove();
		            	nhMain.showAlert(_SUCCESS, message);

		            	location.reload();
		            } else {
		            	nhMain.showAlert(_ERROR, message);
		            }
				});

			});

		}
	},
}	

nhReview.init();