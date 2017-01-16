<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

namespace WellCart\Base\EventListener\Ui;

use WellCart\Ui\Form\FormInterface;
use WellCart\Utility\Arr;
use WellCart\Utility\Config;
use Zend\EventManager\EventInterface;
use Zend\Form\Element;
use Zend\Form\FieldsetInterface;

class PrepareFormLayout
{

    /**
     * @param EventInterface $event
     */
    public function __invoke(EventInterface $event)
    {
        $form = $event->getTarget();
        if (!$form instanceof FormInterface) {
            return;
        }
        $name = $form->getUiConfigSection();
        $config = Config::get('ui.component.form.' . $name, []);
        if (empty($config)) {
            return;
        }
        if(!empty($config['options']))
        {
            $form->setOptions($config['options']);
            unset($config['options']);
        }
        if(!empty($config['attributes']))
        {
            $form->setAttributes($config['attributes']);
            unset($config['attributes']);
        }
        $this->composeForm($form, $config);
    }

    /**
     * Compose form layout
     *
     * @param FieldsetInterface $fieldset
     * @param array             $config
     */
    public function composeForm(
        FieldsetInterface $fieldset,
        array $config
    ) {
        if ($fieldset instanceof Element\Collection) {
            $fieldset = $fieldset
                ->getTargetElement();
        }
        foreach ($fieldset as $element) {
            if ($element instanceof FieldsetInterface) {
                $this->composeForm(
                    $element, Arr::get($config, $element->getName(), [])
                );
                continue;
            }

            $name = $element->getName();
            $elementConfig = Arr::get($config, $name, [], '>');
            if (!empty($elementConfig)) {
                $this->composeElement($element, $elementConfig);
            }
            unset($elementConfig);
        }
    }

    protected function composeElement(
        Element $element,
        array $config
    ) {
        $options = Arr::get($config, 'options', []);
        foreach ($options as $option => $value) {
            switch ($option) {
                case 'label_attributes':
                    $element->setLabelAttributes($value);
                    break;
                default:
                    $element->setOption($option, $value);
                    break;
            }
        }
        $attributes = Arr::get($config, 'attributes', []);
        foreach ($attributes as $attribute => $value) {
            $element->setAttribute($attribute, $value);

        }
        unset($options, $attributes);
    }
}
