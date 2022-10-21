<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CriminalRecord]].
 *
 * @see CriminalRecord
 */
class CriminalRecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CriminalRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CriminalRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
