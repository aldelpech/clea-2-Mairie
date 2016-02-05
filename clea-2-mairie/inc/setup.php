<?php
/**
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    stargazer
 * @subpackage Functions
 * @version    1.0.0
 * @author     Anne-Laure Delpech <ald.kerity@gmail.com>
 * @copyright  Copyright (c) 2016 - 2019, Anne-Laure Delpech
 * @link       http://parcours-performance.com
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 

# Register custom menus.
add_action( 'init', 'clea_2_register_subsidiary_menu', 5 ); 

# Register sidebars.
add_action( 'widgets_init', 'clea_2_register_sidebars', 5 );
 
/*******************************************
* Register a new menu 
*******************************************/

function clea_2_register_subsidiary_menu() {

	register_nav_menu( 'subsidiary',   _x( 'Subsidiary',   'nav menu location', 'stargazer' ) );
	
}


/*******************************************
* Register a new sidebar 
*******************************************/

function clea_2_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'before-front-page',
			'name'        => _x( 'Before Front Page', 'sidebar', 'stargazer' ),
			'description' => __( 'A sidebar displayed before the content of the front page, full width', 'stargazer' )
		)
	);
	
		hybrid_register_sidebar(
		array(
			'id'          => 'inside-header',
			'name'        => _x( 'Inside Header', 'sidebar', 'stargazer' ),
			'description' => __( 'A sidebar displayed inside the header', 'stargazer' )
		)
	);
	
}
