<?php

namespace app\models;

//use phpDocumentor\Reflection\DocBlock\Tag;
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property integer $viewed
 * @property integer $user_id
 * @property integer $status
 * @property integer $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['title','description','content'],'string'],
            [['date'],'date', 'format'=>'php:Y-m-d'],
            [['date'],'default','value' => date('Y-m-d')],
            [['title'],'string','max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getArticleTags()
//    {
//        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getComments()
//    {
//        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
//    }

    public function saveImage($filename) {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        if($this->image)
        {
            return '/uploads/'.$this->image;
        }
        return '/default.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload;
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if ($category != null)
        {
            $this->link('category',$category);
            return true;
        }
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedIds = $this->getTags()->select('id')
            ->asArray()->all();
        return ArrayHelper::getColumn($selectedIds,'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags))
        {
            $this->clearCurrentTags();
            foreach($tags as $tag_id)
            {
                $tag = Tag::findOne($tag_id);
                $this->link('tags',$tag);
            }
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id'=>$this->id]);
    }

    public static function getAll($pagesize =1) {
        $query = Article::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pagesize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['pagination'] = $pagination;
        $data['articles'] = $articles;
        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed DESC')->limit(3)->all();
    }

    public static function getLast()
    {
        return Article::find()->orderBy('date DESC')->limit(3)->all();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    public function getAppliedComments()
    {
        return $this->getComments()->where(['status'=>1])->all();
    }

    public function viewCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
