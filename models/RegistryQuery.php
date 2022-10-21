<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Registry]].
 *
 * @see Registry
 */
class RegistryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Registry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Registry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
