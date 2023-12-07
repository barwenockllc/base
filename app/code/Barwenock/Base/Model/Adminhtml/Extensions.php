<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Magento 2 Base Package
 */

declare(strict_types=1);

namespace Barwenock\Base\Model\Adminhtml;

class Extensions
{
    /**
     * Base company module
     *
     * @var string
     */
    protected const BASE_MODULE = 'Barwenock_Base';

    /**
     * Prefix of company module's
     *
     * @var string
     */
    protected const MODULE_PREFIX = 'Barwenock_';

    /**
     * Path to system file
     *
     * @var string
     */
    protected const SYSTEM_PATH = '/etc/adminhtml/system.xml';

    /**
     * @var \Magento\Framework\Module\ModuleList\Loader
     */
    protected $moduleListLoader;

    /**
     * @var \Magento\Framework\Component\ComponentRegistrar
     */
    protected $componentRegistrar;

    /**
     * @var \Magento\Framework\Filesystem\Io\File
     */
    protected $file;

    /**
     * Constructor
     *
     * @param \Magento\Framework\Module\ModuleList\Loader $moduleListLoader
     * @param \Magento\Framework\Component\ComponentRegistrar $componentRegistrar
     * @param \Magento\Framework\Filesystem\Io\File $file
     */
    public function __construct(
        \Magento\Framework\Module\ModuleList\Loader $moduleListLoader,
        \Magento\Framework\Component\ComponentRegistrar $componentRegistrar,
        \Magento\Framework\Filesystem\Io\File $file
    ) {
        $this->moduleListLoader = $moduleListLoader;
        $this->componentRegistrar = $componentRegistrar;
        $this->file = $file;
    }

    /**
     * Retrieve a list of custom modules in the system with their formatted names
     *
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getModulesList()
    {
        $moduleList = [];
        $modules = $this->moduleListLoader->load();

        foreach (array_keys($modules) as $moduleName) {
            if (str_starts_with($moduleName, self::MODULE_PREFIX)) {
                $modulePath = $this->componentRegistrar->getPath(
                    \Magento\Framework\Component\ComponentRegistrar::MODULE,
                    $moduleName
                );

                if ($modulePath) {
                    // Check if system.xml exist in module
                    $systemXmlPath = $modulePath . self::SYSTEM_PATH;

                    if ($this->file->fileExists($systemXmlPath) && $moduleName != self::BASE_MODULE) {
                        // Remove the prefix 'Barwenock_'
                        $moduleKey = strtolower(str_replace(self::MODULE_PREFIX, '', $moduleName));
                        // Convert the module name to a formatted version (e.g., SocialAuth)
                        $moduleValue = str_replace(self::MODULE_PREFIX, 'Extension ', $moduleName);

                        $moduleList[$moduleKey] = $moduleValue;
                    }
                }
            }
        }

        return $moduleList;
    }
}
