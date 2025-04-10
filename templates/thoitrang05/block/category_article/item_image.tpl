{strip}
{if !empty($categories)}
	{foreach from = $categories item = category}
		<div class="col-lg-4 col-md-4 col-6">
		    <div class="item">
		        <a {if !empty($category.url)}href="{$this->Utilities->checkInternalUrl($category.url)}"{/if}>
		            <div class="img ratio-3-2">
                        {if !empty($category.image_avatar)}
                            {assign var = url_img value = "{CDN_URL}{$this->Utilities->getThumbs($category.image_avatar, 350)}"}
                        {else}
                            {assign var = url_img value = "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="}
                        {/if}
                    
                        {$this->LazyLoad->renderImage([
                                'src' => $url_img, 
                                'alt' => "{if !empty($category.name)}{$category.name}{/if}", 
                                'class' => 'img-fluid'
                            ])}
                    </div>
    				<div class="name">
    				    {$category.name|escape|truncate:80:" ..."}
    				</div>
    			</a>
		    </div>
		</div>
	{/foreach}
{/if}
{/strip}