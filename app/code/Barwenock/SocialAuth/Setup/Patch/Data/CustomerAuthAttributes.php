<?php

namespace Barwenock\SocialAuth\Setup\Patch\Data;

class CustomerAuthAttributes implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * __construct function
     *
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Apply function
     */
    public function apply()
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $attributes = [
            'socialauth_twitter_id' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Twitter ID",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_twitter_token' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Twitter Token",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_linkedin_id' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization LinkedIn ID",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_linkedin_token' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization LinkedIn Token",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_google_id' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Google ID",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_google_token' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Google Token",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_instagram_id' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Instagram ID",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
            'socialauth_instagram_token' => [
                "type"     => "text",
                "backend"  => "",
                "label"    => "Social Authorization Instagram Token",
                "input"    => "text",
                "source"   => "",
                "visible"  => false,
                "required" => false,
                "default" => "",
                "frontend" => "",
                "unique"     => false,
                "note"       => ""
            ],
        ];

        foreach ($attributes as $code => $options) {
            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                $code,
                $options
            );
        }
    }

    /**
     * Get dependencies
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get aliases
     */
    public function getAliases()
    {
        return [];
    }
}