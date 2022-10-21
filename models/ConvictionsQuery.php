<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Convictions]].
 *
 * @see Convictions
 */
class ConvictionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Convictions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Convictions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
