<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Controller\Adminhtml\Marketplace;

class Link extends \Magento\Backend\App\Action
{
    /**
     * Url for a company marketplace
     *
     * @var string
     */
    protected const MARKETPLACE_URL = 'https://www.barwenock.com/';

    /**
     * Redirect to a company marketplace
     *
     * @return void
     */
    public function execute()
    {
        $this->getResponse()->setRedirect(self::MARKETPLACE_URL);
    }
}
