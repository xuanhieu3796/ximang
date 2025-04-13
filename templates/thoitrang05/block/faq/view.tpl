{if !empty($data_block.data)}
    <div class="section-faq-project">
        {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
        	<h1 class="title-section text-left">
        		{$this->Block->getLocale('tieu_de', $data_extend)}
        	</h1>
        {/if}
        <div id="accordion">
            {foreach from = $data_block.data key=key item = item}
                {if !empty($item.name)}
                    <div class="card">
                        <div class="item-title-process collapsed" data-toggle="collapse" data-target="#faq-{$key}" aria-expanded="true" aria-controls="collapseOne">
                            <span>
                                {$item.name}
                            </span>
                            <i class="fa-light fa-minus"></i>
                        </div>
                        {if !empty($item.content)}
                            <div id="faq-{$key}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {$item.content}
                                </div>
                            </div>
                        {/if}
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
{else}
    <div class="mb-4">
        {__d('template', 'khong_co_du_lieu')}
    </div>
{/if}
{if !empty($block_config.has_pagination) && !empty($data_block[{PAGINATION}])}
    {$this->element('pagination', ['pagination' => $data_block[{PAGINATION}]])}
{/if}