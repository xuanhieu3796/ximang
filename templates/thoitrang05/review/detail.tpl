{if !empty($list_review)}
    <div class="review-detail">
        {foreach $list_review as $item}
            <div class="item-review">
                <div class="item-name">
                    {if !empty($item.name)}
                        <div class="name">
                            {$item.name}
                        </div>
                    {/if}
                    <span class="percent-number">
                        {if !empty($item.percent)}
                            <span class="percent">{$item.percent}%</span>
                        {else}
                            <span class="percent">0%</span>
                        {/if}
                        {if !empty($item.number)}
                            <span class="number">({$item.number})</span>
                        {/if}
                    </span>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {if !empty($item.percent)}{$item.percent}%{else}0%{/if};" 
                        aria-valuenow="{if !empty($item.percent)}{$item.percent}{else}0{/if}" aria-valuemin="0" aria-valuemax="100">
                        
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
{/if}

