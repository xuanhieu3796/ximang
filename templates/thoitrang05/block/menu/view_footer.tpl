{strip}
<div class="menu-footer">
    {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
    	<div class="title-footer">
    		{$this->Block->getLocale('tieu_de', $data_extend)}
    	</div>
    {/if}
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
						<a href="{if !empty($menu.url)}{$this->Utilities->checkInternalUrl($menu.url)}{else}/{/if}"
							{if !empty($menu.blank_link)}target="_blank"{/if}>
							{$menu.name|escape|truncate:60:" ..."}
						</a>
					</li>
				{/if}
			{/foreach}
		</ul>
	{/if}
</div>
{/strip}