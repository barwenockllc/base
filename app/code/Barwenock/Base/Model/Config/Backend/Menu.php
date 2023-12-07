<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Model\Config\Backend;

class Menu extends \Magento\Framework\App\Config\Value
{
    /**
     * Clean caches after save menu status
     *
     * @return Menu
     */
    public function afterSave()
    {
        if ($this->isValueChanged()) {
            $this->cacheTypeList->cleanType(\Magento\Framework\App\Cache\Type\Block::TYPE_IDENTIFIER);
            $this->cacheTypeList->cleanType(\Magento\Framework\App\Cache\Type\Config::TYPE_IDENTIFIER);
        }

        return parent::afterSave();
    }
}
