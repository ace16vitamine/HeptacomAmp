<?php

namespace HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle;

use DOMNode;
use HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\IAmplifyStyle;
use Sabberworm\CSS\CSSList\Document;
use Sabberworm\CSS\RuleSet\AtRuleSet;

/**
 * Class RemoveFontsExceptShopware
 * @package HeptacomAmp\Components\DOMAmplifier\AmplifyDOM\AmplifyStyle
 */
class RemoveFontsExceptShopware implements IAmplifyStyle
{
    /**
     * Process and ⚡lifies the given node and style.
     * @param DOMNode $domNode The node to ⚡lify.
     * @param Document $styleDocument The style to ⚡lify.
     */
    function amplify(DOMNode& $domNode, Document& $styleDocument)
    {
        foreach ($styleDocument->getAllRuleSets() as $ruleSet) {
            if ($ruleSet instanceof AtRuleSet) {
                /** @var AtRuleSet $ruleSet */
                if ($ruleSet->atRuleName() == 'font-face') {
                    $rule = array_shift($ruleSet->getRules('font-family'));
                    if (!is_null($rule) && strcasecmp(trim($rule->getValue(), '"\''), 'shopware') === 0) {
                        $styleDocument->remove($ruleSet);
                    }
                }
            }
        }
    }
}