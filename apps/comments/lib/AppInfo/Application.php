<?php

/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Comments\AppInfo;

use OCA\Comments\Controller\Notifications;
use OCA\Comments\JSSettingsHelper;
use OCP\AppFramework\App;
use OCP\Util;

class Application extends App {

	public function __construct (array $urlParams = array()) {
		parent::__construct('comments', $urlParams);
		$container = $this->getContainer();

		$container->registerAlias('NotificationsController', Notifications::class);

		$jsSettingsHelper = new JSSettingsHelper($container->getServer());
		Util::connectHook('\OCP\Config', 'js', $jsSettingsHelper, 'extend');
	}
}
