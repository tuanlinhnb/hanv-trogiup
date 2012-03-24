<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $name
 * @property string $url_key
 * @property string $parent_id
 * @property string $index
 * @property integer $is_leaf
 *
 * The followings are the available model relations:
 * @property Attr[] $attrs
 * @property ClassifiedsCategory $parent
 * @property ClassifiedsCategory[] $categories
 * @property Item[] $items
 */
class CategoryForm extends CFormModel
{
	public $suggestKeyword = null;

	public $suggestCats = array();
}