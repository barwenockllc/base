<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Plugin\Model\Menu;

class Builder
{
    /**
     * Base menu ID
     *
     * @var string
     */
    protected const BASE_MENU_ID = 'Barwenock_Base::menu';

    /**
     * @var \Barwenock\Base\Helper\Adminhtml\Config
     */
    protected $configHelper;

    /**
     * @param \Barwenock\Base\Helper\Adminhtml\Config $configHelper
     */
    public function __construct(
        \Barwenock\Base\Helper\Adminhtml\Config $configHelper
    ) {
        $this->configHelper = $configHelper;
    }

    /**
     * Check the status and remove menu bar if needed
     *
     * @param \Magento\Backend\Model\Menu\Builder $subject
     * @param \Magento\Backend\Model\Menu $menu
     * @return \Magento\Backend\Model\Menu|void
     */
    public function afterGetResult(\Magento\Backend\Model\Menu\Builder $subject, \Magento\Backend\Model\Menu $menu)
    {
        if (!$menu->get(self::BASE_MENU_ID) instanceof \Magento\Backend\Model\Menu\Item) {
            return;
        }

        if (!$this->configHelper->getMenuStatus()) {
            $menu->remove(self::BASE_MENU_ID);
        }

        return $menu;
    }
}
