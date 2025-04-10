"use strict";
function getOptionsDataTable(){
	var columns = [
			{
				field: 'code',
				title: nhMain.getLabel('ma_don_hang'),
				sortable: false,
				width: 170,
				autoHide: false,
				template: function(row){
					var code = typeof(row.code) != _UNDEFINED && row.code != null ? row.code : '';
					var source = typeof(row.source) != _UNDEFINED && row.source != null ? row.source : '';
					var created = typeof(row.created) != _UNDEFINED && row.created != null ? row.created : '';
					var detailUrl = adminPath + '/order/detail/' + row.id;
					var print = adminPath + '/print?code=ORDER&id_record=' + row.id;

					return `
					<div class="code-time nh-weight">\
						<div> <i class="fas fa-qrcode"></i> <a href="${detailUrl}">${code}</a></div>\
						<div> <i class="far fa-clock"></i> ${nhMain.utilities.parseIntToDateTimeString(row.created)}</div>\
						<div> <i class="fa fa-print"></i> <a target="_blank" href="${print}">${nhMain.getLabel('in_don_hang')}</a></div>\
					</div>`;
				}
			},
			{
				field: 'contact',
				title: nhMain.getLabel('khach_hang'),
				sortable: false,
				width: 250,
				template: function(row){
					var full_name = typeof(row.contact.full_name) != _UNDEFINED && row.contact.full_name != null ? row.contact.full_name : '';
					var phone = typeof(row.contact.phone) != _UNDEFINED && row.contact.phone != null ? row.contact.phone : '';
					var full_address = typeof(row.contact.full_address) != _UNDEFINED && row.contact.full_address != null ? row.contact.full_address : '';

					return '\
					<div class="contact-order nh-weight">\
						<div> <span>'+ nhMain.getLabel('ho_ten') + '</span>: ' + full_name +'</div>\
						<div> <span>'+ nhMain.getLabel('so_dien_thoai') + '</span>: ' + phone +'</div>\
						<div> <span>'+ nhMain.getLabel('dia_chi') + '</span>: ' + full_address +'</div>\
					</div>';
				}
			},
			{
				field: 'count_items',
				title: nhMain.getLabel('SL'),
				width: 50,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
			},
			{
				field: 'total',
				title: nhMain.getLabel('tong_tien'),
				width: 80,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function (row) {
					var total = '';
					if(KTUtil.isset(row, 'total') && row.total != null){
						total = nhMain.utilities.parseNumberToTextMoney(row.total);
					}
					return total;
				}
			},
			{
				field: 'payment',
				title: nhMain.getLabel('thanh_toan'),
				sortable: false,
				width: 200,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function(row){
					var paid = typeof(row.paid) != _UNDEFINED && row.paid != null ? row.paid : '';
					var debt = typeof(row.debt) != _UNDEFINED && row.debt != null ? row.debt : '';

					var cod_paid = typeof(row.cod_paid) != _UNDEFINED && row.cod_paid != null ? row.cod_paid : '';
					var cash_paid = typeof(row.cash_paid) != _UNDEFINED && row.cash_paid != null ? row.cash_paid : '';
					var bank_paid = typeof(row.bank_paid) != _UNDEFINED && row.bank_paid != null ? row.bank_paid : '';
					var credit_paid = typeof(row.credit_paid) != _UNDEFINED && row.credit_paid != null ? row.credit_paid : '';
					var gateway_paid = typeof(row.gateway_paid) != _UNDEFINED && row.gateway_paid != null ? row.gateway_paid : '';
					var voucher_paid = typeof(row.voucher_paid) != _UNDEFINED && row.voucher_paid != null ? row.voucher_paid : '';

					var html_payment_method ='';
					if(cod_paid > 0) {
						html_payment_method = '<p>' + nhMain.getLabel('thu_ho') + '(COD): ' + nhMain.utilities.parseNumberToTextMoney(cod_paid) +'</p>';
					}

					if(cash_paid > 0) {
						html_payment_method += '<p>' + nhMain.getLabel('tien_mat') + ': ' + nhMain.utilities.parseNumberToTextMoney(cash_paid) +'</p>';
					}

					if(bank_paid > 0) {
						html_payment_method += '<p>' + nhMain.getLabel('chuyen_khoan') + ': ' + nhMain.utilities.parseNumberToTextMoney(bank_paid) +'</p>';
					}

					if(credit_paid > 0) {
						html_payment_method += '<p>' + nhMain.getLabel('quet_the') + ': ' + nhMain.utilities.parseNumberToTextMoney(credit_paid) +'</p>';
					}

					if(gateway_paid > 0) {
						html_payment_method += '<p>' + nhMain.getLabel('cong_thanh_toan') + ': ' + nhMain.utilities.parseNumberToTextMoney(gateway_paid) +'</p>';
					}

					if(voucher_paid > 0) {
						html_payment_method += '<p>' + nhMain.getLabel('thanh_toan_bang_voucher') + ': ' + nhMain.utilities.parseNumberToTextMoney(voucher_paid) +'</p>';
					}

					var return_paid = '';
					if ( paid > 0 ) {
						return_paid = '\
						<div style="margin-bottom: 5px">\
							<span class="text-primary" >\
							 ' + nhMain.getLabel('da_thanh_toan') + '</span>: \
							 <span class=" kt-link popover-payment-method"\
							 data-toggle="kt-popover" data-html="true" \
							 data-original-title="' + nhMain.getLabel('thanh_toan') + '" \
							 data-content="' + html_payment_method +'">\
							 ' + nhMain.utilities.parseNumberToTextMoney(paid) +'</span>\
						</div>';
					}

					if ( debt > 0  ) {
						return '\
						<div class="nh-weight">\
							'+ return_paid +'\
							<div class="text-danger"> <span>'+ nhMain.getLabel('con_no') + '</span>: ' + nhMain.utilities.parseNumberToTextMoney(debt) +'</div>\
						</div>';
					} else {
						return '\
						<div class="nh-weight">\
							<div class="text-success kt-link popover-payment-method"\
								 data-toggle="kt-popover" data-html="true" \
								 data-original-title="' + nhMain.getLabel('thanh_toan') + '" \
								 data-content="' + html_payment_method +'">\
								 <span>' + nhMain.getLabel('thanh_toan_hoan_tat') + '</span>\
							</div>\
						</div>';
					}
				}
			},
			{
				field: 'note',
				title: nhMain.getLabel('ghi_chu'),
				sortable: false,
				width: 200,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function(row){
					var staff_note = typeof(row.staff_note) != _UNDEFINED && row.staff_note != null ? row.staff_note : '';

					var _htmlNoteCustomer = '';
					var _htmlNoteStaff = '<div class="nh-note-staff nh-weight">\
												' + nhList.template.changeNote(row.id, 'staff_note', staff_note, nhMain.getLabel('ghi_chu_nhan_vien')) +'\
											</div>';

					if (typeof(row.note) != _UNDEFINED && row.note != null) {
						var note = typeof(row.note) != _UNDEFINED && row.note != null ? row.note : '';

						_htmlNoteCustomer = '<div class="nh-note-customer nh-weight">\
												<span>'+ nhMain.getLabel('khach_hang') + ':</span> ' + note +'\
											</div>';
					}

					if (typeof(row.staff_note) != _UNDEFINED && row.staff_note != null) {
						_htmlNoteStaff = '<div class="nh-note-staff nh-weight">\
												<span>'+ nhMain.getLabel('nhan_vien') + ':</span> ' + nhList.template.changeNote(row.id, 'staff_note', staff_note, nhMain.getLabel('ghi_chu_nhan_vien')) +'\
											</div>';
					}

					return _htmlNoteCustomer + _htmlNoteStaff;
				}
			},
			{
				field: 'source',
				title: nhMain.getLabel('nguon_don'),
				sortable: true,
				textAlign: 'center',
				width: 90,
				template: function (row) {
					
					var source = `${nhMain.getLabel(row.source)}`;
					return source;
				}			
			},
			{
				field: 'discount',
				title: nhMain.getLabel('khuyen_mai'),
				sortable: false,
				textAlign: 'center',
				width: 200,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function(row){			
					var _htmldiscount_type =  '';
					var _htmlDiscount_value = '';
					var _htmlCoupon_code = '';
				
					if(typeof(row.coupon_code) != _UNDEFINED && row.coupon_code != null) {
						var coupon_code = typeof(row.coupon_code) != _UNDEFINED && row.coupon_code != null ? row.coupon_code : '';
						_htmlCoupon_code = '<div> <span>'+ nhMain.getLabel('Coupon')+ '</span>: ' + coupon_code +'</div>';
					}
					if(typeof(row.discount_type) != _UNDEFINED && row.discount_type != null) {
						var discount_type = typeof(row.discount_type) != _UNDEFINED && row.discount_type != null ? row.discount_type : '';
						switch(discount_type){
			                case 'percent':		          
			                  	discount_type = '<i class="fa fa-percent text-success"> </i>';
			                break;
			                case 'money':
			                	discount_type = '<i class="fa fa-money-bill-wave text-success"> </i>';		                    
			                break;    
            			}
						_htmldiscount_type = '<div> <span>'+ nhMain.getLabel('loai_khuyen_mai')+ '</span>: ' + discount_type +'</div>';
					}

					if(typeof(row.discount_value) != _UNDEFINED && row.discount_value != 0) {
						var discount_value = typeof(row.discount_value) != _UNDEFINED && row.discount_value != null ? row.discount_value : '';
						var total_discount = typeof(row.total_discount) != _UNDEFINED && row.total_discount != null ? row.total_discount : ''
						switch(row.discount_type){
			                case 'percent':		          
			                  	_htmlDiscount_value = '<div> <span>'+ nhMain.getLabel('tong_khuyen_mai') + '</span>: ' +nhMain.utilities.parseNumberToTextMoney(total_discount)+'(-'+ discount_value +'%)</div>';
			                break;
			                case 'money':
			                	_htmlDiscount_value = '<div> <span>'+ nhMain.getLabel('tong_khuyen_mai') + '</span>: ' + nhMain.utilities.parseNumberToTextMoney(total_discount) +'</div>';	                    
			                break;
			     
            			}
					}

					return '<div class="nh-note-staff nh-weight ">\
												'+_htmlCoupon_code + _htmldiscount_type + _htmlDiscount_value +'\
											</div>';

				}		
			},
			{
				field: 'shipping',
				title: nhMain.getLabel('van_chuyen'),
				sortable: false,
				textAlign: 'center',
				width: 200,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function(row){
				var htmlshipping_fee_customer = '';					
					var htmlshipping_fee_partner =  '';
					var htmlshipping_note ='';

					if(typeof(row.shipping_fee_customer) != _UNDEFINED && row.shipping_fee_customer != 0) {
						var shipping_fee_customer = typeof(row.shipping_fee_customer) != _UNDEFINED && row.shipping_fee_customer != null ? row.shipping_fee_customer : '';

						htmlshipping_fee_customer = '<div> <span>'+ nhMain.getLabel('phi_van_chuyen') + '</span>: ' + nhMain.utilities.parseNumberToTextMoney(shipping_fee_customer) +'</div>';
					}

					if(typeof(row.shipping_fee_partner) != _UNDEFINED && row.shipping_fee_partner != 0) {
						var shipping_fee_partner = typeof(row.shipping_fee_partner) != _UNDEFINED && row.shipping_fee_partner != null ? row.shipping_fee_partner : '';

						htmlshipping_fee_partner = '<div> <span>'+ nhMain.getLabel('phi_van_chuyen_tu_hang') + '</span>: ' + nhMain.utilities.parseNumberToTextMoney(shipping_fee_partner) +'</div>';
					}

					if(typeof(row.shipping_note) != _UNDEFINED && row.shipping_note != null) {
						var shipping_note = typeof(row.shipping_note) != _UNDEFINED && row.shipping_note != null ? row.shipping_note : '';

						htmlshipping_note = '<div> <span>'+ nhMain.getLabel('ghi_chu') + '</span>: ' + shipping_note +'</div>';

					}

					return '<div class="nh-note-staff nh-weight ">\
												' + htmlshipping_fee_customer + htmlshipping_fee_partner  + htmlshipping_note +'\
											</div>';

				}		
			},
			
			{
				field: 'status',
				title: `<span>${nhMain.getLabel('trang_thai')} <span nh-btn="setting-field-view" class="fa fa-cog fs-13  ml-3 "> </span><span>` ,
				sortable: false,
				width: 120,
				autoHide: false,
				responsive: {
				  	visible: 'md',
				  	hidden: 'xs'
				},
				template: function(row) {
					var status = '';
					if(KTUtil.isset(row, 'status') && row.status != null){
						status = nhList.template.statusOrders(row.status);
					}
					if(KTUtil.isset(row, 'customer_cancel') && row.customer_cancel == 1){
						status = nhList.template.statusOrders(_CUSTOMER_CANCEL);
					}
					return status;
				},
			}
			// {
   //              field: 'action',
   //              title: '',
   //              sortable: false,
   //              width: 50,
   //              autoHide: false,
   //              template: function(row) {
   //              	var detailUrl = adminPath + '/order/detail/' + row.id;
   //              	var printUrl = adminPath + '/print/ORDER/' + row.id;

   //                  return '\
			// 			<div class="dropdown">\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
   //                              <i class="la la-cog"></i>\
   //                          </a>\
			// 			  	<div class="dropdown-menu dropdown-menu-right">\
			// 			    	<a class="dropdown-item" href="'+ detailUrl +'" target="_blank"><i class="la la-edit"></i> ' + nhMain.getLabel('chi_tiet_don_hang') + '</a>\
			// 			    	<a class="dropdown-item" href="'+ printUrl +'" target="_blank"><i class="la la-print"></i> ' + nhMain.getLabel('in_don_hang') + '</a>\
			// 			  	</div>\
			// 			</div>\
			// 		';
   //              },
			// }	
	];

	var finalColumns = [];
	$('#setting-field-modal').find('input[type="checkbox"]:checked').each(function() {
		var name = $(this).attr('name').match(/\[([^\]]+)\]/)[1] || ''; 
		if(name == '') return;
		$.each(columns, function(index, col) {
		    if(col.field == name) {
		    	finalColumns.push(col);
		    }
		}); 
	});

	var statusColumn = finalColumns.find(col => col.field === 'status');
	if (statusColumn) {
		finalColumns = finalColumns.filter(col => col.field !== 'status');
		finalColumns.push(statusColumn);
	}
	finalColumns = finalColumns.length != 0 ? finalColumns : columns;

	var options = {
		data: {
			type: 'remote',
			source: {
				read: {
					url: adminPath + '/order/list/json',
					params: {
						query: {
							type: _ORDER
						},
					},
					headers: {
						'X-CSRF-Token': csrfToken
					},
					map: function(raw) {
						var dataSet = raw;
						if (typeof raw.data !== _UNDEFINED) {
							dataSet = raw.data;
						}
						return dataSet;
					},
				},
			},
			pageSize: paginationLimitAdmin,
			serverPaging: true,
			serverFiltering: true,
			serverSorting: true,
		},
		
		layout: {
			scroll: false,
			footer: false,
			class: 'table-hover',
		},

		sortable: true,

		pagination: true,
		extensions: {
			checkbox: true
		},
		search: {
			input: $('#nh-keyword'),
		},

		translate: {
            records: {
                processing: nhMain.getLabel('vui_long_cho') +  ' ...',
                noRecords: nhMain.getLabel('khong_co_ban_ghi_nao'),
            }
        },
        
		columns: finalColumns
	};

	return options;
}

