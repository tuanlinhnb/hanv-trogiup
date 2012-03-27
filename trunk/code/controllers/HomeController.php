<?php

class HomeController extends Controller
{
	function actionIndex()
	{
		$categories = Entry::model()->with('entries')->findAllBySql('select * from entry where parent_id is null and active = 1 order by `index` asc, id asc');

		$url_key = isset($_GET['url_key'])?$_GET['url_key']:null;
		if(empty($url_key)){
			$entryModel = Entry::model()->findBySql('select * from entry where parent_id is null and active = 1 and default_home = 1 order by `index` asc');
			if(empty($entryModel)) $entryModel = Entry::model()->findBySql('select * from entry where parent_id is null and active = 1');
		}
		else $entryModel = $this->loadEntryModelByUrlKey($url_key);
		$this->render('index',array('categories' => $categories,'entry'=>$entryModel));
	}

	public function actionSupport(){
		$this->renderPartial('support');
	}

	public function loadEntryModelByUrlKey($uk)
	{
		$model=Entry::model()
			->with('entries')
			->findByAttributes(array('url_key'=>$uk));
		if($model===null)
			throw new CHttpException(404,'The requested Category does not exist.');
		return $model;
	}
}

?>
