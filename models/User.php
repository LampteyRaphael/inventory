<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int $role_id
 * @property int $is_active
 * @property int|null $block_id
 * @property int|null $room_id
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property Inventory[] $inventories
 * @property Request[] $requests
 * @property Role $role
 * @property ActiveStatus $isActive
 */
class User extends \yii\db\ActiveRecord implements  IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }


    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['username', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'password', 'authKey'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'role_id', 'is_active'], 'required'],
            [['email'],'email'],
            [['role_id', 'is_active', 'block_id', 'room_id'], 'integer'],
            [['username', 'password', 'email', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
            [['is_active'], 'exist', 'skipOnError' => true, 'targetClass' => ActiveStatus::className(), 'targetAttribute' => ['is_active' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'role_id' => 'Role',
            'is_active' => 'Active Status',
            'block_id' => 'Block',
            'room_id' => 'Room',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function setPassword($password){
        return Yii::$app->security->generatePasswordHash($password);
    }

       public function generateAuthKey() {
       return Yii::$app->security->generateRandomString();
   }


    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ItemNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Inventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(Inventory::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[IsActive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActiveStatus()
    {
        return $this->hasOne(ActiveStatus::className(), ['id' => 'is_active']);
    }

    public function getBlocks()
    {
        return $this->hasOne(Blocks::className(), ['id' => 'block_id']);
    }

    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }
}
