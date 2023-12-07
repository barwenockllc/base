<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Helper\Adminhtml;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Get menu status
     *
     * @return mixed
     */
    public function getMenuStatus()
    {
        return $this->scopeConfig->getValue(
            'barwenock/general/menu',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
