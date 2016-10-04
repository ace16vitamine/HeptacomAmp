<?php

use Shopware\Components\CSRFWhitelistAware;

class Shopware_Controllers_Frontend_AmpDetail extends Shopware_Controllers_Frontend_Detail implements CSRFWhitelistAware
{
    /**
     * Returns a list with actions which should not be validated for CSRF protection
     *
     * @return string[]
     */
    public function getWhitelistedCSRFActions()
    {
        return array(
            'index'
        );
    }
}