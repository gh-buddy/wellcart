<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

namespace WellCart\User\Form\Acl;

use WellCart\Form\Form as AbstractForm;
use WellCart\Hydrator\DoctrineObject as ObjectHydrator;
use WellCart\User\Exception;
use WellCart\User\Spec\AclRoleEntity;
use Zend\Form\Factory;
use Zend\Form\FormInterface;

class Role extends AbstractForm
{

    /**
     * Form constructor
     *
     * @param Factory        $factory
     * @param ObjectHydrator $hydrator
     */
    public function __construct(
        Factory $factory,
        ObjectHydrator $hydrator
    ) {
        $this->setFormFactory($factory);
        parent::__construct('user_acl_role');

        $this->setWrapElements(true);

        $this->setHydrator($hydrator);

        $this->add(
            [
                'name'       => 'is_default',
                'type'       => 'checkbox',
                'options'    => [
                    'label'               => __('Default role for new users'),
                    'strokerform-exclude' => true,
                    'twb-layout'          => 'horizontal',
                    'column-size'         => 'md-12',
                    'label_attributes'    => [
                        'class' => 'col-md-8 col-md-offset-4',
                    ],
                    'use_hidden_element'  => true,
                    'checked_value'       => 1,
                    'unchecked_value'     => 0,
                ],
                'attributes' => [
                    'id'    => 'user_acl_role_is_default',
                    'class' => 'icheck-element',
                ],
            ],
            ['priority' => 700]
        );

        $this->add(
            [
                'name'       => 'name',
                'type'       => 'Text',
                'options'    => [
                    'label'            => __('Name'),
                    'twb-layout'       => 'horizontal',
                    'column-size'      => 'md-8',
                    'label_attributes' => [
                        'class' => 'col-md-4',
                    ],
                ],
                'attributes' => [
                    'id' => 'user_acl_role_name',
                ],
            ],
            ['priority' => 650]
        );
        $this->add(
            [
                'name'       => 'description',
                'type'       => 'Text',
                'options'    => [
                    'label'            => __('Description'),
                    'twb-layout'       => 'horizontal',
                    'column-size'      => 'md-8',
                    'label_attributes' => [
                        'class' => 'col-md-4',
                    ],
                ],
                'attributes' => [
                    'id' => 'user_acl_role_description',
                ],
            ],
            ['priority' => 600]
        );

        $this->add(
            [
                'name'       => 'permissions',
                'type'       => 'userAclPermissionsMultiCheckboxSelector',
                'options'    => [
                    'label'            => __('Permissions'),
                    'twb-layout'       => 'horizontal',
                    'column-size'      => 'md-8',
                    'label_attributes' => [
                        'class' => 'col-md-4',
                    ],
                ],
                'attributes' => [
                    'autocomplete' => 'off',
                    'id'           => 'user_acl_role_permissions',
                ],
            ],
            ['priority' => 500]
        );

        $this->add(
            [
                'type'       => 'Csrf',
                'name'       => 'csrf',
                'attributes' => [
                    'id' => 'user_acl_role_csrf',
                ],
            ],
            ['priority' => 700]
        );

        $this->addToolbarButton(
            [
                'name'       => 'save',
                'type'       => 'Submit',
                'options'    => [
                    'label'       => __('Save'),
                    'fontAwesome' => [
                        'icon' => 'check'
                    ],
                ],
                'attributes' => [
                    'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                ],
            ]
        );

        $saveAndContinue = clone $this->get('save');
        $saveAndContinue
            ->setName('save_and_continue_edit')
            ->setLabel(__('Save & Continue Edit'))
            ->setOption('fontAwesome', ['icon' => 'check-circle']);
        $this->addToolbarButton($saveAndContinue, 120000);

        $this->getEventManager()->trigger('init', $this);
    }

    /**
     * @inheritdoc
     */
    public function bind($object, $flags = FormInterface::VALUES_NORMALIZED)
    {
        if (!$object instanceof AclRoleEntity) {
            throw new Exception\InvalidArgumentException(
                'Object must implement interface WellCart\User\Spec\AclRoleEntity'
            );
        }
        return parent::bind($object, $flags);
    }

    /**
     * @inheritdoc
     */
    public function getData($flag = FormInterface::VALUES_NORMALIZED)
    {
        $role = parent::getData($flag);

        if ($role instanceof AclRoleEntity) {
            $inputFilter = $this->getInputFilter();
            $raw = $inputFilter->getRawValues();
            if (empty($raw['permissions'])) {
                $role->getPermissions()->clear();
            }
        }

        return $role;
    }

    /**
     * @inheritdoc
     */
    public function setObject($object)
    {
        if (!$object instanceof AclRoleEntity) {
            throw new Exception\InvalidArgumentException(
                'Object must implement interface WellCart\User\Spec\AclRoleEntity'
            );
        }
        return parent::setObject($object);
    }
}
