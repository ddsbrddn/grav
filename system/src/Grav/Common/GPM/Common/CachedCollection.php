<?php

/**
 * @package    Grav\Common\GPM
 *
 * @copyright  Copyright (C) 2015 - 2019 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Common\GPM\Common;

use Grav\Common\Iterator;

class CachedCollection extends Iterator {

    protected static $cache;

    public function __construct($items)
    {
        parent::__construct();
        // local cache to speed things up
        if (!isset(self::$cache[get_called_class() . __METHOD__])) {
            self::$cache[get_called_class() . __METHOD__] = $items;
        }

        foreach (self::$cache[get_called_class() . __METHOD__] as $name => $item) {
            $this->append([$name => $item]);
        }
    }
}
