<?php

namespace Barwenock\SocialAuth\Helper\Adminhtml;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $scopeConfig;

    protected $encryptor;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }

    public function getFacebookStatus()
    {
        return $this->scopeConfig->getValue(
            'socialauth/facebook_config/status',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getTwitterStatus()
    {
        return $this->scopeConfig->getValue(
            'socialauth/twitter_config/status',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getGoogleStatus()
    {
        return $this->scopeConfig->getValue(
            'socialauth/google_config/status',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getLinkedinStatus()
    {
        return $this->scopeConfig->getValue(
            'socialauth/linkedin_config/status',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getInstagramStatus()
    {
        return $this->scopeConfig->getValue(
            'socialauth/instagram_config/status',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getSocialConnectImage($type)
    {
        $configPath = "socialauth/{$type}_config/icon_login";
        return $this->scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getFacebookAppId()
    {
        return $this->encryptor->decrypt($this->scopeConfig->getValue(
            'socialauth/facebook_config/application_id',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
    }
}