<?php

class sxSubscriberGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'sxSubscriber';
	public $classKey = 'sxSubscriber';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';


	/**
	* @param xPDOQuery $c
	*
	* @return xPDOQuery
	*/
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		// Выбираем только нужные записи
		$c->where(array('newsletter_id' => $this->getProperty('newsletter_id')));
		// И присоединяем свойства пользователей
		$c->leftJoin('modUser', 'modUser', 'sxSubscriber.user_id = modUser.id');
		$c->leftJoin('modUserProfile', 'modUserProfile', 'sxSubscriber.user_id = modUserProfile.internalKey');

		// Выбираем поля подписчика
		$c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));
		// И добавляем псевдоним и имя
		$c->select('modUser.username, modUserProfile.fullname');

		return $c;
	}

}

return 'sxSubscriberGetListProcessor';