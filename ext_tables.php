<?php

defined('TYPO3_MODE') or die();

$sysconf = array();
$sysconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['set_devipmask']);

if ($sysconf['devIPmask'] != '127.0.0.1,::1'
	&& $sysconf['devIPmask'] != ''
	&& !$sysconf['writeToLocalconf'])
{
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = $sysconf['devIPmask'];
} elseif (
	$sysconf['writeToLocalconf']
	&& $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] != $sysconf['devIPmask']
) {
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager')->setLocalConfigurationValueByPath('SYS/devIPmask', $sysconf['devIPmask']);
}