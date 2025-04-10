{strip}
{if !empty($data_block)}
	<div class="box-follow">
        {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
        	<div class="title-footer">
        		{$this->Block->getLocale('tieu_de', $data_extend)}
        	</div>
        {/if}

	    <div class="list">
	        {foreach from = $data_block item = slider}
        		{assign var = image_source value = ''}
    			{if !empty($slider.image) && !empty($slider.image_source)}
    				{assign var = image_source value = $slider.image_source}
    			{/if}
    
    			{assign var = image_url value = ''}
    			{if !empty($slider.image) && $image_source == 'cdn'}
    				{assign var = image_url value = "{CDN_URL}{$slider.image}"}
    			{/if}
    
    			{if !empty($slider.image) && $image_source == 'template'}
    				{assign var = image_url value = "{$slider.image}"}
    			{/if}
    			
    	        <div class="item">
    	            <div class="icon">
    	                <a href="{if !empty($slider.url)}{$slider.url}{/if}">
    	                    {if !empty($slider.class_item)}
        	                    <i class="{$slider.class_item}"></i>
        	                {else}
        	                    {$this->LazyLoad->renderImage([
                            		'src' => "{$image_url}", 
                            		'alt' => "{if !empty($slider.name)}{$slider.name}{/if}",
                            		'class' => 'img-fluid'
                            	])}
        	                {/if}
    	                </a>
    	            </div>
    	        </div>
            {/foreach}
	    </div>
	</div>
{/if}

{/strip}