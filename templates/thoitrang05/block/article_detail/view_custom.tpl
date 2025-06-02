{strip}
{assign var = article_info value = []}
{if !empty($data_block.data)}
	{assign var = article_info value = $data_block.data}
{/if}
{assign var = all_images value = []}
{if !empty($article_info.images)}
	{assign var = all_images value = $article_info.images}
{/if}
{assign var = config_slider value = [
	'navigation' => [
		'nextEl' => '.swiper-button-next',
		'prevEl' => '.swiper-button-prev'
	]
]}

{assign var = config_slider_thumbs value = [
	'spaceBetween'=> 10,
    'slidesPerView'=> 4,
    'freeMode'=> true,
    'watchSlidesProgress'=> true
]}
{if !empty($article_info)}
	<article class="article-detail article-detail-page bg-white">
		<div>
			<a nh-btn-action="wishlist" wishlist-id="{if !empty($article_info.id)}{$article_info.id}{/if}" wishlist-type="{ARTICLE}" class="btn-product-action" href="javascript:;" title="{__d('template', 'yeu_thich')}">
				<i class="fa-light fa-heart"></i>
			</a>
		</div>

		{assign var = member_info value = $this->Member->getMemberInfo()}
		{if !empty($member_info)}
			{assign var = is_saved value = $this->Article->getArticlesSaved({PAGE_RECORD_ID}, $member_info.id)}
		{/if}

        <a nh-btn-action="savedpost" savedpost-id="{if !empty($article_info.id)}{$article_info.id}{/if}" savedpost-type="{ARTICLE}" class="btn-product-action {if !empty($is_saved)}added-savedpost{/if}" href="javascript:;" title="{__d('template', 'yeu_thich')}">
            <i class="fa-light fa-heart"></i>
        </a>
		{if !empty($article_info.name)}
			<h1 class="title-detail">
				{$article_info.name|escape}
			</h1>
		{/if}
		
		<div class="article-entry-info">
    		<div class="date-view">
        		{if !empty($article_info.view)}
                    <div class="view">
                        <i class="fa-sharp fa-light fa-eye"></i>
                        {$article_info.view} View
                    </div>
                {/if} 
    
                
                <span class="seperate">
                    |
                </span>
        		{if !empty($article_info.created)}
                    <div class="post-date">
                        <i class="fa-light fa-calendar-days mr-2"></i>
                    	{$article_info.created}
                	</div>
                {/if}
    		</div>
    		
    		{$dropdown_id = "dropdown-{time()}-{rand(1, 1000)}"}
        	<div class="action-item" href="javascript:;" nh-toggle="{$dropdown_id}">
        		<div class="name" style="cursor: pointer;">
        			<i class="fa-solid fa-share mr-2"></i> {__d('template', 'chia_se')}
        		</div>
        		<div class="action-share--content" nh-toggle-element="{$dropdown_id}" style="display: none;">
        			<div class="action-item--title">{__d('template', 'chia_se')}</div>
    		    	{if !empty($article_info.url)}
    		            {assign var = url_article value = "{$this->Utilities->getUrlWebsite()}{$this->Utilities->checkInternalUrl($article_info.url)}"}
    	                <div class="list-social">
                            <div class="btn-social">
                                <a href="javascript:;" nh-link-redirect-blank nh-link-redirect="https://www.facebook.com/sharer/sharer.php?u={$url_article}" target="_blank" title="Facebook">
                                	<i class="fa-brands fa-facebook"></i>
                                </a>
                            </div>
    
                            <div class="btn-social">
                                <a href="javascript:;" nh-link-redirect-blank nh-link-redirect="https://twitter.com/share?url={$url_article}" target="_blank" title="Twitter">
                                	<i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
    
                            <div class="btn-social">
                                <a href="javascript:;" nh-link-redirect-blank nh-link-redirect="https://pinterest.com/pin/create/button/?url={$url_article}" target="_blank" title="Pinterest">
                                	<i class="fa-brands fa-pinterest"></i>
                                </a>
                            </div>
    
                            <div class="btn-social">
                                <a href="javascript:;" nh-link-redirect-blank nh-link-redirect="https://www.linkedin.com/shareArticle?mini=true&amp;url={$url_article}" target="_blank" title="LinkedIn">
                                	<i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <div class="zalo-share-button" data-href="" data-oaid="1771916720391019714" data-layout="2" data-color="blue" data-customize="false"></div>
	                        <script src="https://sp.zalo.me/plugins/sdk.js"></script>
                            {*
                            <div class="btn-social">
                                <a href="javascript:;" nh-zalo-social title="zalo">
                                	<img src="{CDN_URL}/media/icon/zalo-icon.png" alt="zalo" class="img-fluid">
                                </a>
                            </div>
                            *}
                        </div>
    	            {/if}						       
        		</div>
        	</div>
		</div>
		{if !empty($article_info.author_id)}
		    {assign var = author value = $this->Author->getDetailAuthor({$article_info.author_id})}
		{/if}
        {if !empty($author)}
            <div class="author-view-detail">
                <div class="author">
                    <div class="img-author">
                        
                        {if !empty($author.avatar)}
                            {assign var = image_user value = "{CDN_URL}{$this->Utilities->getThumbs($author.avatar, 150)}"}
                        {else}
                            {assign var = image_user value = "{CDN_URL}/media/icon/ellipse-92.svg"}
                        {/if}
                        <img src="{$image_user}" alt="{if !empty($author.full_name)}{$author.full_name}{/if}">
                    </div>
                    <div class="inner-user">
                        <div class="posted-by">
                            {__d('template', 'tac_gia')}:
                        </div>
                        {if !empty($author.full_name)}
                            <div class="created-by-user font-weight-bold">
                                <a target="_blank" href="{if !empty($author.url)}/{$author.url}{/if}" title="{$author.full_name}">
                                    {$author.full_name}
                                </a>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        {/if}
	    {if !empty($all_images)}
		    <div class="article-image-detail mb-3 " nh-swiper-thumb>
			    {* Ảnh chính *}
		    	<div class="position-relative">
			    	<div class="swiper mb-3" nh-swiper-large="{htmlentities($config_slider|@json_encode)}">
			    		<div class="swiper-wrapper">
					    	{if !empty($all_images)}
					    		{foreach from = $all_images item = image}
							        <div class="swiper-slide">
							        	<div class="ratio-3-2">
							            	<img class="img-fluid" src="{CDN_URL}{$image}" alt="{if !empty($article_info.name)}{$article_info.name}{/if}">
							            </div>
							        </div>
						        {/foreach}
					    	{/if}
					    </div>

					    {if !empty($config_slider.navigation)}
						    <div class="swiper-button-next">
				                <i class="fa-light fa-angle-right h1"></i>
				            </div>
				            <div class="swiper-button-prev">
				                <i class="fa-light fa-angle-left h1"></i>
				            </div>
					    {/if}
			    	</div>

			    	{* Các buttons trên ảnh chính *}
			        <div class="additional-action">
			        	{if !empty($all_images)}
				        	<div nh-light-gallery>
				        		{if !empty( $article_info.images[0])}
					        		<a class="btn-addition-action btn-expand" href="{CDN_URL}{$all_images[0]}">
					        			<img alt="{if !empty($article_info.name)}{$article_info.name}{/if}" src="{CDN_URL}{$this->Utilities->getThumbs( $all_images[0], 150)}" class="d-none">
					        		</a>
				        		{/if}

				        		{foreach from =  $all_images key = k item = image}
				        			{if $k > 0}
					        			<div class="d-none" data-src="{CDN_URL}{$image}">
						        			<img alt="{if !empty($article_info.name)}{$article_info.name}{/if}" src="{CDN_URL}{$this->Utilities->getThumbs($image, 150)}">
						        		</div>
				        			{/if}						        		
				        		{/foreach}
				        	</div>				        		
			        	{/if}
			        </div>
		        </div>

		        {* Thumbs *}
				{if !empty($all_images) && $all_images|@count gt 1}
					<div nh-slider-thumbs nh-swiper-thumbs="{htmlentities($config_slider_thumbs|@json_encode)}" class="swiper">
					    <div class="swiper-wrapper">
					    	{foreach from = $all_images item = image}
					    		<div class="swiper-slide">
					    			<div class="ratio-1-1">
						            	<img class="img-fluid" src="{CDN_URL}{$this->Utilities->getThumbs($image, 350)}" alt="{if !empty($article_info.name)}{$article_info.name}{/if}">
						            </div>
						        </div>
					    	{/foreach}
					    </div>
					</div>
				{/if}
		    </div>
	    {/if} 

	    {if !empty($article_info.url_video) && !empty($article_info.type_video)}
		    <div class="mb-3">
		        {if $article_info.type_video == {VIDEO_YOUTUBE}}
		            <div class="ratio-16-9">
		                <iframe nh-lazy="iframe" data-src="https://www.youtube.com/embed/{$article_info.url_video}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		            </div>                   
		        {/if}

		        {if $article_info.type_video == {VIDEO_SYSTEM}}
		        	<div class="ratio-16-9">
		        		<video nh-lazy="video" data-src="{CDN_URL}{$article_info.url_video}|video/{$article_info.url_video|pathinfo:$smarty.const.PATHINFO_EXTENSION}" controls></video>
		        	</div>	            
		        {/if}
		    </div>
	    {/if}

		<div class="article-content-info font-content" {if !empty($article_info.catalogue)}nh-table-content="content"{/if}>
		    {if !empty($article_info.description)}
			    <div class="description">
			    	{$article_info.description}
			    </div>
		    {/if}
		    
		    {if !empty($article_info.content)}
			    <div class="article-content">
			    	{$this->LazyLoad->renderContent($article_info.content)}
			    	
			    </div>
		    {/if}
	    </div>

	    {if !empty($article_info.has_file)}
		    <div class="entire-file">
		    	{if !empty($article_info.files)}
					{foreach from = $article_info.files item = file}
						{assign var = file_name value = $this->Utilities->getFileNameInUrl($file)}
						<a href="{CDN_URL}{$this->Utilities->checkInternalUrl($file)}" download="{CDN_URL}{$this->Utilities->checkInternalUrl($file)}" class="btn btn-submit text-lowercase">
							<i class="fa-light fa-download"></i> {__d('template', 'tai_xuong')} {urldecode($file_name)}
						</a>
					{/foreach}  
				{/if}
			</div>
		{/if}

		
	</article>
	
	{* tag bài viết *}
	{if !empty($article_info.tags)}
		<div class="box-detail-tags bg-white">
            <div class="title-left">
                {__d('template', 'the_bai_viet')}
            </div>
            <ul class="tags list-unstyled mb-0">
		        {foreach from = $article_info.tags item = tag}
		        	{if !empty($tag.name)}
					    <li>
					        <a href="{if !empty($tag.url)}{TAG_PATH}/{$tag.url}{/if}" title="{$tag.name}">
					        	{$tag.name}
					        </a>
					    </li>
					{/if}
		        {/foreach}
			</ul>
		</div>
	{/if}
	{/strip}
{/if}