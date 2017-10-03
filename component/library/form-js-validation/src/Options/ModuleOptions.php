<?php


namespace WellCart\Form\JsValidation\Options;

use InvalidArgumentException;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ConfigInterface;
use Zend\Stdlib\AbstractOptions;
/**
 * Defines all possible options for the module
 */
class ModuleOptions extends AbstractOptions
{
    /**
     * @var array
     */
    private $activeRenderers = [];


    /**
     * @var array
     */
    private $rendererOptions = [];

    /** @var array */
    private $jqueryValidateRulePlugins = [];

    /**
     * @return array
     */
    public function getActiveRenderers()
    {
        return $this->activeRenderers;
    }

    /**
     * @param array
     */
    public function setActiveRenderers(array $activeRenderers)
    {
        $this->activeRenderers = $activeRenderers;
    }

    /**
     * @param array $options
     */
    public function setRendererOptions(array $options)
    {
        $this->rendererOptions = [];
        foreach ($options as $renderer => $rendererOptions) {
            $this->addRendererOptions($renderer, $rendererOptions);
        }
    }

    /**
     * @param  string $renderer
     * @param  array  $options
     *
     * @throws \InvalidArgumentException
     */
    public function addRendererOptions($renderer, $options)
    {
        if (!is_array($options)) {
            throw new \InvalidArgumentException('No options given for renderer ' . $renderer);
        }
        if (!isset($options['options_class'])) {
            throw new \InvalidArgumentException('No options_class configured for renderer ' . $renderer);
        }

        $optionsClass = $options['options_class'];
        unset($options['options_class']);
        $options = new $optionsClass($options);

        $this->rendererOptions[$renderer] = $options;
    }

    /**
     * @param string $renderer
     *
     * @return null|AbstractOptions
     * @throws \InvalidArgumentException
     */
    public function getRendererOptions($renderer)
    {
        return $this->rendererOptions[$renderer];
    }

    /**
     * @return array
     */
    public function getJqueryValidateRulePlugins()
    {
        return $this->jqueryValidateRulePlugins;
    }

    /**
     * @param array $jqueryValidateRulePlugins
     */
    public function setJqueryValidateRulePlugins(array $jqueryValidateRulePlugins)
    {
        $this->jqueryValidateRulePlugins = $jqueryValidateRulePlugins;
    }
}
