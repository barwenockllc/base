<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Setup\Patch\Data;

class Collect implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    /**
     * Service URL
     *
     * @var string
     */
    protected const SERVICE_URL = '';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $curl;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->storeManager = $storeManager;
        $this->curl = $curl;
    }

    /**
     * Retrieves the current store's base URL, extracts the domain, and prepares data for sending to a service
     *
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function apply()
    {
        $domain = parse_url($this->storeManager->getStore()->getBaseUrl(), PHP_URL_HOST);

        $data = ['domain' => $domain];

        //TODO: Need to add service url for request sending
//        $this->curl->post(self::SERVICE_URL, $data);
    }

    /**
     * Get an array of patches that have to be executed prior to this
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        // Return an array of other patch classes that this patch depends on, if any
        return [];
    }

    /**
     * Get aliases (previous names) for the patch
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        // Return an array of aliases for this patch, if any
        return [];
    }
}
