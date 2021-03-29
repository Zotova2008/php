<?php
/**
 * Get all the translations messages, as defined in the English language file.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup MaintenanceLanguage
 */

use MediaWiki\MediaWikiServices;

require_once __DIR__ . '/../Maintenance.php';

/**
 * Maintenance script that gets all messages as defined by the
 * English language file.
 *
 * @ingroup MaintenanceLanguage
 */
class AllTrans extends Maintenance {

	/** @var LocalisationCache */
	private $localisationCache;

	public function __construct() {
		parent::__construct();
		$this->addDescription( 'Get all messages as defined by the English language file' );
		$this->localisationCache = MediaWikiServices::getInstance()->getLocalisationCache();
	}

	public function execute() {
		$englishMessages = $this->localisationCache->getItem( 'en', 'messages' );
		foreach ( array_keys( $englishMessages ) as $key ) {
			$this->output( "$key\n" );
		}
	}
}

$maintClass = AllTrans::class;
require_once RUN_MAINTENANCE_IF_MAIN;