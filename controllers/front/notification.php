<?php
/**
 * Payline module for PrestaShop
 *
 * @author    Monext <support@payline.com>
 * @copyright Monext - http://www.payline.com
 */

class paylineNotificationModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        if (Tools::getValue('notificationType') == 'WEBTRS' && Tools::getValue('token')) {
            $this->module->processNotification(Tools::getValue('token'));
        } elseif (Tools::getValue('notificationType') == 'TRS' && Tools::getValue('transactionId')) {
            $this->module->processTransactionNotification(Tools::getValue('transactionId'));
        }
    }

    /**
     * @see FrontController::displayMaintenancePage()
     */
    protected function displayMaintenancePage()
    {
        // Prevent maintenance page to be triggered
    }
}