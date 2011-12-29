<?php
/* Ninja Clicky
* By Richie Mortimer
* http://ninjaforge.com 
* Copyright (C) 2007 Richie Mortimer NinjaForge.com - Code so sharp, it hurts.
* email: richie@ninjaforge.com
* Release: 1.4 : November, 2009 : Mark Simpson
* Release: 1.3 : November, 2009 : Mark Simpson
* Release: 1.2 : October, 2009 : Mark Simpson
* Release: 1.1 : January, 2008 : Richie Mortimer
* License : http://www.gnu.org/copyleft/gpl.html GNU/GPL 
*
* Changelog
* 
***1.4 November, 09 :
* Added SSL support.
*
**1.3 November, 09 :
* Removed Site DB field and updated to latest getclicky js
*
*1.2 October, 09 :
*	 Module renamed to mod_ninja_clicky (from mod_ninclicky)
*	 Removed deprecated affiliate id and js ID
*	 Updated copyright : ninjoomla => ninjaforge
*
*1.1 January, 08 :
*		Updated cleaner code
*		Make Invisible Option Added
*
*1.0 October, 07 :
*		Initial Release
*/
###################################################################
//Ninja Clicky
//Copyright (C) 2007 -2009 Richie Mortimer. NinjaForge.com. All rights reserved.
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
###################################################################

  // Ensure this file is being included by a parent file. 
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

  //module base
  $document =& JFactory::getDocument();
  $modbase  =  JURI::base().'modules/mod_ninja_clicky/assets/';
  $uri = JFactory::getURI();

  //grab all the variables
  $ninclicky_javascript = $params->get( 'ninclicky_javascript' );
  $ninclicky_button     = $params->get( 'ninclicky_button' );
  $ninclicky_invisible  = $params->get( 'ninclicky_invisible' );
  $ninclicky_ID         = $params->get( 'ninclicky_ID', '12345' );
  
  //check if SSL is enabled on the current page, and assign an 's' to $secure.
  $secure                    =  '';
  if ($uri->isSSL()) $secure = 's';
  
  // okay lets start the code, as we will always want it
  // then we will check if javascript is enabled and show the javascript 

  if ($ninclicky_invisible == 0 || $ninclicky_javascript == 0) { ?>
      <a title="Clicky Web Analytics" href="http://getclicky.com/<?php echo $ninclicky_ID; ?>">
        <img alt="Clicky Web Analytics" src="<?php echo $modbase; ?>images/<?php echo $ninclicky_button; ?>" border="0" />
      </a><?php
  } 
   
  if ($ninclicky_javascript == 0) { ?>
      <img alt="Clicky" width="1" height="1" src="http://static.getclicky.com/<?php echo $ninclicky_ID; ?>ns.gif" /><?php
   } else { ?>
        <script src="http<?php echo $secure; ?>://static.getclicky.com/js" type="text/javascript"></script>
        <script type="text/javascript">clicky.init(<?php echo $ninclicky_ID; ?>);</script>
        <noscript>
            <p><img alt="Clicky" width="1" height="1" src="http<?php echo $secure; ?>://static.getclicky.com/<?php echo $ninclicky_ID; ?>ns.gif" /></p>
        </noscript><?php
   } ?>