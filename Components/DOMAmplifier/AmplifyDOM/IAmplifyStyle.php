<?php

namespace HeptacomAmp\Components\DOMAmplifier\AmplifyDOM;

use Sabberworm\CSS\CSSList\Document;

/**
 * Interface IAmplifyStyle
 * @package HeptacomAmp\Components\DOMAmplifier\AmplifyDOM
 */
interface IAmplifyStyle
{
    /**
     * Process and ⚡lifies the given node and style.
     * @param Document $styleDocument The style to ⚡lify.
     */
    function amplify(Document& $styleDocument);
}
