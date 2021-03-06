<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Utility class to get the settings from Extension Manager
 *
 * @package TYPO3
 * @subpackage tx_news
 * @author Alexander Buchgeher
 * @author Georg Ringer <typo3@ringerge.org>
 */
class Tx_News_Utility_EmConfiguration {

	/**
	 * Parses the extension settings.
	 *
	 * @return Tx_News_Domain_Model_Dto_EmConfiguration
	 * @throws Exception If the configuration is invalid.
	 */
	public static function getSettings() {
		$configuration = self::parseSettings();
		\TYPO3\CMS\Core\Utility\GeneralUtility::requireOnce(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('news') . 'Classes/Domain/Model/Dto/EmConfiguration.php');
		$settings = new Tx_News_Domain_Model_Dto_EmConfiguration($configuration);
		return $settings;
	}

	/**
	 * Parse settings and return it as array
	 *
	 * @return array unserialized extconf settings
	 */
	public static function parseSettings() {
		$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['news']);

		if (!is_array($settings)) {
			$settings = array();
		}
		return $settings;
	}

}
