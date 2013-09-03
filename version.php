<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * OUC theme with the underlying Bootstrap theme.
 *
 * @package    theme
 * @subpackage ouc
 * @author     Pukunui Australia
 * @author     Based on code originally written by G J Bernard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 2013081500;
$plugin->requires  = 2013051400.05; // 2.5+ (Build: 20130614).
$plugin->component = 'theme_ouc';
$plugin->maturity = MATURITY_STABLE;
$plugin->release = '1.0';
$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2013050100
);