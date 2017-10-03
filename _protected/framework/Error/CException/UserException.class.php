<?php
/**
 * @title          PH7 User Exception Class
 * @desc           User Exception handling.
 *
 * @author         Pierre-Henry Soria <hello@ph7cms.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7/ Framework / Error / CException
 */

namespace PH7\Framework\Error\CException;

defined('PH7') or exit('Restricted access');

use Exception;

class UserException extends Exception
{
    use Escape;

    /**
     * @param string $sMsg
     */
    public function __construct($sMsg)
    {
        parent::__construct($sMsg);
        $this->init($sMsg);
    }
}