var nhListOrder = function() {
	
	return {
		listData: function() {
			nhMain.location.init({
				idWrap: ['.nh-search-advanced']
			});

  			$('.kt_datepicker').datepicker({
	            format: 'dd/mm/yyyy',
	            todayHighlight: true,
	            autoclose: true,
	            endDate: '0d'
  			});

			$('.number-input').each(function() {
				nhMain.input.inputMask.init($(this), 'number');
			});

			var options = getOptionsDataTable();
			var datatable = $('.kt-datatable').KTDatatable(options);
			var supperAdmin = $('.kt-datatable').attr('nh-role') == 'supper-admin' ? true : false;
			if (supperAdmin) $('[nh-btn="setting-field-view"]').remove();
		    $('#nh_status').on('change', function() {
		      	datatable.search($(this).val(), 'status');
		    });		

		    $('#source').on('change', function() {
		      	datatable.search($(this).val(), 'source');
		    });

		    $('#branch_id').on('change', function() {
		      	datatable.search($(this).val(), 'branch_id');
		    });  

		    $('#city_id').on('change', function() {
		      	datatable.search($(this).val(), 'city_id');
		    }); 

		    $('#district_id').on('change', function() {
		      	datatable.search($(this).val(), 'district_id');
		    });  	

		    $('#ward_id').on('change', function() {
		      	datatable.search($(this).val(), 'ward_id');
		    }); 

		    $('#price_from').on('change', function() {
		      	datatable.search($(this).val(), 'price_from');
		    });

		    $('#price_to').on('change', function() {
		      	datatable.search($(this).val(), 'price_to');
		    });

		    $('#staff_id').on('change', function() {
		      	datatable.search($(this).val(), 'staff_id');
		    });

		    $('#created_by').on('change', function() {
		      	datatable.search($(this).val(), 'created_by');
		    }); 

		    $('#create_from').on('change', function() {
		      	datatable.search($(this).val(), 'create_from');
		    });

		    $('#create_to').on('change', function() {
		      	datatable.search($(this).val(), 'create_to');
		    });	

		    $('#note').on('change', function() {
		      	datatable.search($(this).val(), 'note');
		    });  

		    $('#pay_status').on('change', function() {
		      	datatable.search($(this).val(), 'pay_status');
		    }); 
		    
		    // event delete and change status on list
		    nhList.eventDefault(datatable, {
		    	url: {
			    	note: adminPath + '/order/change-note'
			    }
		    });

		    $(document).on('click', '[nh-export]', function(e) {
                e.preventDefault();
                KTApp.blockPage(blockOptions);
                var nhExport = typeof($(this).attr('nh-export')) != _UNDEFINED ? $(this).attr('nh-export') : '';
                var page = typeof(datatable.getCurrentPage()) != _UNDEFINED ? datatable.getCurrentPage() : 1;

                var data_filter = {
					lang: nhMain.lang,
					keyword: $('#nh-keyword').val(),
					status: $('[name=status]').val(),
					pay_status: $('[name=pay_status]').val(),
					source: $('[name=source]').val(),
					city_id: $('[name=city_id]').val(),
					district_id: $('[name=district_id]').val(),
					ward_id: $('[name=ward_id]').val(),
					price_from: $('[name=price_from]').val(),
					price_to: $('[name=price_to]').val(),
					staff_id: $('[name=staff_id]').val(),
					create_from: $('[name=create_from]').val(),
					create_to: $('[name=create_to]').val(),
				}

                nhMain.callAjax({
                    url: adminPath + '/order/list/json',
					data: {
						'data_filter': data_filter,
						'pagination': {page: page},
						'get_staff': true,
						'export': nhExport
					}
                }).done(function(response) {
                    KTApp.unblockPage();
                    var code = typeof(response.code) != _UNDEFINED ? response.code : _ERROR;
                    var message = typeof(response.message) != _UNDEFINED ? response.message : '';
                    var name = typeof(response.meta.name) != _UNDEFINED ? response.meta.name : '';

                    var $tmp = $("<a>");
                    $tmp.attr("href",response.data);
                    $("body").append($tmp);
                    $tmp.attr("download", name + '.xlsx');
                    $tmp[0].click();
                    $tmp.remove();

                    if (code == _SUCCESS) {
                        toastr.info(message);
                    } else {
                        toastr.error(message);
                    }
                });
        
                return false;
            });	

		    $('.kt-selectpicker').selectpicker();
		    
		    $(document).on('mouseenter', '.kt-datatable .popover-payment-method', function() {
				$(this).popover({
	    			html: true,
	    			trigger: 'hover',
	    			placement: 'top'
		        });
		        $(this).popover('show');
		    });

		    var tagify = new Tagify(document.getElementById('source'), {
	            pattern: /^.{0,45}$/,
	            delimiters: ", ",
	            maxTags: 10,
	            whitelist: ["Direct" ,"Website", "Google", "Shopee", "Tiki", "Lazada", "Zalo", "Facebook", "Mobile App", "Nguồn khác"],
	            dropdown: {
		            maxItems: 20,           // <- mixumum allowed rendered suggestions
		            classname: 'tags-look', // <- custom classname for this dropdown, so it could be targeted
		            enabled: 0,             // <- show suggestions on focus
		            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
		        }
	        });
		}
	};
}();

jQuery(document).ready(function() {
	nhListOrder.listData();
	nhSettingListField.init();
});

