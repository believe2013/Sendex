<?php

$properties = array();

$tmp = array(
	// Цифровое поле для указания id рассылки
	'id' => array(
		'type' => 'numberfield',
		'value' => '',
	),
	// Переключатель да\нет
	'showInactive' => array(
		'type' => 'combo-boolean',
		'value' => false,
	),
	// Форма подписки с чанком по умолчанию
	'tplSubscribeForm' => array(
		'type' => 'textfield',
		'value' => 'tpl.Sendex.subscribe.form',
	),
	// Форма отписки с чанком по умолчанию
	'tplUnsubscribeForm' => array(
		'type' => 'textfield',
		'value' => 'tpl.Sendex.unsubscribe.form',
	),
	// Форма активации
	'tplActivate' => array(
		'type' => 'textfield',
		'value' => 'tpl.Sendex.subscribe.activate',
	),
);

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(
		array(
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		), $v
	);
}

return $properties;