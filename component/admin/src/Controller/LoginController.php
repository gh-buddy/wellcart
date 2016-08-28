<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

namespace WellCart\Admin\Controller;

use ZfcUser\Controller\UserController;

class LoginController extends UserController
{

    /**
     * Login page
     *
     * @return array|\Zend\View\Model\ViewModel
     */
    public function loginAction()
    {
        /**
         * @var $auth  \ZfcUser\Controller\Plugin\ZfcUserAuthentication
         */
        $auth = $this->zfcUserAuthentication();

        $request = $this->getRequest();
        $form = $this->getLoginForm();
        if ($auth->hasIdentity() || !$request->isPost()) {
            return $this->createPageView()
                ->setVariable('form', $form)
                ->setTemplate('wellcart-admin/login/form');
        }

        $form->setData($request->getPost(null, []));

        if (!$form->isValid()) {
            return $this->createPageView()
                ->setVariable('form', $form)
                ->setTemplate('wellcart-admin/login/form');
        }

        $adapter = $auth->getAuthAdapter();
        // clear adapters
        $adapter->resetAdapters();
        $auth->getAuthService()->clearIdentity();

        try {
            $adapter->prepareForAuthentication($this->getRequest());
            $auth = $auth->getAuthService()->authenticate($adapter);

            if (!$auth->isValid()) {
                $adapter->resetAdapters();
                $this->flashMessenger()->addErrorMessage(
                    $auth->getMessages()[0]
                );
                return $this->redirect()->toRoute('zfcadmin');
            }
        } catch (\Throwable $e) {
            error_log($e->__toString());
            $this->flashMessenger()->addErrorMessage($e->getMessage());
            return $this->redirect()->toRoute('zfcadmin');
        }


        return $this->redirect()->refresh();
    }
}
