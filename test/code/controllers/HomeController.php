<?php

class HomeController extends Controller
{
	private $_categories;

	function actionIndex($url_key = null)
	{
//		$categories = Entry::model()->with('entries')->findAllBySql('select * from entry where parent_id is null and active = 1 order by `index` asc, id asc');

		$url_key = isset($_GET['url_key'])?$_GET['url_key']:null;
		if(empty($url_key)){
			$entryModel = Entry::model()->findBySql('select * from entry where parent_id is null and active = 1 and default_home = 1 order by `index` asc');
			if(empty($entryModel)) $entryModel = Entry::model()->findBySql('select * from entry where parent_id is null and active = 1');
		}
		else $entryModel = $this->loadEntryModelByUrlKey($url_key);
        header('Cache-Control: max-age=60, public, proxy-revalidate');
		header('ETag: '.$entryModel->last_updated_time);
		header('If-Modified-Since: '.$entryModel->last_updated_time);
		if(!empty($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $entryModel->last_updated_time){
			header("HTTP/1.0 304 Not Modified");
		}
		$this->render('index',array('entry'=>$entryModel));
	}

	public function actionSupport(){
		header('ETag: '.$entryModel->last_updated_time);
		header('Cache-Control: max-age=300, public, proxy-revalidate');
		if(!empty($_SERVER['HTTP_IF_NONE_MATCH'])){
			header("HTTP/1.0 304 Not Modified");
		}
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

	function getCategories(){
		if(!isset($this->_categories)){
			$this->_categories = Entry::model()->with('entries')->findAllBySql('select * from entry where parent_id is null and active = 1 order by `index` asc, id asc');
		}

		return $this->_categories;
	}
}

?>



<?php

//	function setLastModified($last_modified=NULL)
// {
//     $page_modified=getlastmod();

//     if(empty($last_modified) || ($last_modified < $page_modified))
//     {
//         $last_modified=$page_modified;
//     }
//     $header_modified=filemtime(__FILE__); // th?i này cu?i cùng file này b? thay d?i
//     if($header_modified > $last_modified)
//     {
//         $last_modified=$header_modified;
//     }
//     header('Last-Modified: ' . date("r",$last_modified));
//     return $last_modified;
// }

// function exitIfNotModifiedSince($last_modified)
// {
//     if(array_key_exists("HTTP_IF_MODIFIED_SINCE",$_SERVER))
//     {
//         $if_modified_since=strtotime(preg_replace('/;.*$/','',$_SERVER["HTTP_IF_MODIFIED_SINCE"]));
//         if($if_modified_since >= $last_modified)
//         {
//             header("HTTP/1.0 304 Not Modified");
//             exit();
//         }
//     }
// }
 ?>