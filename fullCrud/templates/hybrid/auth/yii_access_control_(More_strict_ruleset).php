public function filters() {
	return array(
			'accessControl',
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view','create','update','editableSaver','delete','admin'),
				'users'=>array('admin'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}
