<?php
/**
 * imva.biz Services
 *  
 * 
 * 
 * For redistribution in the provider's network only.
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 * You are free to use this software and to modify it in order to fit your requirements.
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 * By applying and using this software product, you agree to the terms and conditions of use.
 *
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 * (EULA-13/7-OS)
 *
 * @author        imva@imva.biz
 * @link          https://imva.biz
 * @copyright (C) Johannes Ackermann, imva.biz 2014-2020
 *
 * @package Services
 * Created: 2016-09-26, ja
 * Upd.: 20/3/29
 */

namespace \Imva\OxidServices\Service;

class Logger
{

    /** @var int Loglevel */
    protected $_loglevel = null;

    /** @var string Logfile name. Modify with setter. */
    protected $_logfileName = 'imva_services.log';

    /**
     * Construct
     *
     * @param null
     * @return null
     */
    public function __construct()
    {
        $this->log(
            'Loglevel is: '.$this->_getLoglevel(),
            4,
            null
        );
    }

    /**
     * Logger function.
     *
     * Levels:
     * - 0: off
     * - 1: errors
     * - 2: warnings
     * - 3: messages
     * - 4: debug
     *
     * @param string Message (text)
     * @param int Error number
     * @param int Loglevel (0...4)
     * @return boolean
     */
    public function log($message, $loglevel = null, $errNumber = null){
        if ($this->_getLoglevel() == 0){
            return false;
        }
        if (!isset($loglevel)){
            $loglevel = 1;
        }
        if ($this->_getLoglevel() >= $loglevel){
            if ($loglevel == 1){
                $this->printMessage($message);
            }

            $fullMessage = date("Y-m-d H:i:s")."\t";
            $fullMessage .= $this->_getLoglevelLabels()[$loglevel].":\t";
            $fullMessage .= $message;
            if ($errNumber) {
                $fullMessage .= ' ('.$errNumber.')';
            }

            oxRegistry::get('oxUtils')->writeToLog(
                $fullMessage . "\n",
                $this->getLogfileName()
            );
        }

        return true;
    }

    /**
     * Get a name for the logfile
     *
     * @return string
     */
    public function getLogfileName()
    {
        return $this->_logfileName;
    }

    /**
     * Set a new logfile name. Use this if you want to use dedicated logfiles for different modules.
     *
     * @param string
     * @return null
     */
    public function setLogfileName($fileName)
    {
        $this->_logfileName = $fileName;
    }

    /**
     * Returns an array of level labels.
     *
     * @return string[]
     * @param null
     */
    private function _getLoglevelLabels()
    {
        return [
            'NOTE',
            'ERROR',
            'WARN',
            'MSG',
            'DEBUG'
        ];
    }

    /**
     * Destruct. Run afterwards.
     *
     * @param null
     * @return null
     */
    public function __destruct()
    {
        $this->log(
            '================================',
            4,
            null
        );
    }

    /**
     * Get loglevel from settings
     *
     * @param null
     * @return int
     */
    protected function _getLoglevel()
    {
        if ($this->_loglevel === null){
            $this->_loglevel = oxRegistry::getConfig()->getConfigParam('imva_services_logger_level');
        }

        return $this->_loglevel;
    }

    /**
     * Print errors on occurrence.
     *
     * @param string
     * @return boolean
     */
    public function printMessage($message)
    {
        if (oxRegistry::getConfig()->getConfigParam('imva_services_print_errors') and is_string($message))
        {
            echo '<span style="background: blue; color: #fff; font-weight: 700; position: absolute; padding: 0.3em;">'
                .$message
                .'</span>';

            return true;
        }

        return false;
    }
}
