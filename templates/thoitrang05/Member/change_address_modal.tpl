<div id="change-address-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
			<div class="modal-body p-4">
				<div class="d-flex justify-content-between align-items-center mb-4">
					<div class="h5 modal-title font-weight-bold text-uppercase d-inline-block">{__d('template', 'dia_chi_nhan_hang')}</div>
					<button type="button" class="close effect-rotate icon-close" data-dismiss="modal" aria-label="Close">
						<i class="fa-light fa-xmark"></i>
					</button>
				</div>
				{$this->element('../Member/element_address_form')}
			</div>

        </div>   
    </div>
</div>