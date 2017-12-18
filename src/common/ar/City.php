<?php

namespace bulldozer\cities\common\ar;

use bulldozer\db\ActiveRecord;
use bulldozer\users\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%cities}}".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updater_id
 * @property integer $active
 * @property integer $default
 * @property string $name
 * @property string $slug
 * @property string $emails_json
 * @property string $phones_json
 * @property string $address
 * @property string $working_time
 * @property float $lat
 * @property float $lng
 *
 * @property array $emails
 * @property array $phones
 */
class City extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors() : array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'creator_id',
                'updatedByAttribute' => 'updater_id',
            ],
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() : string
    {
        return '{{%cities}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator() : ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater() : ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'updater_id']);
    }

    /**
     * @return array
     */
    public function getEmails() : array
    {
        return json_decode($this->emails_json, true) ?? [];
    }

    /**
     * @return array
     */
    public function getPhones() : array
    {
        return json_decode($this->phones_json, true) ?? [];
    }

    /**
     * @param array $value
     */
    public function setEmails(array $value) : void
    {
        $this->emails_json = json_encode($value);
    }

    /**
     * @param array $value
     */
    public function setPhones(array $value) : void
    {
        $this->phones_json = json_encode($value);
    }
}
