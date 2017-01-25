<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meal".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Ingredient[] $ingredients
 */
class Meal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::className(), ['meal_id' => 'id']);
    }

    public static function selectMealsByIngredients($items) {
        $selected = [];
        foreach($items as $id => $item) {
            if ($id == '_csrf') continue;
            $selected[] = $item;
            var_dump($item);
        }
        return self::find()->innerJoin('ingredient','meal.id = ingredient.meal_id')
            ->where(['ingredient.product_id' => $selected])->all();
    }
}
