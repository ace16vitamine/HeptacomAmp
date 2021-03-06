<?php

namespace HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle;

use HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\IAmplifyStyle;
use Sabberworm\CSS\CSSList\Document;
use Sabberworm\CSS\Rule\Rule;
use Sabberworm\CSS\RuleSet\DeclarationBlock;

/**
 * Class RenameFontWeightUnits
 * @package HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle
 */
class RenameFontWeightUnits implements IAmplifyStyle
{
    /**
     * Process and ⚡lifies the given node and style.
     * @param Document $styleDocument The style to ⚡lify.
     */
    function amplify(Document& $styleDocument)
    {
        /** @var DeclarationBlock[] $declarationBlocks */
        $declarationBlocks = $styleDocument->getAllDeclarationBlocks();
        foreach ($declarationBlocks as $declarationBlock) {
            /** @var DeclarationBlock $declarationBlock */

            foreach ($declarationBlock->getRules() as $rule) {
                /** @var Rule $rule */
                if ($rule->getRule() == 'font-weight') {
                    $rule->setValue(str_replace([
                        'thin',
                        'light',
                        'normal',
                        'bold',
                        'black'
                    ], [
                        '100',
                        '300',
                        '400',
                        '700',
                        '900'
                    ], $rule->getValue()));
                }
                $duplicateRules[$rule->getRule()][] = $rule;
            }
        }
    }
}
