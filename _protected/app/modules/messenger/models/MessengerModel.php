<?php
/**
 * @author         Pierre-Henry Soria <hello@ph7cms.com>
 * @copyright      (c) 2012-2019, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / Messenger / Model
 */

namespace PH7;

use PDO;
use PH7\Framework\Mvc\Model\Engine\Db;
use stdClass;

class MessengerModel extends UserCoreModel
{
    /**
     * Get random picture.
     *
     * @param int|null $iProfileId
     * If the user is logged in, you need to specify its user ID, in order to not display its own profile since the user cannot vote for themselves.
     *
     * @param int $iApproved
     * @param int $iOffset
     * @param int $iLimit
     *
     * @return stdClass DATA ot the user (profileId, username, firstName, sex, avatar).
     */
    function get_all_chat_data(){
		$query = "
		SELECT * FROM ph7_messenger 
			INNER JOIN ph7_members 
			ON ph7_members.profileId = ph7_messenger.userid 
			ORDER BY ph7_messenger.id ASC
		";

		$statement = $this->connect->prepare($query);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
