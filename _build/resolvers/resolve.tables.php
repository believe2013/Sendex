<?php

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modelPath = $modx->getOption('sendex_core_path',null,$modx->getOption('core_path').'components/sendex/').'model/';
			$modx->addPackage('sendex', $modelPath);

			$manager = $modx->getManager();
			$objects = array(
				'sxNewsletter',
				'sxSubscriber',
				'sxQueue',
			);
			foreach ($objects as $object) {
				$manager->createObjectContainer($object);
			}

			// Запоминаем текущий уровень ошибок
			$level = $modx->getLogLevel();
			// Выставляем самый мощный уровень, чтобы не было ругани в логах при попытке создания существующих полей
			$modx->setLogLevel(xPDO::LOG_LEVEL_FATAL);
			// Добавляем поле и индекс
			$manager->addField('sxQueue', 'hash');
			$manager->addIndex('sxQueue', 'hash');
			// Возвращаем старый уровень логирования
			$modx->setLogLevel($level);

			break;

		case xPDOTransport::ACTION_UPGRADE:
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
