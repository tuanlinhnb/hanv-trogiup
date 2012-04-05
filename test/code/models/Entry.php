<?php

/**
 * This is the model class for table "entry".
 *
 * The followings are the available columns in table 'entry':
 * @property string $id
 * @property string $url_key
 * @property string $parent_id
 * @property string $title
 * @property string $content
 * @property integer $active
 * @property integer $default_home
 * @property string $created_time
 * @property integer $index
 * @property string $last_updated_time
 *
 * The followings are the available model relations:
 * @property Entry[] $path
 * @property Entry $parent
 * @property Entry[] $entries
 */
class Entry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Entry the static model class
	 */
	private $_path = array();
	private $_url_path = '';
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
   		return array(
			array('url_key, title, created_time', 'required'),
			array('active, default_home, index', 'numerical', 'integerOnly'=>true),
			array('url_key', 'length', 'max'=>50),
			array('parent_id', 'length', 'max'=>11),
			array('title', 'length', 'max'=>255),
			array('content, last_updated_time', 'safe'),
			array('url_key', 'unique', 'className' => 'Entry', 'attributeName' => 'url_key', 'message' => '{attribute} đã được sử dụng'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url_key, parent_id, title, content, active, default_home, created_time, index, last_updated_time', 'safe', 'on'=>'search'),
		);
	}

	function getPath()
	{
		if (!isset($this->_path)) {
			$path = array();
			$pid = $this->parent_id;

			while (!empty($pid)) {
				$parent = $this->findByPk($pid->parent_id);
				$path[]=$parent;
//				array_unshift($path, $parent);
				$pid = $parent->parent_id;
			};

			$this->_path = $path;
		}
		return $this->_path;
	}

	public function getUrl_path()
	{
//			$url = $this->url_key;
			$url = array('url_key'=>$this->url_key);
			$p = $this->parent;
			$i = 1;
			while (!empty($p)) {
                $url['url_key_p_'.$i] = $p->url_key;
				$p = $p->parent;
				$i++;
				}
			$url  = array_reverse($url);
			$this->_url_path = $url;
		return $this->_url_path;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Entry', 'parent_id'),
			'entries' => array(self::HAS_MANY, 'Entry', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
  	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url_key' => 'Url Key',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'content' => 'Content',
			'active' => 'Active',
			'default_home' => 'Default Home',
			'created_time' => 'Created Time',
			'index' => 'Index',
			'last_updated_time' => 'Last Updated Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
  	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('url_key',$this->url_key,true);
//		$criteria->compare('parent_id',$this->parent_id,true);
		if(!empty($this->parent_id)){
			$sql = "select id from entry where title like '%$this->parent_id%'";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$results = $command ->queryAll();
			if(empty($results)) $ids = -1;
			else {
				$ids = '';
				foreach($results as $result ){
					$ids .= $result['id'].',';
				}
				$ids = substr($ids,0,-1);
			}
			$criteria->addCondition("parent_id in ($ids)");
		}

		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('default_home',$this->default_home);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('index',$this->index);
		$criteria->compare('last_updated_time',$this->last_updated_time,true);
		$criteria->order = 'parent_id asc, `index` asc, `id` asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
 			'pagination'=>array(
				 'pageSize'=>30,
			 ),
		));
	}

	function getChildren($count = 1000)
	{
		$criteria=new CDbCriteria;
		if (empty($this->id)) $criteria->addCondition('parent_id IS NULL');
		else $criteria->compare('parent_id',$this->id);
		$criteria->order = '`index`';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'	=>	array(
				'pageSize'	=>		$count,
			),
		));
	}

	function fetchAllAsTree()
	{
			$cmd = $this->getDbConnection()->createCommand(sprintf("SELECT * FROM `%s`;", $this->tableName()));
			$rows = $cmd->queryAll();
			$cats = array();
			$ref = array();
			foreach ($rows as & $cat) {
					$ref[$cat['id']] = & $cat;
					$cat['children'] = array();
			}
			foreach ($rows as & $cat)
					if (empty($cat['parent_id'])) $cats[] = & $cat;
					else $ref[$cat['parent_id']]['children'][] = & $cat;
			return $cats;
	}

	function suggest($keyword)
	{
		if (empty($keyword)) {
			return new CArrayDataProvider(array());
		}

		$criteria = new CDbCriteria();
		$criteria->compare('title', $keyword, true);
		$criteria->mergeWith($this->getDbCriteria());

		return new CActiveDataProvider(self::model(), array(
			'criteria'=>$criteria,

		));
	}
}