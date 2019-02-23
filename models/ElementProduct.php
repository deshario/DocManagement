<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "element_product".
 *
 * @property int $element_product_id
 * @property int $ep_element_id องค์ประกอบ
 * @property int $ep_product_id ผลผลิต
 * @property string $project_act_key อ้างอิง project รึ Act
 *
 * @property Activity[] $activities
 * @property Element $epElement
 * @property Product $epProduct
 * @property Project[] $projects
 */
class ElementProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'element_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ep_element_id', 'ep_product_id'], 'integer'],
            [['project_act_key'], 'string', 'max' => 255],
            [['ep_element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['ep_element_id' => 'element_id']],
            [['ep_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['ep_product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'element_product_id' => 'Element Product ID',
            'ep_element_id' => 'องค์ประกอบ',
            'ep_product_id' => 'ผลผลิต',
            'project_act_key' => 'อ้างอิง project รึ Act',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['activity_ep_id' => 'element_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpElement()
    {
        return $this->hasOne(Element::className(), ['element_id' => 'ep_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'ep_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_ep_id' => 'element_product_id']);
    }
}
