<amp-sidebar id="offcanvas-menu" layout="nodisplay" side="left" class="sidebar-main">
    {block name="frontend_index_left_inner"}
        {* Mobile specific menu actions *}
        {block name="frontend_index_left_navigation_smartphone"}
            <div class="navigation--smartphone">
                <ul class="navigation--list ">

                    {* Trigger to close the off canvas menu *}
                    {block name="frontend_index_left_categories_close_menu"}
                        <li class="navigation--entry entry--close-off-canvas">
                            <a href="#close-categories-menu" title="{s namespace='frontend/index/menu_left' name="IndexActionCloseMenu"}{/s}" class="navigation--link" on="tap:offcanvas-menu.close">
                                {s namespace='frontend/index/menu_left' name="IndexActionCloseMenu"}{/s} <i class="icon--arrow-right"></i>
                            </a>
                        </li>
                    {/block}
                </ul>
            </div>
        {/block}

        {* if sCategoryContent is not available use sArticle.categoryID *}
        {if isset($sCategoryContent) && $sCategoryContent.id}
            {$subCategoryId = $sCategoryContent.id}
        {elseif isset($sArticle) && $sArticle.categoryID}
            {$subCategoryId = $sArticle.categoryID}
        {elseif isset($sCustomPage) && $sCustomPage.id}
            {$subCategoryId = $sCustomPage.id}
        {else}
            {$subCategoryId = 0}
        {/if}

        <div class="sidebar--categories-wrapper"
             data-subcategory-nav="true"
             data-mainCategoryId="{$sCategoryStart}"
             data-categoryId="{$subCategoryId}"
             data-fetchUrl="{if $subCategoryId}{if $sCustomPage}{url module=widgets controller=listing action=getCustomPage pageId={$subCategoryId}}{else}{url module=widgets controller=listing action=getCategory categoryId={$subCategoryId}}{/if}{/if}">

            {* Sidebar category tree *}
            {block name='frontend_index_left_categories'}

                {* Categories headline *}
                {block name="frontend_index_left_categories_headline"}
                    <div class="categories--headline navigation--headline">
                        {s namespace='frontend/index/menu_left' name="IndexSidebarCategoryHeadline"}{/s}
                    </div>
                {/block}

                {* Actual include of the categories *}
                {block name='frontend_index_left_categories_inner'}
                    <div class="sidebar--categories-navigation">
                        {include file='frontend/plugins/heptacom_amp/index/sidebar-categories.tpl'}
                    </div>
                {/block}
            {/block}

            {* Static sites *}
            {block name='frontend_index_left_menu'}
                {include file='frontend/plugins/heptacom_amp/index/sites-navigation.tpl'}
            {/block}
        </div>
    {/block}
</amp-sidebar>
