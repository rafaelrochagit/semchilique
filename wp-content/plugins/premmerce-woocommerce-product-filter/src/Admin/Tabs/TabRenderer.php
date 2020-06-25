<?php namespace Premmerce\Filter\Admin\Tabs;

use Premmerce\Filter\Admin\Tabs\Base\TabInterface;
use Premmerce\SDK\V2\FileManager\FileManager;

class TabRenderer
{

    /**
     * @var TabInterface[]
     */
    private $tabs = [];

    /**
     * @var FileManager
     */
    private $fileManager;

    /**
     * TabRenderer constructor.
     *
     * @param FileManager $fileManager
     */
    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }


    /**
     * @param TabInterface $tab
     */
    public function register(TabInterface $tab)
    {
        $this->tabs[$tab->getName()] = $tab;
    }

    /**
     * Register hooks
     */
    public function init()
    {
        foreach ($this->tabs as $tab) {
            $tab->init();
        }
    }

    /**
     * Render current tab
     */
    public function render()
    {
        $tab = $this->get($this->current()) ?: reset($this->tabs);

        if ($tab && $tab->valid()) {
            $this->fileManager->includeTemplate('admin/options.php', ['tabs' => $this->tabs, 'current' => $tab]);
        }
    }

    /**
     * @param $name
     *
     * @return null|TabInterface
     */
    public function get($name)
    {
        return $this->has($name) ? $this->tabs[$name] : null;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->tabs[$name]);
    }

    /**
     * @return mixed|TabInterface
     */
    public function current()
    {
        return isset($_GET['tab']) ? $_GET['tab'] : null;
    }
}
