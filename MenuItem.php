<?php

namespace dokuwiki\plugin\odtplusplus2dw;
use dokuwiki\Menu\Item\AbstractItem;

/**
 * Class MenuItem
 *
 * Implements the import button for DokuWiki's menu system
 *
 * @package dokuwiki\plugin\odtplusplus2dw
 */
class MenuItem extends AbstractItem {
    /** @var string do action for this plugin */
    public $type = 'odtplusplus2dw';
    /** @var string icon file */
    public $svg = __DIR__ . '/writer.svg';
    /**
     * MenuItem constructor.
     */
    public function __construct() {
        parent::__construct();
        global $REV;
        if($REV) $this->params['rev'] = $REV;
    }
    /**
     * Get label from plugin language file
     *
     * @return string
     */
    public function getLabel() {
        $hlp = plugin_load('action', 'odtplusplus2dw');
        return $hlp->getLang('import_button');
    }
}
