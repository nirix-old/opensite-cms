<?php
/*!
 * OpenSite
 * Copyright (C) 2008-2014 Jack P.
 * https://github.com/nirix
 *
 * This file is part of OpenSite.
 *
 * OpenSite is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 *
 * OpenSite is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OpenSite. If not, see <http://www.gnu.org/licenses/>.
 */

namespace OpenSite;

use Radium\Application;
use Radium\Http\Router;
use OpenSite\Models\Page;

/**
 * OpenSite application kernel.
 *
 * @package OpenSite
 * @author Jack P.
 * @since 3.0
 */
class OpenSite extends Application
{
    protected static $version = '3.0';

    public function __construct()
    {
        parent::__construct();

        // Fetch enabled pages and setup routes.
        foreach (Page::fetchEnabled() as $page) {
            Router::route($page->uri)
                ->to(
                    "{$page->controller_name}::{$page->controller_method}",
                    $page->controller_args
                )
                ->method($page->request_method);
        }

        require __DIR__ . '/Translations/enAU.php';

        $this->aliasClasses();
    }

    protected function aliasClasses()
    {
        class_alias("Radium\Helpers\HTML", "HTML");
    }

    public static function version()
    {
        return static::$version;
    }
}
