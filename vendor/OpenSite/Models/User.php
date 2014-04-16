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
 * User model.
 *
 * @package OpenSite\Models
 * @author Jack P.
 * @since 3.0
 */
class User extends \Radium\Database\Model
{
    protected static $_validates = array(
        'username' => array('unique', 'required'),
        'email'    => array('unique', 'required'),
        'password' => array('required')
    );
}
