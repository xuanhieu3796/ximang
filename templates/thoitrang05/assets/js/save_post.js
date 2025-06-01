'use strict';

var nhSavedPost = {
	init: function(){
		var self = this;

		var accountInfo = typeof(nhMain.dataInit.member) != _UNDEFINED && !$.isEmptyObject(nhMain.dataInit.member) ? nhMain.dataInit.member : {};
		self.accountId = typeof(accountInfo.account_id) != _UNDEFINED ? accountInfo.account_id : null;

		// thêm bài viết yêu thích
		$(document).on('click', '[nh-btn-action="savedpost"]:not(.added-savedpost)', function(e){
			var recordID = nhMain.utilities.parseInt($(this).attr('savedpost-id'));

			if(!nhMain.utilities.notEmpty(recordID)){
				nhMain.showAlert(_ERROR, nhMain.getLabel('khong_lay_duoc_thong_tin_yeu_thich'));
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
		$(document).on('click', '.added-wishlist[nh-btn-action="wishlist"]', function(e){
			var recordID = nhMain.utilities.parseInt($(this).attr('wishlist-id'));
			var type = $(this).attr('wishlist-type');
			var btn_delete = $(this);

			if(!nhMain.utilities.notEmpty(recordID) || !nhMain.utilities.notEmpty(type)){
				nhMain.showAlert(_ERROR, nhMain.getLabel('khong_lay_duoc_thong_tin_yeu_thich'));
				return false;
			}

			self.messages = nhMain.getLabel('ban_co_muon_xoa_san_pham_yeu_thich_nay');
			if(type == _ARTICLE) {
				self.messages = nhMain.getLabel('ban_co_muon_xoa_bai_viet_yeu_thich_nay');
			}

			nhMain.showAlert(_WARNING, self.messages, {callback_element:  $(this)}, function(e){
				e.removeClass('added-wishlist');
				self.remove(recordID, type, e);
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

	remove: function(record_id = null, type = null, btn_delete = null) {
		var self = this;

		if(nhMain.utilities.notEmpty(self.accountId)) {
			nhMain.callAjax({
				async: true,
				url: '/wishlist/remove-product',
				data: {
					account_id: self.accountId,
					record_id: record_id,
					type: type
				},
			}).done(function(response) {
				var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
	        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
	        	var status = typeof(response.status) != _UNDEFINED ? response.status : {};

	            if (code == _SUCCESS) {
	            	nhMain.showAlert(_SUCCESS, message);
	            	if(nhMain.utilities.notEmpty(btn_delete)) {
	            		btn_delete.closest('[nh-wishlist="reload"]').remove();
	            	}
	            	self.reloadMiniWishlist(self.countTotal - 1);
	            } else {
	            	nhMain.showAlert(_ERROR, message);
	            }
			});

		} else {
			if(type == _PRODUCT) {
				self.wishlistProduct.splice($.inArray(record_id, self.wishlistProduct), 1);
			}

			if(type == _ARTICLE) {
				self.wishlistArticle.splice($.inArray(record_id, self.wishlistArticle), 1);
			}

			self.wishlistCookie = {
				product: self.wishlistProduct,
				article: self.wishlistArticle
			};

			self.messages = nhMain.getLabel('xoa_thanh_cong_san_pham_yeu_thich');
			if(type == _ARTICLE) {
				self.messages = nhMain.getLabel('xoa_thanh_cong_bai_viet_yeu_thich');
			}

			$.cookie(_WISHLIST, JSON.stringify(self.wishlistCookie), {expires: self.expires_cookie, path: '/'});
			if(nhMain.utilities.notEmpty(btn_delete)) {
        		btn_delete.closest('[nh-wishlist="reload"]').remove();
        	}
			self.reloadMiniWishlist(self.countTotal - 1);
			nhMain.showAlert(_SUCCESS, self.messages);
		}
	}
}

nhSavedPost.init();