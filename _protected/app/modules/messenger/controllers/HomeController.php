<?php
/**
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2019, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / App / Module / Messenger / Controller
 */

namespace PH7;

use PH7\Framework\Translate\Lang;

class HomeController extends Controller
{
    /**
     * Example URL: http://your-domain.com/m/messenger/home/index
     *
     * @param string $sFirstName
     * @param string $sLastName
     */
    public function index($sFirstName = '', $sLastName = '')
    {
        // Loading custom_messenger language...
        (new Lang)->load('custom_messenger');

        /**
         * Add JS file only for Members.
         * Otherwise, the Rating System will redirect visitors who aren't logged in to the registration form.
         */
        if (UserCore::auth()) {
            $this->addJsFile();
        }

        // Meta Tags
        $this->view->page_title = t('Messenger - A Instant Messaging Module By Monarul Islam');
        $this->view->meta_description = t('Custom Messenger for pH7CMS that is diffrent from the built in IM (Instant Messaging Module).');
        $this->view->meta_keywords = t('messenger, chat, custom chat, CMS, Dating CMS, CMS Dating, Social CMS, pH7, pH7 CMS, Dating Script, Social Dating Script, Dating Software, Social Network Software, Social Networking Software, Instant Messaging, IM Module');

        /* Heading html tags (H1 to H4) */
        $this->view->h1_title = t('Messenger Module Created By "Monarul007"');
        $this->view->h3_title = t('Custom Messenger');
        $this->view->desc = t('Hello %0% %1% How are you on this %2%?', $this->str->upperFirst($sFirstName), $this->str->upperFirst($sLastName), $this->dateTime->get()->date('l'));

        // Display the page
        $this->output();
    }

    private function addJsFile(){
        $this->design->addCss(
            PH7_DOT,
            PH7_STATIC . PH7_JS . 'parsley/parsley.css'
        );
        $this->design->addJs(
            PH7_DOT,
            PH7_STATIC . PH7_JS . 'parsley/dist/parsley.min.js'
        );
        $this->design->addJs(
            PH7_LAYOUT . PH7_SYS . PH7_MOD . $this->registry->module . PH7_SH . PH7_TPL . PH7_TPL_MOD_NAME . PH7_SH . PH7_JS,
            'script.js'
        );
    }
}
