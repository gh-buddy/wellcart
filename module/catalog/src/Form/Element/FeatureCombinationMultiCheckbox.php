<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace WellCart\Catalog\Form\Element;

use Doctrine\Common\Collections\Collection;
use WellCart\Catalog\Entity\FeatureCombination;
use WellCart\Form\Element\MultiCheckbox;

class FeatureCombinationMultiCheckbox extends MultiCheckbox
{
    /**
     * @inheritDoc
     */
    public function setValue($value)
    {
        if ($value instanceof Collection) {
            $newValue = [];
            foreach ($value->getIterator() as $item) {
                if ($item instanceof FeatureCombination) {
                    $id = $item->getFeatureValue()->getId();
                    $newValue[$id] = $id;
                }
            }
            $value = $newValue;
        }
        if ($value instanceof FeatureCombination) {
            $value = $value->getFeatureValue()->getId();
        }

        return parent::setValue($value);
    }
}