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

namespace OpenSite\Models;

/**
 * Page model.
 *
 * @package OpenSite\Models
 * @author Jack P.
 * @since 3.0
 */
class Page extends \Radium\Database\Model
{
    protected static $_before = array(
        'create' => array("jsonEncode"),
        'save'   => array("jsonEncode")
    );

    protected static $_after = array(
        'construct' => array('jsonDecode')
    );

    /**
     * Returns an array containing model objects of all enabled pages.
     *
     * @returns array
     */
    public static function fetchEnabled()
    {
        return static::select()->where('enabled = 1')->fetchAll();
    }

    protected function jsonEncode()
    {
        $this->controller_args = json_encode($this->controller_args);
    }

    protected function jsonDecode()
    {
        if (!$this->_isNew) {
            $this->controller_args = json_decode($this->controller_args, true);
        }
    }
}
