{strip}
{assign var = ignore value = false}
{if !empty($ignore_lazy)}
    {assign var = ignore value = $ignore_lazy}
{/if}
{if empty($is_slider)}
    <div class="{if !empty($col)}{$col}{else}col-12 col-md-4 col-lg-4 {/if}">
{/if}

<article class="article-item swiper-slide">
    <div class="inter-top">
        <div class="inner-image">
            <div class="img ratio-3-2">
                {if !empty($article.image_avatar)}
                    {assign var = url_img value = "{CDN_URL}{$this->Utilities->getThumbs($article.image_avatar, 350)}"}
                {else}
                    {assign var = url_img value = "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="}
                {/if}
            
                <a href="{if !empty($article.url)}{$this->Utilities->checkInternalUrl($article.url)}{/if}" title="{if !empty($article.name)}{$article.name}{/if}">
                    {$this->LazyLoad->renderImage([
                        'src' => $url_img, 
                        'alt' => "{if !empty($article.name)}{$article.name}{/if}", 
                        'class' => 'img-fluid',
                        'ignore' => $ignore
                    ])}
                </a>
            </div>
        </div>
        <div class="inner-content">
            {if !empty($article.categories)}
                <span class="article-category ">
                    {foreach from = $article.categories item = category}
                        {if !empty($category.name)}
                            <a class="color-main mb-2 d-inline-block" href="{$this->Utilities->checkInternalUrl($category.url)}">
                                {$category.name|escape|truncate:50:" ..."}
                                {if !$category@last}
                                    <span class="pr-1">, </span>
                                {/if}
                            </a>
                        {/if}
                    {/foreach}
                </span>
            {/if}
            
            {if !empty($article.name)}   
                <div class="article-title">
                    <a href="{$this->Utilities->checkInternalUrl($article.url)}" title="{if !empty($article.name)}{$article.name}{/if}">
                        {$article.name|escape|truncate:80:" ..."}
                    </a>
                </div>  
            {/if}
            {if !empty($article.description)}
                <div class="article-description">
                    {$article.description|strip_tags|truncate:85:" ..."}
                </div>
            {/if}
        </div> 
    </div> 
    <div class="inner-content">
        <div class="link-comment">
            <a class="btn-all" href="{$this->Utilities->checkInternalUrl($article.url)}">
                <i class="fa-light fa-right-from-bracket"></i>
            </a>
            {if !empty($article.created)}
                <span class="comment">
                    {$this->Utilities->convertIntgerToDateString($article.created)}
                </span>
            {/if}
        </div>
    </div>
</article>

{if empty($is_slider)}
	</div>
{/if}
{/strip}