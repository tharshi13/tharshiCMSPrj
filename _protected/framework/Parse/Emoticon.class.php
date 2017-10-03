<?php
/**
 * @title            Emoticon Class
 * @desc             Parse the emoticon code.
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / Framework / Parse
 * @version          1.1
 */

namespace PH7\Framework\Parse;

defined('PH7') or exit('Restricted access');

use PH7\Framework\File\File;
use PH7\Framework\Layout\Optimization;
use PH7\Framework\Service\Emoticon as EmoticonService;

class Emoticon extends EmoticonService
{
    /**
     * Parse the contents.
     *
     * @param string $sContents
     * @param boolean $bIsDataUri
     *
     * @return string Contents
     */
    public static function init($sContents, $bIsDataUri = true)
    {
        $aEmoticons = static::get();

        foreach ($aEmoticons as $sEmoticonKey => $aEmoticon) {
            if ($bIsDataUri) {
                $sSrcImg = Optimization::dataUri(static::getPath($sEmoticonKey), new File);
            } else {
                $sSrcImg = static::getUrl($sEmoticonKey);
            }
            $sContents = str_ireplace(static::getCode($aEmoticon), '<img src=\'' . $sSrcImg . '\' alt=\'' . static::getName($aEmoticon) . '\' />', $sContents);
        }

        return $sContents;
    }
}
