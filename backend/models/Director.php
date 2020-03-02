<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property int $id
 * @property string $name
 * @property string|null $country
 *
 * @property Film[] $films
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'country'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country' => 'Country',
        ];
    }

    /**
     * Gets query for [[Films]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['director_id' => 'id']);
    }
}
