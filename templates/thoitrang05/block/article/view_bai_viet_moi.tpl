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
<div class="box-article-hot">
    {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
        <h3 class="title-section text-left">
            {$this->Block->getLocale('tieu_de', $data_extend)}
        </h3>
    {/if}
    
    {if !empty($data_block.data)}
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="article-left">
                    {$this->element("../block/{$block_type}/item_left", [
                        'article' => $data_block.data[0],
                        'is_slider' => $is_slider,
                        'ignore_lazy' => $ignore_lazy
                    ])}
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="article-right">
                    <div class="list-article">
                        {foreach from = $data_block.data item = article}
                            {if $article@index gte 1 && $article@index lte 4 }
                                {$this->element("../block/{$block_type}/item_small", [
                                    'article' => $article
                                ])}
                            {/if}
                        {/foreach}
                    </div>
                    <div class="link-article">
                        <a href="{if !empty($data_extend['locale'][{LANGUAGE}]['link'])}{$this->Block->getLocale('link', $data_extend)}{/if}" title="{if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}{$this->Block->getLocale('tieu_de', $data_extend)}{/if}">
                            {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de_link'])}{$this->Block->getLocale('tieu_de_link', $data_extend)}{/if} <i class="fa-light fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    {else}
        <div class="mb-4">
            {__d('template', 'khong_co_du_lieu')}
        </div>
    {/if}
</div>

{if !empty($block_config.has_pagination) && !empty($data_block[{PAGINATION}])}
    {$this->element('pagination_ajax', ['pagination' => $data_block[{PAGINATION}]])}
{/if}
{/strip}