{block name="frontend_detail-amp_buybox"}
	<div class="sw-product--buybox">
		{block name="frontend_detail-amp_buy_laststock"}
			{if !$sArticle.isAvailable && ($sArticle.isSelectionSpecified || !$sArticle.sConfigurator)}
				{include file="frontend/_includes/messages.tpl" type="error" content="{s name='DetailBuyInfoNotAvailable' namespace='frontend/detail/buy'}{/s}"}
			{/if}
		{/block}

		{block name="frontend_detail-amp_buy"}
			<form method="POST" action="{url controller=ampCheckout action=addArticle}" class="sw-buybox--form">
				{block name="frontend_detail-amp_buy_configurator_inputs"}
					{if $sArticle.sConfigurator && $sArticle.sConfiguratorSettings.type == 3}
						{foreach $sArticle.sConfigurator as $group}
							<input type="hidden" name="group[{$group.groupID}]" value="{$group.selected_value}"/>
						{/foreach}
					{/if}
				{/block}

				<input type="hidden" name="sActionIdentifier" value="{$sUniqueRand}"/>
				<input type="hidden" name="sAddAccessories" id="sAddAccessories" value=""/>
				<input type="hidden" name="sAdd" value="{$sArticle.ordernumber}"/>

				{* TODO is frontend_detail_buy_accessories needed for this? *}

				{block name="frontend_detail-amp_index_buybox"}
					{if (!isset($sArticle.active) || $sArticle.active)}
						{if $sArticle.isAvailable}
							{block name="frontend_detail-amp_buy_button_container"}
								<div class="sw-buybox--button-container sw-block-group{if $NotifyHideBasket && $sArticle.notification && $sArticle.instock <= 0} sw-is--hidden{/if}">
									{* Quantity selection *}
									{block name="frontend_detail-amp_buy_quantity"}
										<div class="sw-buybox--quantity">
											{$maxQuantity=$sArticle.maxpurchase + 1}
											{if $sArticle.laststock && $sArticle.instock < $sArticle.maxpurchase}
												{$maxQuantity=$sArticle.instock + 1}
											{/if}

											{block name="frontend_detail-amp_buy_quantity_select"}
												<select id="sQuantity" name="sQuantity" class="sw-quantity--select sw-btn">
													{section name="i" start=$sArticle.minpurchase loop=$maxQuantity step=$sArticle.purchasesteps}
														<option value="{$smarty.section.i.index}">{$smarty.section.i.index}{if $sArticle.packunit} {$sArticle.packunit}{/if}</option>
													{/section}
												</select>
											{/block}
										</div>
									{/block}

									{* "Buy now" button *}
									{block name="frontend_detail-amp_buy_button"}
										{if $sArticle.sConfigurator && !$activeConfiguratorSelection}
											<a class="sw-buybox--button sw-btn sw-is--primary sw-is--icon-right sw-is--center sw-is--large"
												href="{url sArticle=$sArticle.articleID title=$sArticle.articleName}">
												{s name="OpenCanonicalConfigurator" namespace="frontend/detail-amp/buy"}Zur Konfiguration{/s} <i class="icon--arrow-right"></i>
											</a>
										{else}
											<button class="sw-buybox--button sw-btn sw-is--primary sw-is--icon-right sw-is--center sw-is--large" name="{s name="DetailBuyActionAdd" namespace="frontend/detail/buy"}{/s}">
												{s name="DetailBuyActionAdd" namespace="frontend/detail/buy"}{/s} <i class="icon--arrow-right"></i>
											</button>
										{/if}
									{/block}
								</div>
							{/block}
						{/if}
					{/if}
				{/block}
			</form>
		{/block}
	</div>
{/block}
