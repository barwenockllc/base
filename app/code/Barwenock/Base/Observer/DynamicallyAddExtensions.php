<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Observer;

class DynamicallyAddExtensions implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * Base menu ID
     *
     * @var string
     */
    protected const BASE_MENU_ID = 'Barwenock_Base::menu';

    /**
     * @var \Magento\Backend\Model\Menu\Item\Factory
     */
    protected $menuItemFactory;

    /**
     * @var \Barwenock\Base\Model\Adminhtml\Extensions
     */
    protected $extension;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Barwenock\Base\Helper\Adminhtml\Config
     */
    protected $adminConfig;

    /**
     * Construct
     *
     * @param \Magento\Backend\Model\Menu\Item\Factory $menuItemFactory
     * @param \Barwenock\Base\Model\Adminhtml\Extensions $extensions
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Barwenock\Base\Helper\Adminhtml\Config $adminConfig
     */
    public function __construct(
        \Magento\Backend\Model\Menu\Item\Factory $menuItemFactory,
        \Barwenock\Base\Model\Adminhtml\Extensions $extensions,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Barwenock\Base\Helper\Adminhtml\Config $adminConfig
    ) {
        $this->menuItemFactory = $menuItemFactory;
        $this->extension = $extensions;
        $this->storeManager = $storeManager;
        $this->adminConfig = $adminConfig;
    }

    /**
     * Add module tabs dynamically
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($this->adminConfig->getMenuStatus()) {
            $block = $observer->getBlock();

            if ($block instanceof \Magento\Backend\Block\Menu) {
                $moduleData = $this->extension->getModulesList();

                foreach ($moduleData as $key => $value) {
                    $itemData = [
                        'id'          => $key,
                        'title'       => $value,
                        'resource'    => self::BASE_MENU_ID,
                        'action'      => sprintf('adminhtml/system_config/edit/section/%s', $key)
                    ];
                    $item = $this->menuItemFactory->create($itemData);

                    $menuModel = $block->getMenuModel();
                    $menuModel->add($item, self::BASE_MENU_ID, 20);
                }
            }
        }
    }
}
