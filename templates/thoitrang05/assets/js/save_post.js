'use strict';

var nhSavedPost = {
	init: function(){
		var self = this;

		var accountInfo = typeof(nhMain.dataInit.member) != _UNDEFINED && !$.isEmptyObject(nhMain.dataInit.member) ? nhMain.dataInit.member : {};
		self.accountId = typeof(accountInfo.account_id) != _UNDEFINED ? accountInfo.account_id : null;


		$(document).on('click', '[nh-btn-action="savedpost"]:not(.added-savedpost)', function(e){
			var recordID = nhMain.utilities.parseInt($(this).attr('savedpost-id'));

			if(!nhMain.utilities.notEmpty(recordID)){
				nhMain.showAlert(_ERROR, nhMain.getLabel('khong_lay_duoc_thong_tin_yeu_thich'));
				return false;
			}
			if(!nhMain.utilities.notEmpty(self.accountId)) {
				nhMain.showAlert(_ERROR, 'Bạn phải là thành viên mới được sử dụng chức năng này');
				return false;
			}

			var btnSavedPost = $(this);
			btnSavedPost.addClass('effect-spin');
			self.addToSavedPost(recordID, function(){
				setTimeout(function(){
					btnSavedPost.removeClass('effect-spin');
				}, 1000);
				btnSavedPost.addClass('added-savedpost');
			});
		});


		// xóa bài viết yêu thích
		$(document).on('click', '.added-savedpost[nh-btn-action="savedpost"]', function(e){
			var recordID = nhMain.utilities.parseInt($(this).attr('savedpost-id'));
			var btn_delete = $(this);

			if(!nhMain.utilities.notEmpty(recordID)){
				nhMain.showAlert(_ERROR, nhMain.getLabel('Không lấy được thông tin bài viết đã lưu'));
				return false;
			}

			if(!nhMain.utilities.notEmpty(self.accountId)) {
				nhMain.showAlert(_ERROR, 'Bạn phải là thành viên mới được sử dụng chức năng này');
				return false;
			}

			self.messages = nhMain.getLabel('Bạn có muốn xóa bài viết đã lưu này');

			nhMain.showAlert(_WARNING, self.messages, {callback_element:  $(this)}, function(e){
				e.removeClass('added-savedpost');
				self.remove(recordID, e);
			});
		});


		self.reloadMiniWishlist();
	},

	addToSavedPost: function(record_id = null, callback = null){
		var self = this;

		if (typeof(callback) != 'function') {
	        callback = function () {};
	    }

		if(!nhMain.utilities.notEmpty(record_id)){
			nhMain.showLog(nhMain.getLabel('du_lieu_khong_hop_le'));
			return false;
		}

		nhMain.callAjax({
			async: true,
			url: '/savedpost/add-post',
			data: {
				account_id: self.accountId,
				record_id: record_id
			},
		}).done(function(response) {
			var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
			var message = typeof(response.message) != _UNDEFINED ? response.message : '';
			var status = typeof(response.status) != _UNDEFINED ? response.status : {};

			if (code == _SUCCESS) {
				nhMain.showAlert(_SUCCESS, message);
				callback();
			} else {
				nhMain.showAlert(_ERROR, message);
			}
		});

		self.reloadMiniWishlist(self.countTotal + 1);
	},

	loadWishlist: function(record_id = null, type = null){
		var self = this;

		if($('[wishlist-id="'+ record_id +'"][wishlist-type="'+ type +'"]').length > 0){
			$('[wishlist-id="'+ record_id +'"][wishlist-type="'+ type +'"]').each(function(index){
				$(this).addClass('added-wishlist');
			});
		}
	},

	reloadMiniWishlist: function(updateCount = null, callback = null) {
		var self = this;

		if (typeof(callback) != 'function') {
	        callback = function () {};
	    }

		if($('[wishlist-total]').length > 0) {
			self.countTotal = typeof(self.wishlistProduct) != _UNDEFINED ? self.wishlistProduct.length : 0;
			if(nhMain.utilities.notEmpty(updateCount)) {
				self.countTotal = updateCount;
			}
			$('[wishlist-total]').html(nhMain.utilities.parseInt(self.countTotal));
		}

		if($('[wishlist-total="article"]').length > 0) {
			self.countTotal = typeof(self.wishlistArticle) != _UNDEFINED ? self.wishlistArticle.length : 0;
			if(nhMain.utilities.notEmpty(updateCount)) {
				self.countTotal = updateCount;
			}
			$('[wishlist-total]').html(nhMain.utilities.parseInt(self.countTotal));
		}

		if($('[wishlist-total="all"]').length > 0) {
			var countProduct = typeof(self.wishlistProduct) != _UNDEFINED ? self.wishlistProduct.length : 0;
			var countArticle = typeof(self.wishlistArticle) != _UNDEFINED ? self.wishlistArticle.length : 0;

			self.countTotal = (countProduct + countArticle);
			if(nhMain.utilities.notEmpty(updateCount)) {
				self.countTotal = updateCount;
			}
			$('[wishlist-total]').html(nhMain.utilities.parseInt(self.countTotal));
		}
	},

	remove: function(record_id = null,  btn_delete = null) {
		var self = this;

		nhMain.callAjax({
			async: true,
			url: '/savedpost/remove-post',
			data: {
				account_id: self.accountId,
				record_id: record_id,
			},
		}).done(function(response) {
			var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
			var message = typeof(response.message) != _UNDEFINED ? response.message : '';
			var status = typeof(response.status) != _UNDEFINED ? response.status : {};

			if (code == _SUCCESS) {
				nhMain.showAlert(_SUCCESS, message);
				if(nhMain.utilities.notEmpty(btn_delete)) {
					btn_delete.closest('[nh-savedpost="reload"]').remove();
				}
				self.reloadMiniWishlist(self.countTotal - 1);
			} else {
				nhMain.showAlert(_ERROR, message);
			}
		});
	}
}

nhSavedPost.init();