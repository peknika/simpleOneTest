<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $name
 * @property int $director_id
 * @property int|null $year
 * @property int|null $review
 *
 * @property Director $director
 * @property FilmGenre[] $filmGenres
 * @property Genre[] $genres
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'director_id'], 'required'],
            [['director_id', 'year', 'review'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Director::className(), 'targetAttribute' => ['director_id' => 'id']],
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
            'director_id' => 'Director ID',
            'year' => 'Year',
            'review' => 'Review',
        ];
    }

    /**
     * Gets query for [[Director]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Director::className(), ['id' => 'director_id']);
    }

    /**
     * Gets query for [[FilmGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilmGenres()
    {
        return $this->hasMany(FilmGenre::className(), ['film_id' => 'id']);
    }

    /**
     * Gets query for [[Genres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('film_genre', ['film_id' => 'id']);
    }
}
