{assign var = is_slider value = false}
{if !empty($data_extend['slider'])}
    {assign var = is_slider value = true}
{/if}

{assign var = element value = "item"}
{if !empty($data_extend['element'])}
    {assign var = element value = {$data_extend['element']}}
{/if}

{assign var = col value = ""}
{if !empty($data_extend['col'])}
    {assign var = col value = $data_extend['col']}
{/if}

{assign var = ignore_lazy value = false}
{if !empty($data_extend.ignore_lazy)}
    {assign var = ignore_lazy value = $data_extend.ignore_lazy}
{/if}

{strip}
<div class="title-link">
    {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
        <h3 class="title-section">
            {$this->Block->getLocale('tieu_de', $data_extend)}
        </h3>
    {/if}
    {if !empty($data_extend['locale'][{LANGUAGE}]['link'])}
        <a href="{$this->Block->getLocale('link', $data_extend)}" class="link-right">
            {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de_link'])}
                {$this->Block->getLocale('tieu_de_link', $data_extend)} <i class="fa-light fa-arrow-right ml-1"></i>
            {/if}
        </a>
    {/if}
</div>

{if !empty($data_block.data)}
    <div class="swiper" nh-swiper="{if !empty($data_extend.slider)}{htmlentities($data_extend.slider|@json_encode)}{/if}">
        <div class="swiper-wrapper">
            {foreach from = $data_block.data item = article}
                {$this->element("../block/{$block_type}/{$element}", [
                    'article' => $article, 
                    'is_slider' => $is_slider,
                    'ignore_lazy' => $ignore_lazy
                ])}
            {/foreach}
        </div>
        {if !empty($data_extend.slider.pagination)}
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        {/if}
        {if !empty($data_extend.slider.navigation)}
            <div class="swiper-button-next">
                <i class="fa-light fa-angle-right "></i>
            </div>
            <div class="swiper-button-prev">
                <i class="fa-light fa-angle-left "></i>
            </div>
        {/if}
    </div>
{else}
    <div class="mb-4">
        {__d('template', 'khong_co_du_lieu')}
    </div>
{/if}

{if !empty($block_config.has_pagination) && !empty($data_block[{PAGINATION}])}
    {$this->element('pagination_ajax', ['pagination' => $data_block[{PAGINATION}]])}
{/if}
{/strip}