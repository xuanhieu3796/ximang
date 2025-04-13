{strip}
{if !empty($data_block)}
    <div class="box-contact-inbox">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-7 col-12">
                <div class="info-left">
                    {if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}
                    	<div class="title">
                    		{$this->Block->getLocale('tieu_de', $data_extend)}
                    	</div>
                    {/if}
                    {if !empty($data_extend['locale'][{LANGUAGE}]['mo_ta'])}
                    	<div class="dsc">
                    		{$this->Block->getLocale('mo_ta', $data_extend)}
                    	</div>
                    {/if}
                    {foreach from = $data_block item = slider}
                        {if !empty($slider.name)}
            		        <p>
            		            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path><path d="M8 13A5 5 0 1 0 8 3a5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></svg>
            		            {$slider.name}
            		        </p>
        		        {/if}
        	        {/foreach}
        	        <form nh-form-contact="JXGSR5NDMV" action="/contact/send-info" method="POST" autocomplete="off" class="form-contact-inbox">
                        <div class="form-group mb-0">
                            <input required data-msg="{__d('template', 'vui_long_nhap_thong_tin')}" 
                                data-rule-maxlength="255" data-msg-maxlength="{__d('template', 'thong_tin_nhap_qua_dai')}" 
                                name="email" type="email" class="form-control newsletter--input" placeholder="Enter your email">
                                
                            <span nh-btn-action="submit" class="btn newsletter--submit">
                                Subscribe
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-12">
                <div class="inter-image">
                    <div class="img ratio-4-3">
                    	{$this->LazyLoad->renderImage([
                    		'src' => "{if !empty($data_extend['locale'][{LANGUAGE}]['image'])}{$this->Utilities->replaceVariableSystem($this->Block->getLocale('image', $data_extend))}{/if}", 
                    		'alt' => "{if !empty($data_extend['locale'][{LANGUAGE}]['tieu_de'])}{$this->Block->getLocale('tieu_de', $data_extend)}{/if}",
                    		'class' => 'img-fluid'
                    	])}
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{/strip}