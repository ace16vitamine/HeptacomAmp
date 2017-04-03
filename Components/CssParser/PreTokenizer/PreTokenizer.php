<?php

namespace HeptacomAmp\Components\CssParser\PreTokenizer;

use Generator;

/**
 * Class PreTokenizer
 * @package HeptacomAmp\Components\CssParser\PreTokenizer
 */
class PreTokenizer
{
    /**
     * @param $stylesheet
     * @return Generator
     */
    public static function tokenize(&$stylesheet)
    {
        $depth = 0;
        $position = 0;

        while (true) {
            if ($depth === 0) {
                $mustache = strpos($stylesheet, '{', $position);

                if ($mustache !== false) {
                    ++$depth;
                    yield new PreToken($depth, substr($stylesheet, $position, $mustache - $position));
                    $position = $mustache + 1;
                } else {
                    break;
                }
            } else {
                $openMustache = strpos($stylesheet, '{', $position);
                $closeMustache  = strpos($stylesheet, '}', $position);

                if ($openMustache !== false && $closeMustache !== false) {
                    if ($openMustache > $closeMustache) {
                        --$depth;
                        yield new PreToken($depth, substr($stylesheet, $position, $closeMustache - $position));
                        $position = $openMustache + 1;
                    } else {
                        ++$depth;
                        yield new PreToken($depth, substr($stylesheet, $position, $openMustache - $position));
                        $position = $closeMustache + 1;
                    }
                } elseif ($openMustache !== false) {
                    ++$depth;
                    yield new PreToken($depth, substr($stylesheet, $position, $openMustache - $position));
                    $position = $openMustache + 1;
                } elseif ($closeMustache !== false) {
                    --$depth;
                    yield new PreToken($depth, substr($stylesheet, $position, $closeMustache - $position));
                    $position = $closeMustache + 1;
                } else {
                    break;
                }
            }
        }
    }
}
