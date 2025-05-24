
'use strict';

var nhReview = {
	init: function(){
		var self = this;
		self.review.init();

	},
	review: {
		init: function(){
			var self = this;
			var  modalElement = $('#modal-detail-review');
			var formElement = $('form[nh-form="review-form"]');
			if(formElement == null || formElement == _UNDEFINED || formElement.length == 0){
				return false;
			}

			var savedReview = localStorage.getItem('user_review');
			if(savedReview){
				$('input[name="review"][value="'+savedReview+'"]').prop('checked', true);
			}

		  	formElement.on('click', '[nh-btn-action="submit"]', function(e){
				var savedReview = localStorage.getItem('user_review');
				
				if(savedReview){
					nhMain.showAlert(_ERROR, 'Bạn đã đánh giá trước đây!');
					return;
				}
			
				var _id = $('input[name="review"]:checked').val();
				if(!_id){
					nhMain.showAlert(_ERROR, 'Vui lòng chọn một đánh giá!');
					return;
				}
			
				// Lưu vào localStorage
				localStorage.setItem('user_review', _id);
			
				nhMain.showLoading.page();
			
				nhMain.callAjax({
					url: '/review/send',
					data: { id: _id }
				}).done(function(response) {
					var code = response.code ?? _ERROR;
					var message = response.message ?? '';
					var status = response.status ?? 0;
			
					if(status == 403){
						nhMain.showAlert(_ERROR, message);
						return;
					}
			
					nhMain.showLoading.remove();
			
					if(code == _SUCCESS){
						nhMain.showAlert(_SUCCESS, message);
					} else {
						nhMain.showAlert(_ERROR, message);
					}
				});

			});


			formElement.on('click', '[nh-btn-action="detail"]', function(e){
				e.preventDefault();
				nhMain.showLoading.page();

				nhMain.callAjax({
					url: '/review/detail/',
					dataType: _HTML
				}).done(function(response) {
					nhMain.showLoading.remove();
					modalElement.find('.modal-body').html(response);
					modalElement.modal('show');
				});
			});


		}
	},
}	

nhReview.init();