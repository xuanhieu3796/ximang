{strip}
<div class="menu-container">
	<a class="btn-menu-mobile" nh-menu="btn-open" menu-type="main" href="javascript:;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 7.75H3C2.59 7.75 2.25 7.41 2.25 7C2.25 6.59 2.59 6.25 3 6.25H21C21.41 6.25 21.75 6.59 21.75 7C21.75 7.41 21.41 7.75 21 7.75Z" fill="#292D32"/>
            <path d="M21 12.75H3C2.59 12.75 2.25 12.41 2.25 12C2.25 11.59 2.59 11.25 3 11.25H21C21.41 11.25 21.75 11.59 21.75 12C21.75 12.41 21.41 12.75 21 12.75Z" fill="#292D32"/>
            <path d="M21 17.75H3C2.59 17.75 2.25 17.41 2.25 17C2.25 16.59 2.59 16.25 3 16.25H21C21.41 16.25 21.75 16.59 21.75 17C21.75 17.41 21.41 17.75 21 17.75Z" fill="#292D32"/>
        </svg>
    </a>
    <div class="back-drop"></div>

	<nav class="menu-section" nh-menu="sidebar" menu-type="main">
		<div class="menu-top">
			<span class="menu-header">Menu</span>
			<a href="javascript:;" nh-menu="btn-close" class="close-sidebar effect-rotate icon-close">
				<i class="fa-light fa-xmark"></i>
			</a>
		</div>

		{if !empty($data_block)}
			<ul>
				{foreach from = $data_block item = menu}
					{assign var = class_has_child value = ""}
					{if !empty($menu.has_sub_menu)}
						{assign var = class_has_child value = "has-child "}
					{/if}

					{assign var = class_position value = ""}
					{if !empty($menu.view_item) && $menu.view_item == 'sub_dropdown'}
						{assign var = class_position value = "position-relative "}
					{/if}

					{assign var = class_item value = ""}
					{if !empty($menu.class_item)}
						{assign var = class_item value = $menu.class_item}
					{/if}
					
					{if !empty($menu.name)}
						{assign var = image_source value = ''}
						{if !empty($menu.image) && !empty($menu.image_source)}
							{assign var = image_source value = $menu.image_source}
						{/if}

						{assign var = image_url value = ''}
						{if !empty($menu.image) && $image_source == 'cdn'}
							{assign var = image_url value = "{CDN_URL}{$menu.image}"}
						{/if}

						{if !empty($menu.image) && $image_source == 'template'}
							{assign var = image_url value = "{$menu.image}"}
						{/if}

						<li class="{$class_position}{$class_has_child}{$class_item}">
                            {if !empty($menu.image)}
                                <img src="{$image_url}" alt="{$menu.name}" class="marker-image" />
                            {/if}
							<a href="{if !empty($menu.url)}{$this->Utilities->checkInternalUrl($menu.url)}{else}/{/if}"
								{if !empty($menu.blank_link)}target="_blank"{/if}>
								{$menu.name|escape|truncate:60:" ..."}
								<span class="fa-light fa-chevron-down"></span>
							</a>

							{if empty($menu.data_sub_menu) && !empty($menu.data_extend_sub_menu)}
                                {$menu.data_sub_menu = $menu.data_extend_sub_menu}
                            {/if}

							{if !empty($menu.data_sub_menu)}
								{assign var = parent_menu_code value = $this->Utilities->randomCode()}
								
                                {assign var = data_child value = $menu.data_sub_menu}
                                {if $menu.type_sub_menu == 'custom'}
                                    {assign var = data_child value = $this->Block->getLocale('data_sub_menu', $menu.data_sub_menu)}
                                {/if}
                                
								<span class="grower" nh-toggle="{$parent_menu_code}"></span>

								{$this->element("../block/{$block_type}/{$menu.view_item}", [
									'data_sub_menu' => $data_child,
									'parent_menu_code' =>  $parent_menu_code
								])}
							{/if}
						</li>
					{/if}
				{/foreach}
			</ul>
		{/if}
	</nav>
</div>
{/strip}