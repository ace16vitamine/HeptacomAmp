<?php

namespace HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle;

use HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\IAmplifyStyle;
use Sabberworm\CSS\CSSList\Document;
use Sabberworm\CSS\Value\Size;

/**
 * Class RemoveUnitsOnNullValues
 * @package HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle
 */
class RemoveUnitsOnNullValues implements IAmplifyStyle
{
    /**
     * Process and ⚡lifies the given node and style.
     * @param Document $styleDocument The style to ⚡lify.
     */
    function amplify(Document& $styleDocument)
    {
        foreach ($styleDocument->getAllValues() as $value) {
            if ($value instanceof Size) {
                /** @var Size $value */
                if (!$value->isColorComponent() && $value->getSize() == 0) {
                    $value->setUnit(null);
                }
            }
        }
    }
}
