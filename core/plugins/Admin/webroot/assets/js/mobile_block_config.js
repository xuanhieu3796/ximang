"use strict";

var copyMedia = false;
var previewMedia = false;

var nhMobileBlockConfig = {
	block_code: null,
	idWrap: '#wrap-block-config',
	idWrapViewData: '#wrap-view-data',
	idWrapDataSelected: '#wrap-data-selected',

	editorDataExtend: null,
	editorModifyView: null,
	editorDifferent: null,
	editorHtmlBlock: null,
	init: function(){
		var self = this;
		self.block_code = $(self.idWrap).data('code');

		self.eventViewData();
		self.eventViewLayout();
		var typeBlock = $('#type-block').val();

		switch(typeBlock){
			case _HTML:
				self.blockHtml.init();
			break;

			case _SLIDER:
				self.managerItem.init();
			break;

			case _TAB_PRODUCT:
			case _TAB_ARTICLE:
				self.blockTab.init();
			break;
		}
				
		self.initInput();

		// save block
		$(document).on('click', self.idWrap + ' .btn-save', function(e) {
			e.preventDefault();

			var formEl = $(this).closest('form');
			var idForm = formEl.attr('id');

			if(idForm == 'general-config-form' && typeBlock == _HTML){
				var checkSyntax = self.editorHtmlBlock.getSession().getAnnotations();
				if(!$.isEmptyObject(checkSyntax)){
					toastr.info(nhMain.getLabel('loi_cu_phap_noi_dung_html_vui_long_kiem_tra_lai'));
					return;
				}

				var htmlContent = $.trim(self.editorHtmlBlock.getValue());

				$(formEl).find('input#html-content').val(htmlContent);
			}

			if(idForm == 'data-extend-form'){			
				if(typeBlock == _HTML){
					var htmlContent = $.trim(self.editorHtmlBlock.getValue());
					$(formEl).find('input#html-content').val(htmlContent);
				}
			}

			var validateForm = true;
			if(typeBlock == _TAB_PRODUCT || typeBlock == _TAB_ARTICLE){
				validateForm = self.blockTab.validateDataBeforeSubmit();
			}	

			if(validateForm){
				self.submitForm(formEl, $(this), function(data){
					var code = data.code || '';
					var blockType = data.block_type || '';

					if(code != '' && blockType == _HTML) {					
						nhMain.callAjax({
				    		async: false,
							url: adminPath + '/mobile-app/block/get-html-after-save/' + code,
							dataType: _HTML
						}).done(function(response) {
							console.log(response);

							nhMain.callAjax({
					    		async: false,
								url: adminPath + '/mobile-app/block/gender-html-after-save/' + code,
								data: {
									html: response
								}
							});
						}).fail(function(jqXHR, textStatus, errorThrown){
							nhMain.callAjax({
					    		async: false,
								url: adminPath + '/mobile-app/block/gender-html-after-save/' + code,
								data: {
									html: errorThrown
								}
							});
						});
					}

				});	
			}			
		});

		self.mobileAction.init();
	},
	initInput: function(){
		var self = this;

	    if($('input[nh-number-step]').length > 0){
	    	var step = $('input[nh-number-step]').attr('nh-number-step');
	    	var min = $('input[nh-number-step]').attr('data-min');

	    	nhMain.input.touchSpin.init($('input[nh-number-step]'), {
				max: 9999999999,
				step: step > 0 ? step : 1,
				min: min > 0 ? min : 0
			});
	    }
		
		$('.kt-selectpicker').selectpicker();

		self.selectMedia.init();
	},
	eventViewData: function(){
		var self = this;

		$(document).on('change', self.idWrap +  ' select#' + _DATA_TYPE, function(e) {
			self.loadViewSelectData($(this).val());
		});

		$(document).on('keyup keypress paste focus', self.idWrap + ' #product-suggest', function(e) {
			nhMain.autoSuggest.basic({
				inputSuggest: '#product-suggest',
				url: adminPath + '/product/auto-suggest-normal',
			}, function(response){
				if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
					self.addDataSelected({
						id: response.id,
						name: response.name
					});
				}
			});
			
			if(e.type == 'focusin'){
				$(this).autocomplete('search', $(this).val());
			}
		});

		$(document).on('keyup keypress paste focus', self.idWrap + ' #article-suggest', function(e) {
			nhMain.autoSuggest.basic({
				inputSuggest: '#article-suggest',
				url: adminPath + '/article/auto-suggest',
			}, function(response){
				if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
					self.addDataSelected({
						id: response.id,
						name: response.name
					});
				}
			});
			
			if(e.type == 'focusin'){
				$(this).autocomplete('search', $(this).val());
			}
		});

		$(document).on('click', self.idWrap + ' ' + self.idWrapDataSelected + ' .tagify__tag__removeBtn', function(e) {
			$(this).closest('.tagify__tag').remove();
		});

		$(document).on('change', self.idWrap +  ' select#view-file', function(e) {
			var file = $(this).val();
			if(file.length > 0){
				self.loadContentFileView(file);
			}
		});

		var validatorAddView;
		var formAddView = $('#add-view-form');

		$(document).on('click', self.idWrap +  ' #btn-add-view', function(e) {

			$('#add-view-modal input').val('');
			$('#add-view-modal').modal('show');
			
			validatorAddView = formAddView.validate({
				ignore: ':hidden',
				messages: {
					name_file: {
	                    required: nhMain.getLabel('vui_long_nhap_thong_tin'),
	                }
	            },
	            errorPlacement: function(error, element) {
	                var group = element.closest('.input-group');
	                if (group.length) {
	                    group.after(error.addClass('invalid-feedback'));
	                }else{                	
	                    element.after(error.addClass('invalid-feedback'));
	                }
	            }
			});
		});

		$(document).on('click', '#add-view-modal #btn-save-view', function(e) {

			if (validatorAddView.form()) {
				var formData = formAddView.serialize();
				nhMain.callAjax({
					url: formAddView.attr('action'),
					data: formData
				}).done(function(response) {
					KTApp.unblockPage();

				   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
		        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
		        	var data = typeof(response.data) != _UNDEFINED ? response.data : {};
		        	toastr.clear();
		        	var file = typeof(data.file) != _UNDEFINED ? data.file : '';

		            if (code == _SUCCESS) {
		            	toastr.info(message);
		            	if(file.length > 0){
		            		$('select#view-file').append('<option value="' + file + '" selected="selected">' + file + '</option>');
		            		$('select#view-file').selectpicker('refresh');

		            		self.loadContentFileView(file);
		            		$('#add-view-modal').modal('hide');
		            	}
		            } else {
		            	toastr.error(message);
		            }
				});
			}
		});

		$(document).on('click', self.idWrap +  ' #btn-delete-view', function(e) {
			var file = $('select#view-file').val();
			if(file == null || file.length == 0){
				toastr.error(nhMain.getLabel('khong_tim_thay_giao_dien_can_xoa'));
				return;
			}
			
			swal.fire({
		        title: nhMain.getLabel('xoa_giao_dien'),
		        text: nhMain.getLabel('ban_co_chac_chan_muon_xoa_giao_dien_nay'),
		        type: 'warning',
		        
		        confirmButtonText: '<i class="la la-trash-o"></i>' + nhMain.getLabel('dong_y'),
		        confirmButtonClass: 'btn btn-sm btn-danger',

		        showCancelButton: true,
		        cancelButtonText: nhMain.getLabel('huy_bo'),
		        cancelButtonClass: 'btn btn-sm btn-default'
		    }).then(function(result) {
		    	if(typeof(result.value) != _UNDEFINED && result.value){
		    		KTApp.blockPage(blockOptions);
		    		nhMain.callAjax({
						url: adminPath + '/template/block/delete-view/' + self.block_code,
						data:{
							view_file: file
						}
					}).done(function(response) {
						var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
					    var message = typeof(response.message) != _UNDEFINED ? response.message : '';
					    if (code == _SUCCESS) {
			            	toastr.success(message);
			            	$('select#view-file option[value="'+ file +'"]').remove();
			            	$('select#view-file').selectpicker('refresh');

			            	self.loadContentFileView($('select#view-file').val());
			            } else {
			            	toastr.error(message);
			            }
					})
		    	}    	
		    });						
		});
	},
	eventViewLayout: function(){
		var self = this;

		var modalAddElement = $('#add-element-modal');
		var modalAddStyleView = $('#add-style-view-modal');

		$(document).on('click', '[nh-btn="show-modal-add-element"]', function(e) {
			if(modalAddElement.length == 0) return;

			modalAddElement.find('input').val('');
			modalAddElement.modal('show');
		});

		modalAddElement.on('click', '[nh-btn="add-element"]', function(e) {
			if(modalAddElement.length == 0) return;

			var formElement = modalAddElement.find('form');
			if(formElement.length == 0) return;

			var nameInput = modalAddElement.find('input#element-name');
			var codeInput = modalAddElement.find('input#element-code');

			var elementName = nameInput.val() || '';
			var elementCode = codeInput.val() || '';
			if(elementName == ''){
				nhMain.validation.error.show(nameInput, nhMain.getLabel('vui_long_nhap_thong_tin'));
				return;
			}

			if(elementCode == ''){
				nhMain.validation.error.show(codeInput, nhMain.getLabel('vui_long_nhap_thong_tin'));
				return;
			}

			nhMain.callAjax({
				url: formElement.attr('action'),
				data: {
					name: elementName,
					code: elementCode
				}
			}).done(function(response) {
				KTApp.unblockPage();

			   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
	        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
	        	var data = typeof(response.data) != _UNDEFINED ? response.data : {};
	        	toastr.clear();

	            if (code == _SUCCESS) {
	            	toastr.info(message);
	            	var selectElement = $('select[name="element"]');
	            	if(selectElement.length > 0){
	            		selectElement.append(`<option value="${elementCode}" selected="selected">${elementName}</option>`);
	            		selectElement.selectpicker('refresh');
	            	}
	            		
	            	modalAddElement.modal('hide');
	            } else {
	            	toastr.error(message);
	            }
			});
		});

		$(document).on('click', '[nh-btn="delete-element"]', function(e) {
			var selectElement = $('select[name="element"]');
			if(selectElement.length == 0) return;

			var elementCode = selectElement.val() || '';
			if(elementCode == '') return;

			var blockCode = $(this).data('block-code') || '';
			if(blockCode == '') return;

			swal.fire({
		        title: nhMain.getLabel('xoa'),
		        text: nhMain.getLabel('ban_co_chac_chan_muon_xoa_element_nay'),
		        type: 'warning',
		        
		        confirmButtonText: '<i class="la la-trash-o"></i>' + nhMain.getLabel('dong_y'),
		        confirmButtonClass: 'btn btn-sm btn-danger',

		        showCancelButton: true,
		        cancelButtonText: nhMain.getLabel('huy_bo'),
		        cancelButtonClass: 'btn btn-sm btn-default'
		    }).then(function(result) {
		    	if(typeof(result.value) != _UNDEFINED && result.value){
		    		KTApp.blockPage(blockOptions);
		    		nhMain.callAjax({
						url: adminPath + '/mobile-app/block/delete-element/' + blockCode,
						data:{
							code: elementCode
						}
					}).done(function(response) {
						var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
					    var message = typeof(response.message) != _UNDEFINED ? response.message : '';
					    if (code == _SUCCESS) {
			            	toastr.success(message);

			            	$('select[name="element"] option[value="'+ elementCode +'"]').remove();
			            	$('select[name="element"]').selectpicker('refresh');

			            } else {
			            	toastr.error(message);
			            }

			            KTApp.unblockPage();
					})
		    	}    	
		    });
		});

		$(document).on('click', '[nh-btn="show-modal-add-view"]', function(e) {
			if(modalAddStyleView.length == 0) return;

			modalAddStyleView.find('input').val('');
			modalAddStyleView.modal('show');
		});

		modalAddStyleView.on('click', '[nh-btn="add-view"]', function(e) {
			if(modalAddStyleView.length == 0) return;
			
			var formElement = modalAddStyleView.find('form');
			if(formElement.length == 0) return;
		
			var nameInput = modalAddStyleView.find('input#view-name');
			var codeInput = modalAddStyleView.find('input#view-code');

			var viewName = nameInput.val() || '';
			var viewCode = codeInput.val() || '';
			if(viewName == ''){
				nhMain.validation.error.show(nameInput, nhMain.getLabel('vui_long_nhap_thong_tin'));
				return;
			}

			if(viewCode == ''){
				nhMain.validation.error.show(codeInput, nhMain.getLabel('vui_long_nhap_thong_tin'));
				return;
			}

			nhMain.callAjax({
				url: formElement.attr('action'),
				data: {
					name: viewName,
					code: viewCode
				}
			}).done(function(response) {
				KTApp.unblockPage();

			   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
	        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
	        	var data = typeof(response.data) != _UNDEFINED ? response.data : {};
	        	toastr.clear();

	            if (code == _SUCCESS) {
	            	toastr.info(message);
	            	var selectStyleView = $('select[name="style_view"]');
	            	if(selectStyleView.length > 0){
	            		selectStyleView.append(`<option value="${viewCode}" selected="selected">${viewName}</option>`);
	            		selectStyleView.selectpicker('refresh');
	            	}
	            		
	            	modalAddStyleView.modal('hide');
	            } else {
	            	toastr.error(message);
	            }
			});
		});

		$(document).on('click', '[nh-btn="delete-view"]', function(e) {
			var selectStyleView = $('select[name="style_view"]');
			if(selectStyleView.length == 0) return;

			var viewCode = selectStyleView.val() || '';
			if(viewCode == '') return;

			var blockCode = $(this).data('block-code') || '';
			if(blockCode == '') return;

			swal.fire({
		        title: nhMain.getLabel('xoa'),
		        text: nhMain.getLabel('ban_co_chac_chan_muon_xoa_element_nay'),
		        type: 'warning',
		        
		        confirmButtonText: '<i class="la la-trash-o"></i>' + nhMain.getLabel('dong_y'),
		        confirmButtonClass: 'btn btn-sm btn-danger',

		        showCancelButton: true,
		        cancelButtonText: nhMain.getLabel('huy_bo'),
		        cancelButtonClass: 'btn btn-sm btn-default'
		    }).then(function(result) {
		    	if(typeof(result.value) != _UNDEFINED && result.value){
		    		KTApp.blockPage(blockOptions);
		    		nhMain.callAjax({
						url: adminPath + '/mobile-app/block/delete-style-view/' + blockCode,
						data:{
							code: viewCode
						}
					}).done(function(response) {
						var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
					    var message = typeof(response.message) != _UNDEFINED ? response.message : '';
					    if (code == _SUCCESS) {
			            	toastr.success(message);

			            	$('select[name="style_view"] option[value="'+ viewCode +'"]').remove();
			            	$('select[name="style_view"]').selectpicker('refresh');

			            } else {
			            	toastr.error(message);
			            }

			            KTApp.unblockPage();
					})
		    	}    	
		    });
		});

	},
	loadViewSelectData: function(data_type = null){
		var self = this;

		$(self.idWrapViewData).html('');
		if(data_type.length > 0){
			nhMain.callAjax({
	    		async: true,
	    		dataType: 'html',
	    		data: {
	    			code: self.block_code,
	    			data_type: data_type
	    		},
				url: adminPath + '/mobile-app/block/load-view-select-data'
			}).done(function(response) {
				$(self.idWrapViewData).html(response);
				$(self.idWrapViewData + ' .kt-selectpicker').selectpicker();
			});
		}	
	},
	addDataSelected: function(item = {}, wrapDataElement = null){
		var self = this;

		if($.isEmptyObject(item)) return;

		if(self.checkDataExist(item.id)) return;

		var tagHtml = 
		'<span class="tagify__tag">\
            <x class="tagify__tag__removeBtn" role="button"></x>\
            <div><span class="tagify__tag-text">' + item.name + '</span></div>\
            <input name="data_ids[]" value="' + item.id + '" type="hidden">\
        </span>';

        if(wrapDataElement == null || wrapDataElement.length == 0){
        	$(self.idWrap + ' ' + self.idWrapDataSelected).append(tagHtml);
        }else{
        	wrapDataElement.append(tagHtml);
        }	
	},
	checkDataExist: function(id = null){
		var self = this;
		var result = false;

		if($(self.idWrap + ' ' + self.idWrapDataSelected).find('input[value="'+ id +'"]').length > 0){
			result = true;
		}

		return result;
	},
	loadContentFileView: function(file = null){
		var self = this;

		KTApp.blockPage(blockOptions);
		nhMain.callAjax({
    		async: true,
    		dataType: 'json',
    		data: {
    			view_file: file,
    		},
			url: adminPath + '/mobile-app/block/load-content-file-view/' + self.block_code
		}).done(function(response) {
			KTApp.unblockPage();
			
			var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
        	var data = typeof(response.data) != _UNDEFINED ? response.data : {};
        	var file_content = typeof(data.file_content) != _UNDEFINED ? data.file_content : '';
        	toastr.clear();
            if (code == _SUCCESS) {
            	$('#input-view-file-content').val(file_content);
            	self.editorModifyView.setValue(file_content);
            } else {
            	toastr.error(message);
            }
		});
	},
	submitForm: function(formEl = null, btn_save = null, callback = null){
		var self = this;

		if (typeof(callback) != 'function') {
	        callback = function () {};
	    }

		// show loading
		KTApp.progress(btn_save);
		KTApp.blockPage(blockOptions);
		
		var formData = formEl.serialize();
		nhMain.callAjax({
			url: formEl.attr('action'),
			data: formData
		}).done(function(response) {
			// hide loading
			KTApp.unprogress(btn_save);
			KTApp.unblockPage();

			//show message and redirect page
		   	var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
        	var message = typeof(response.message) != _UNDEFINED ? response.message : '';
        	var data = typeof(response.data) != _UNDEFINED ? response.data : {};
        	toastr.clear();
            if (code == _SUCCESS) {
            	callback(data);
            	toastr.info(message);
            } else {
            	toastr.error(message);
            }
		});
	},
	typeLoadBlock: {
		idWrap: '#wrap-config-type-load',
		init: function(){
			var self = this;

			self.initInput();

			$(document).on('change', 'select#type-load', function(e) {
				var typeLoad = $(this).val();
				if(typeLoad.length > 0){
					nhMain.callAjax({
			    		async: true,
			    		dataType: 'html',
						url: adminPath + '/mobile-app/block/config-type-load/' + typeLoad
					}).done(function(response) {
						$(self.idWrap).html(response);
						self.initInput();	
					});
				}
			});
		},
		initInput: function(){
			var self = this;
			var timeout = $('#timeout-select').val() > 0 ? nhMain.utilities.parseInt($(self.idWrap + ' #timeout-select').val()) : 5;
			$(self.idWrap + ' #timeout-select').ionRangeSlider({
	            grid: true,
	            min: 1,
	            max: 21,
	            from: timeout,
	            step: 2
	        });

	        nhMain.input.inputMask.init($('input.number-input'), 'number');
		}
	},
	managerItem:{
		idWrap: '#wrap-item-config',
		classItem: '.wrap-item',
		itemHtml: null,
		titleItem: 'Slider',
		init: function(options = {}){
			var self = this;
			if(typeof(options.titleItem) != _UNDEFINED){
				self.titleItem = options.titleItem;
			}
			self.itemHtml = $(self.idWrap + ' ' + self.classItem + ':first-child').length ? $(self.idWrap + ' ' + self.classItem + ':first-child')[0].outerHTML : '';

			$(self.idWrap).find(self.classItem).each(function(index) {
			  	self.initInputItem($(this));
			});

			self.clearAllErrorItem();

			$(document).on('click', '#add-item', function(e) {
				self.addNewItem();
			});

			$(document).on('click', self.idWrap + ' .btn-delete-item', function(e) {
				var item = $(this).closest(self.classItem);
				swal.fire({
			        title: nhMain.getLabel('xoa_ban_ghi'),
			        text: nhMain.getLabel('ban_co_chac_chan_muon_xoa_ban_ghi_nay'),
			        type: 'warning',
			        
			        confirmButtonText: '<i class="la la-trash-o"></i>' + nhMain.getLabel('dong_y'),
			        confirmButtonClass: 'btn btn-sm btn-danger',

			        showCancelButton: true,
			        cancelButtonText: nhMain.getLabel('huy_bo'),
			        cancelButtonClass: 'btn btn-sm btn-default'
			    }).then(function(result) {
			    	if(typeof(result.value) != _UNDEFINED && result.value){
			    		item.remove();
			    	}
			    });
			});

			$(document).on('click', self.idWrap + ' .btn-toggle-item', function(e) {
				var item = $(this).closest(self.classItem);

				var hidden = item.hasClass('kt-portlet--collapse');

				if(hidden){
					item.find('.kt-portlet__body').slideDown();
					item.removeClass('kt-portlet--collapse');
				}else{
					item.find('.kt-portlet__body').slideUp();
					item.addClass('kt-portlet--collapse');
				}
			});

			$(document).on('keyup', self.idWrap + ' ' + self.classItem +  ' input.item-name', function(e) {
				var name = $(this).val();
				if(name.length == 0){
					name = 'New Item';
				}

				var item = $(this).closest(self.classItem);
				item.find('.kt-portlet__head-title').text(name);
			});		

			$(document).on('click', '.btn-clear-image', function(e) {
		    	var wrap = $(this).closest('.kt-avatar');
		    	wrap.find('.kt-avatar__holder').css('background-image', '');
		    	wrap.removeClass('kt-avatar--changed');
		    	wrap.find('input[type="hidden"]').val('');
		    });  	
		},
		initInputItem: function(item = null){
			var self = this;
			if(item == null || item.length == 0) return;

			var indexItem = $(self.classItem).index(item[0]);

			// replace name input
			self.replaceNameInput(item);

			// replace data-url and id of input select image
			item.find('[btn-select-media-block]').each(function( index ) {
				var dataSrc = $(this).data('src');
				$(this).data('src', dataSrc + '_' + indexItem);
			});

			var inputImage = item.find('.input-select-image');			
			var _id = inputImage.attr('id');

			inputImage.attr('id', _id + '_' + indexItem);
			item.find('[block-preview-image]').attr('block-preview-image', _id + '_' + indexItem);
			item.find('[block-image-source]').attr('block-image-source', _id + '_' + indexItem);

			// // init select single image
			// nhMain.selectMedia.single.init();

			// init selectpicker
			item.find('.kt-selectpicker').each(function(index) {
			  	$(this).selectpicker();
			});

			// sortable item menu
			$(self.idWrap).sortable({
                connectWith: '.kt-portlet__head',
                items: '.kt-portlet' + self.classItem,
                opacity: 0.8,
                handle : '.kt-portlet__head',
                coneHelperSize: true,
                placeholder: 'kt-portlet--sortable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                helper: 'clone',
                tolerance: 'pointer',
                forcePlaceholderSize: !0,
                cancel: '.kt-portlet--sortable-empty',
                revert: 250,
                update: function( event, ui ) {
                	$(self.idWrap).find(self.classItem).each(function(index) {
					  	self.replaceNameInput($(this));
					});
                }
            });

            nhMobileBlockConfig.selectMedia.init();
		},
		replaceNameInput: function(item){
			var self = this;
			var indexItem = item.index();
			$('input, select, textarea', item).each(function () {
				if (typeof($(this).attr('data-name')) == _UNDEFINED) return;

				var name = 'items['+ indexItem +'][' + $(this).attr('data-name') + ']';
				if(typeof($(this).attr('data-mutiple')) != _UNDEFINED){
					name += '[]';
				}

				$(this).attr('name', name);				
			});

			// repace title item
			var number = indexItem + 1;
			item.find('.header-item').text(self.titleItem + ' ' + number);
		},
		addNewItem: function(){
			var self = this;

			$(self.idWrap).append(self.itemHtml);
			var item = $(self.idWrap).find(self.classItem + ':last-child');

			self.clearDataItem(item);
			self.initInputItem(item);
		},
		clearDataItem: function(item = null){
			if(item == null || item.length == 0) return;
			var self = this;

			item.find('.kt-portlet__head-title').text('New Item');

			$('input, select, textarea', item).each(function () {
				var typeInput = $(this).attr('type');
				if(typeInput == 'checkbox'){
					$(this).prop('checked', false);
				}else{
					$(this).val('');
				}
			});

			var wrapImage = item.find('.kt-avatar');
			wrapImage.removeClass('kt-avatar--changed');
			wrapImage.find('.kt-avatar__holder').css('background-image', '');
		},
		showErrorItem: function(item = null){
			var self = this;
			if(item == null || item == _UNDEFINED || item.length == 0) return;
			item.addClass('item-error');
			KTUtil.scrollTo(item[0], nhMain.validation.offsetScroll);
		},
		clearAllErrorItem: function(){
			var self = this;
			$(nhMobileBlockConfig.managerItem.idWrap).find(nhMobileBlockConfig.managerItem.classItem).removeClass('item-error');
		}
	},
	selectMedia:{
		type : null,
		copy: false,
		preview: false,
		init: function(params = {}, wrapElement = null){
			var self = this;

			if($('[btn-select-media-block]').length == 0) return false;

			if(typeof(params.copy) != _UNDEFINED && params.copy){
				self.copy = true;
			}

			if(typeof(params.preview) != _UNDEFINED && params.preview){
				self.preview = true;
			}

			$('[btn-select-media-block]').fancybox({
			   	closeExisting: true,
			   	iframe : {
			   		preload : false
			   	}
			});
			
			$(document).on('click', '[btn-select-media-block]', function(e) {
				self.resetOption();

				self.type = $(this).attr('btn-select-media-block');
				if($(this).attr('action') != _UNDEFINED && $(this).attr('action') == 'copy'){
					self.copy = true;
					copyMedia = true;
				}

				if($(this).attr('action') != _UNDEFINED && $(this).attr('action') == 'preview'){
					self.preview = true;
					previewMedia = true;
				}

				$(window).on('message', self.onSelectImage);
		    });

		    $(document).on('click', '.btn-clear-image', function(e) {
		    	var wrap = $(this).closest('.kt-avatar');
		    	wrap.find('.kt-avatar__holder').css('background-image', '');
		    	wrap.removeClass('kt-avatar--changed');
		    	wrap.find('input[type="hidden"]').val('');
		    });  
		},
		resetOption: function(){
			var self = this;

			self.copy = false;
			self.preview = false;

			copyMedia = false;
			previewMedia = false;
		},
		onSelectImage: function(e){
			var self = nhMobileBlockConfig.selectMedia;

			var event = e.originalEvent;
		   	if(event.data.sender === 'myfilemanager'){
		      	if(event.data.field_id){
		      		var field_id = event.data.field_id;
		      		var inputImage = $('#' + field_id);
		      		var inputSource = $('[block-image-source="' + field_id + '"]');
	
		      		var imageUrl = typeof(event.data.url) != _UNDEFINED ? event.data.url : null;			      		   	

					if(self.preview){
						self.previewImage(imageUrl, field_id);
					}
					
					// replace url image before set value for input
					if(isArray(imageUrl)){
						imageUrl = imageUrl[0];
					}
					imageUrl = imageUrl.replace(cdnUrl, '');


					// set value for input					
		      		if(inputImage.length > 0){		      			
		      			inputImage.val(imageUrl);
		      		}

		      		if(inputSource.length > 0) inputSource.val(self.type);

		      		if(self.copy){
		      			if(self.type == 'cdn') {
		      				imageUrl = '{CDN_URL}' + imageUrl;
		      			}

		      			if(self.type == 'template'){
		      				imageUrl = '{URL_TEMPLATE}' + imageUrl.replace(templatePath, '');
		      			}
		      			
						self.copyImage(imageUrl);
					}
					
					$.fancybox.close();
					$(window).off('message', self.onSelectImage);
		      	}
		   	}
		},
		copyImage: function(imageUrl = null, type = null){
			var self = this;

			var inputTmp = $('<input>');
			$('body').append(inputTmp);
			inputTmp.val(imageUrl).select();
			document.execCommand('copy');
			inputTmp.remove();

			toastr.success(nhMain.getLabel('da_copy_duong_dan_anh'));
		},
		previewImage: function(imageUrl = null, field_id = null){
			$('[block-preview-image="'+ field_id +'"]').find('.kt-avatar__holder').css('background-image', 'url("' + imageUrl + '")');
			$('[block-preview-image="'+ field_id +'"]').addClass('kt-avatar--changed');
		}
	},
	blockTab: {
		idWrap: '#wrap-item-config',
		classItem: '.wrap-item',
		wrapDataTab: '#wrap-data-tab',
		itemHtml: null,
		init: function(){
			var self = this;
			self.itemHtml = $(self.idWrap + ' ' + self.classItem + ':first-child').length ? $(self.idWrap + ' ' + self.classItem + ':first-child')[0].outerHTML : '';

			$(self.idWrap).find(self.classItem).each(function(index) {
			  	self.initInputItem($(this));
			});

			self.clearAllErrorItem();

			$(document).on('click', '#add-item', function(e) {
				self.addNewItem();
			});

			$(document).on('click', self.idWrap + ' .btn-delete-item', function(e) {
				var item = $(this).closest(self.classItem);
				swal.fire({
			        title: nhMain.getLabel('xoa_ban_ghi'),
			        text: nhMain.getLabel('ban_co_chac_chan_muon_xoa_ban_ghi_nay'),
			        type: 'warning',
			        
			        confirmButtonText: '<i class="la la-trash-o"></i>' + nhMain.getLabel('dong_y'),
			        confirmButtonClass: 'btn btn-sm btn-danger',

			        showCancelButton: true,
			        cancelButtonText: nhMain.getLabel('huy_bo'),
			        cancelButtonClass: 'btn btn-sm btn-default'
			    }).then(function(result) {
			    	if(typeof(result.value) != _UNDEFINED && result.value){
			    		item.remove();
			    	}
			    });
			});

			$(document).on('click', self.idWrap + ' .btn-toggle-item', function(e) {
				var item = $(this).closest(self.classItem);

				var hidden = item.hasClass('kt-portlet--collapse');

				if(hidden){
					item.find('.kt-portlet__body').slideDown();
					item.removeClass('kt-portlet--collapse');
				}else{
					item.find('.kt-portlet__body').slideUp();
					item.addClass('kt-portlet--collapse');
				}
			});

			$(document).on('keyup', self.idWrap + ' ' + self.classItem +  ' input.item-name', function(e) {
				var name = $(this).val();
				if(name.length == 0){
					name = 'New Item';
				}

				var item = $(this).closest(self.classItem);
				item.find('.kt-portlet__head-title').text(name);
			});		

			$(document).on('keyup keypress paste focus', self.idWrap + ' [input-suggest="product"]', function(e) {
				var itemMenu = $(this).closest(nhMobileBlockConfig.blockTab.classItem);
				var inputElement = $(this);
				var nameInput = $(this).attr('name');
				nhMain.autoSuggest.basic({
					inputSuggest: '[name="'+ nameInput +'"]',
					url: adminPath + '/product/auto-suggest-normal',
				}, function(response){
					if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
						nhMobileBlockConfig.blockTab.addDataSelectedAfterSuggest({
							id: response.id,
							name: response.name
						},{
							data_name: 'item['+ itemMenu.index() +'][data_ids][]'
						},
						inputElement);
					}
				});
				
				if(e.type == 'focusin'){
					$(this).autocomplete('search', $(this).val());
				}
			});

			$(document).on('keyup keypress paste focus', self.idWrap + ' [input-suggest="article"]', function(e) {
				var itemMenu = $(this).closest(nhMobileBlockConfig.blockTab.classItem);
				var inputElement = $(this);
				var nameInput = $(this).attr('name');
				nhMain.autoSuggest.basic({
					inputSuggest: '[name="'+ nameInput +'"]',
					url: adminPath + '/article/auto-suggest',
				}, function(response){
					if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
						nhMobileBlockConfig.blockTab.addDataSelectedAfterSuggest({
							id: response.id,
							name: response.name
						},{
							data_name: 'item['+ itemMenu.index() +'][data_ids][]'
						},
						inputElement);
					}
				});
				
				if(e.type == 'focusin'){
					$(this).autocomplete('search', $(this).val());
				}
			});

			$(document).on('click', self.idWrap + ' ' + self.idWrapDataSelected + ' .tagify__tag__removeBtn', function(e) {
				$(this).closest('.tagify__tag').remove();
			});

			$(document).on('change', nhMobileBlockConfig.blockTab.idWrap + ' select#type_tag', function(e) {
				var type = $(this).val();
				var itemMenu = $(this).closest(nhMobileBlockConfig.blockTab.classItem);
				self.loadViewTag(type, itemMenu);
			});	 

		},
		addNewItem: function(){
			var self = this;

			$(self.idWrap).append(self.itemHtml);
			var item = $(self.idWrap).find(self.classItem + ':last-child');

			self.clearDataItem(item);
			self.initInputItem(item);
		},
		clearDataItem: function(item = null){
			if(item == null || item.length == 0) return;
			var self = this;

			item.find('.kt-portlet__head-title').text('New Item');

			$('input, select, textarea', item).each(function () {
				var typeInput = $(this).attr('type');
				if(typeInput == 'checkbox'){
					$(this).prop('checked', false);
				}else{
					$(this).val('');
				}
			});

			item.find('#wrap-data-tab').html('');
		},
		initInputItem: function(item = null){
			var self = this;
			if(item == null || item.length == 0) return;

			var indexItem = $(self.classItem).index(item[0]);

			// replace name input
			self.replaceNameInput(item);

			// init selectpicker
			item.find('.kt-selectpicker').each(function(index) {
			  	$(this).selectpicker();
			});

			// sortable item menu
			$(self.idWrap).sortable({
                connectWith: '.kt-portlet__head',
                items: '.kt-portlet' + self.classItem,
                opacity: 0.8,
                handle : '.kt-portlet__head',
                coneHelperSize: true,
                placeholder: 'kt-portlet--sortable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                helper: 'clone',
                tolerance: 'pointer',
                forcePlaceholderSize: !0,
                cancel: '.kt-portlet--sortable-empty',
                revert: 250,
                update: function( event, ui ) {
                	$(self.idWrap).find(self.classItem).each(function(index) {
					  	self.replaceNameInput($(this));
					});
                }
            });
		},
		loadViewTag: function(type = null, itemMenu){
			var self = this;
			nhMain.callAjax({
	    		async: true,
	    		data:{
	    			type: type
	    		},
	    		dataType: 'html',
				url: adminPath + '/template/block/load-view-data-for-tab'
			}).done(function(response) {
				if(itemMenu != null && itemMenu.length){
					itemMenu.find(self.wrapDataTab).html(response);

					nhMobileBlockConfig.blockTab.replaceNameInput(itemMenu);
					itemMenu.find('.kt-selectpicker').each(function(index) {
					  	$(this).selectpicker();
					});
				}
			});
		},
		validateDataBeforeSubmit: function(){
			var self = this;

			nhMobileBlockConfig.managerItem.clearAllErrorItem();

			var validateData = true;
			$(nhMobileBlockConfig.managerItem.idWrap).find(nhMobileBlockConfig.managerItem.classItem).each(function(index) {
				var _tabItem = $(this);

				_tabItem.find('input.required').each(function(index) {
					if($(this).val().length == 0){
						toastr.error(nhMain.getLabel('vui_long_chon_nhap_thong_tin'));					
						nhMobileBlockConfig.managerItem.showErrorItem(_tabItem);
						validateData = false;
						return false;
					}
				});
			});

			return validateData;
		},
		addDataSelectedAfterSuggest: function(item = {}, params = {}, inputSuggest = null){
			var self = this;
			
			if($.isEmptyObject(item)) return;
			if(self.checkDataExistAfterSuggest(item.id)) return;
			if(inputSuggest == null || inputSuggest.length == 0) return;
			
			var nameInput = 'config[data_ids][]';
			if(typeof(params.data_name) != _UNDEFINED){
				nameInput = params.data_name;
			}

			var tagHtml = 
			'<span class="tagify__tag">\
	            <x class="tagify__tag__removeBtn" role="button"></x>\
	            <div><span class="tagify__tag-text">' + item.name + '</span></div>\
	            <input name="'+ nameInput +'" value="' + item.id + '" type="hidden">\
	        </span>';

			inputSuggest.closest(self.classItem).find(nhMobileBlockConfig.idWrapDataSelected).append(tagHtml);
		},
		checkDataExistAfterSuggest: function(id = null, inputSuggest = null){
			var self = this;			
			if(inputSuggest == null || inputSuggest.length == 0) return false;

			if(inputSuggest.closest(self.classItem).find(nhMobileBlockConfig.idWrapDataSelected).find('input[value="'+ id +'"]').length > 0){
				return true;
			}

			return false;
		},
		replaceNameInput: function(item){
			var self = this;
			var indexItem = item.index();
			$('input, select, textarea', item).each(function () {
				if (typeof($(this).attr('data-name')) == _UNDEFINED) return;

				var name = 'item['+ indexItem +'][' + $(this).attr('data-name') + ']';
				if(typeof($(this).attr('data-mutiple')) != _UNDEFINED){
					name += '[]';
				}

				$(this).attr('name', name);
				
			});
		},
		clearAllErrorItem: function(){
			var self = this;
			$(nhMobileBlockConfig.blockTab.idWrap).find(nhMobileBlockConfig.blockTab.classItem).removeClass('item-error');
		}
	},
	blockHtml: {
		init: function(){
			nhMobileBlockConfig.editorHtmlBlock = ace.edit('editor-html', {
				mode: 'ace/mode/smarty',
				theme: 'ace/theme/monokai',
				enableBasicAutocompletion: true,
		        enableSnippets: true,
		        enableLiveAutocompletion: true,
		        showPrintMargin: false,
		        minLines: 40,
	        	maxLines: 40
			});

			var htmlContent = $('#html-content').val();
			nhMobileBlockConfig.editorHtmlBlock.setValue(htmlContent);

			// show full screen
			$(document).on('click', '[nh-btn="full-screen-html-editor"]', function(e) {
				if(!$('#editor-html').hasClass('ace_editor')) return;
				$('#editor-html').addClass('full-screen-editor');
			});

			$(document).on('keydown', function(e) {
				if($('#editor-html').hasClass('full-screen-editor') && e.key == 'Escape'){
					$('#editor-html').removeClass('full-screen-editor');
				};
			});
		}
	},
	mobileAction: {
		modalElement: $('#get-action-redirect-modal'),
		wrapCategoryProduct: $('[nh-wrap="category_product"]'),
		wrapCategoryArticle: $('[nh-wrap="category_article"]'),
		wrapProductDetail: $('[nh-wrap="product_detail"]'),
		wrapArticleDetail: $('[nh-wrap="article_detail"]'),
		resultInput: $('[name="resultInput"]'),
		init: function(){
			var self = this;

			if(self.modalElement.length == 0) return;

			self.events();
		},
		events: function(){
			var self = this;

			var modalElement = self.modalElement;
			var resultInput = self.resultInput;

			$(document).on('click', '[nh-btn="show-modal-config-action"]', function(e) {				
				self.modalElement.modal('show');

				// truyền typeAction vào để check
				var type_result = $(this).attr('type_result');
				var type_result = $('[data-type-action=""]').attr('data-type-action', type_result);
				var checkTypeResult = $('[data-type-action]').attr('data-type-action');
				if (checkTypeResult == 'link') {
					modalElement.find('[nh-wrap="resultInput"]').removeClass('d-none');
				}
				if (checkTypeResult == 'json') {
					modalElement.find('[nh-btn="get-action-redirect"]').attr('data-dismiss', 'modal');
				}	
			});	
					
			modalElement.on('change', 'select[name="page"]', function(e) {
				var page = $(this).val() || '';
				var pageType = $(this).val() || '';
				modalElement.find('input[name="page_type"]').val(pageType);
				self.showRecordByPageType(pageType);
				self.modalElement.find('input[name="resultInput"]').val('');
			});

			modalElement.on('change', 'select[name="type"]', function(e) {		
				var value = $(this).val() || '';
				self.hideAndClearAllrecord(value);
			});

			modalElement.on('keyup keypress paste focus', '[nh-wrap="product_detail"] #product-suggest', function(e) {
				nhMain.autoSuggest.basic({
					inputSuggest: '#product-suggest',
					url: adminPath + '/product/auto-suggest-normal',
				}, function(response){
					if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
						self.addRecordSelected(
							{
								id: response.id,
								name: response.name
							},
							_PRODUCT
						);
					}
				});
				
				if(e.type == 'focusin'){
					$(this).autocomplete('search', $(this).val());
				}
			});

			modalElement.on('keyup keypress paste focus', '[nh-wrap="article_detail"] #article-suggest', function(e) {
				nhMain.autoSuggest.basic({
					inputSuggest: '#article-suggest',
					url: adminPath + '/article/auto-suggest',
				}, function(response){
					if(!$.isEmptyObject(response) && typeof(response.id) != _UNDEFINED && typeof(response.name) != _UNDEFINED){
						self.addRecordSelected(
							{
								id: response.id,
								name: response.name
							},
							_ARTICLE
						);
					}
				});
				
				if(e.type == 'focusin'){
					$(this).autocomplete('search', $(this).val());
				}
			});

			modalElement.on('click', '.tagify__tag__removeBtn', function(e) {
				$(this).closest('.tagify__tag').remove();
			});

			modalElement.on('click', '.btn-copy', function(e) {
				var result_Input = resultInput.val();
				console.log(result_Input);
				var input_tmp = $('<input>');
					modalElement.append(input_tmp);
					input_tmp.val(result_Input).select();
					document.execCommand('copy');
					input_tmp.remove();

					toastr.success(nhMain.getLabel('da_copy_duong_dan'));
			});

			modalElement.on('click', '[nh-btn="get-action-redirect"]', function(e) {
				
				var	btnElement = $(this);
				   
				var formElement = modalElement.find('form');
				if(formElement.length == 0) return;

				KTApp.progress(btnElement);
				
				
				var typeResult = $('[data-type-action]').attr('data-type-action');
				
				var formData = formElement.serialize();
				nhMain.callAjax({
					url: formElement.attr('action'),
					data: formData
				}).done(function(response) {
					KTApp.unprogress(btnElement);

					//show message and redirect page
				   	var code = response.code || _ERROR;
		        	var message = nhMain.getLabel('lay_cau_hinh_thanh_cong') || '';
		        	var data = response.data || {};
		        	var action = data.action || '';
		     	
		        	toastr.clear();
		            if (code == _SUCCESS) {
		            	toastr.info(message);	
		            	if(typeResult == 'json')
		            	{	
		            		$('[nh-input="result-json"]').val(JSON.stringify(action));
		            		
		            	} 		            
		            	if(typeResult == 'link') resultInput.val(data.data_url);
		            	          				            	
		            } else {
		            	toastr.error(message);
		            }
				});
			});	
		},
		hideAndClearAllrecord: function(value = null){
			var self = this;

			self.modalElement.find('[nh-wrap="pages"]').toggleClass('d-none', value != 'redirect');
			self.modalElement.find('[nh-wrap="forms"]').toggleClass('d-none', value != 'form');
			self.wrapProductDetail.find('.tagify__tag').remove();
			self.wrapArticleDetail.find('.tagify__tag').remove();
				
			self.modalElement.find('select[name="form"]').val('').selectpicker('refresh');
			self.modalElement.find('select[name="page"]').val('').selectpicker('refresh');
			self.modalElement.find('select[name="category_product_id"]').val('').selectpicker('refresh');
			self.modalElement.find('select[name="category_article_id"]').val('').selectpicker('refresh');
			self.modalElement.find('input[name="resultInput"]').val('');
			self.wrapCategoryProduct.addClass('d-none');
			self.wrapCategoryArticle.addClass('d-none');
			self.wrapProductDetail.addClass('d-none');
			self.wrapCategoryProduct.addClass('d-none');
		},
		showRecordByPageType: function(pageType = null){
			var self = this;

			self.hideAndClearRecord();

			switch(pageType){

				case _CATEGORY_PRODUCT:
					self.wrapCategoryProduct.removeClass('d-none');
				break;

				case _CATEGORY_ARTICLE:
					self.wrapCategoryArticle.removeClass('d-none');
				break;

				case _PRODUCT_DETAIL:
					self.wrapProductDetail.removeClass('d-none');
				break;

				case _ARTICLE_DETAIL:
					self.wrapArticleDetail.removeClass('d-none');
				break;
			}
		},
		hideAndClearRecord: function(){
			var self = this;

			var categoryProductSelect = self.wrapCategoryProduct.find('select[name="category_product_id"]');
			categoryProductSelect.val('').selectpicker('refresh');
			
			var categoryArticleSelect = self.wrapCategoryArticle.find('select[name="category_article_id"]');
			categoryArticleSelect.val('').selectpicker('refresh');

			self.wrapProductDetail.find('.tagify__tag').remove();
			self.wrapArticleDetail.find('.tagify__tag').remove();

			self.wrapCategoryProduct.addClass('d-none');
			self.wrapCategoryArticle.addClass('d-none');
			self.wrapProductDetail.addClass('d-none');
			self.wrapArticleDetail.addClass('d-none');
		},
		addRecordSelected: function(item = {}, type = null){
			var self = this;

			var wrapDataElement = self.modalElement.find(`[nh-wrap="${type}-selected"]`);			
			if(wrapDataElement.length == 0) return;

			if($.isEmptyObject(item)) return;
			if(self.checkDataExist(item.id, type)) return;


			var tagHtml = `
			<span class="tagify__tag">
	            <x class="tagify__tag__removeBtn" role="button"></x>
	            <div><span class="tagify__tag-text">${item.name}</span></div>
	            <input name="${type}_ids[]" value="${item.id}" type="hidden">
	        </span>`;

	        wrapDataElement.append(tagHtml);			
		},
		
		checkDataExist: function(id = null, type = null){
			var self = this;

			var wrapDataElement = self.modalElement.find(`[nh-wrap="${type}-selected"]`);
			if(wrapDataElement.length == 0) return false;

			if(wrapDataElement.find('input[value="'+ id +'"]').length > 0) return true;
			return false;
		}
	}

}
