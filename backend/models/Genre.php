<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property FilmGenre[] $filmGenres
 * @property Film[] $films
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[FilmGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilmGenres()
    {
        return $this->hasMany(FilmGenre::className(), ['genre_id' => 'id']);
    }

    /**
     * Gets query for [[Films]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('film_genre', ['genre_id' => 'id']);
    }
}
