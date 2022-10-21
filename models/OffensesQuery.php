<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Offenses]].
 *
 * @see Offenses
 */
class OffensesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Offenses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Offenses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
