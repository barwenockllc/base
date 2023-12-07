<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Model\Config\Source;

class NotificationType implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Announcement type
     *
     * @var string
     */
    protected const TYPE_ANNOUNCEMENT = 'announcement';

    /**
     * Available Updates
     *
     * @var string
     */
    protected const AVAILABLE_UPDATES = 'available_updates';

    /**
     * Marketing
     *
     * @var string
     */
    protected const TYPE_MARKETING = 'marketing';

    /**
     * Notification type option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            self::TYPE_ANNOUNCEMENT => __('Announcement'),
            self::AVAILABLE_UPDATES   => __('Available Updates'),
            self::TYPE_MARKETING    => __('Promotions ')
        ];
    }
}
