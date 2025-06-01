{$this->element('breadcrumb', [
	'list_url' => [
		['title' => {$title_for_layout}]
	]
])}
 
{assign var = customer_id value = null}
{if !empty($member.customer_id)}
    {assign var = customer_id value = $member.customer_id}
{/if}

<div class="container">
	<div class="row">
		<div class="col-12 col-md-3 col-lg-3">
			{$this->element('../Member/element_menu')}
		</div>
		<div class="col-12 col-md-9 col-lg-9">
			<div class="h-100 bg-white p-4 rounded-8">
				<form nh-form="list-saved-post" action="/member/saved-post" method="POST" autocomplete="off" class="h-100">
	                <div class="row space-5 search-member">
						<div class="col-12 col-md-4">
							<div class="form-group form-group-code">
								<div class="input-group">
									<i class="iconsax isax-search-normal-1"></i>
									<input name="keyword" value="{if !empty($keyword)}{$keyword}{/if}" type="text" placeholder="{__d('template', 'tu_khoa_tim_kiem')}" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div nh-form="table-saved-post" class="list-subscription-element h-100">
						{$this->element('../Member/element_list_saved_post')}						
					</div>
                </form>
			</div>
		</div>
	</div>
</div>
