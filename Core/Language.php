<?php
/**
 * imva.biz Module Services: oxLang Extension
 *
 *
 *
 * For redistribution in the provicer's network only.
 *
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
 *
 *
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 *
 * You are free to use this software and to modify it in order to fit your requirements.
 *
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 *
 * By applying and using this software product, you agree to the terms and conditions of use.
 *
 *
 *
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 *
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 *
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 *
 *
 * (EULA-13/7-OS)
 *
 *
 *
 * (c) 2012-2020 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/6/28-20/3/29
 * V 2.6
 */

namespace Imva\OxidServices\Core;

class Language extends Language_parent
{

    /**
     * Appends Custom language files cust_lang.php. Includes "translations/admin" directories for admin extensions.
     *
     * @param array     $aLangFiles existing language files
     * @param string    $sLang      language abbreviation
     * @param boolean   $blForAdmin add files for admin
     *
     * @return string[]
     */
    protected function _appendModuleLangFiles($aLangFiles, $aModulePaths, $sLang, $blForAdmin = false)
    {
        // Inherit language file list from parent
        $aLangFiles = parent::_appendModuleLangFiles($aLangFiles, $aModulePaths, $sLang, $blForAdmin);

        // Add any language file that is located in "translations/admin/*/*_lang.php.
        if (is_array($aModulePaths)) {
            foreach ($aModulePaths as $sPath) {
                if ($blForAdmin) {
                    $sFullPath = $this->getConfig()->getModulesDir() . $sPath;
                    $sFullPath .= '/translations/admin/';
                    $sFullPath .= $sLang;
                    $aLangFiles = $this->_appendLangFile($aLangFiles, $sFullPath);
                }
            }
        }

        return $aLangFiles;
    }
}
