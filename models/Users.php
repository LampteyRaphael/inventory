<?php

namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class Users extends ActiveRecord implements  IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CREATE = 'create';

    public static function tableName() {
        return 'user';
    }

    // private $role_id;
    // private $block_id;
    // private $room_id;


    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['username', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'password', 'authKey'];
        return $scenarios;
    }

    public function rules() {
        return [
            [['username', 'email'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['role_id','block_id','room_id'], 'integer'],
            [['password'], 'string', 'max' => 60],
            [['authKey'], 'string', 'max' => 32],

            [['username', 'password', 'email','role_id'], 'required'],
            [['authKey'], 'default', 'on' => self::SCENARIO_CREATE, 'value' => Yii::$app->getSecurity()->generateRandomString()],
            [['password'], 'filter', 'on' => self::SCENARIO_CREATE, 'filter' => function($value) {
                return Yii::$app->getSecurity()->generatePasswordHash($value);
            }],

            [['username', 'password','role_id','block_id','room_id'], 'required', 'on' => self::SCENARIO_LOGIN],

            [['username'], 'unique'],
            [['email'], 'unique'],
            [['authKey'], 'unique'],

        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'id',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'role_id'=>'Role Name',
            'authKey' => 'authKey',
            'block_id'=>'Block',
            'room_id'=>'Room'
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

     //relational to blocks table as one to many relation
  public function getBlocks(){

    return $this->hasOne(Blocks::className(),['id'=>'block_id']);
}

//relational to rooms table as one to many relation
public function getRoom(){

    return $this->hasOne(Room::className(),['id'=>'room_id']);
}

//relational to rooms table as one to many relation
public function getRole(){

    return $this->hasOne(Role::className(),['id'=>'role_id']);
}

public function getStatus(){

    return $this->hasOne(ActiveStatus::className(),['id'=>'is_active']);
}

}


//    public $username;
//    public  $email;
//    public  $password;
//    public  $authKey;
//    public  $accessToken;
//
//    public static function tableName(){
//        return 'user';
//    }
//
//    public function rules(){
//        return [
//            [ ['username','email'],'required'],
//            [['password','authKey','accessToken'],'string','max'=>255]
//            ];
//    }
//
//
//    public  function  attributeLabels()
//    {
//        return [
//            'username'=>'username',
//            'password'=>'password',
//            'email'=>'email',
//        ];
//    }
//
//    public function getAuthKey(){
//        return $this->authKey;
//    }
//
//    public  function getId(){
//        return $this->id;
//    }
//
//    public  function validateAuthKey($authKey){
//
//        return $this->authKey===$authKey;
//    }
//
//    public static function findIdentity($id)
//    {
//        return self::findOne($id);
//    }
//
//    /**
//     * Finds an identity by the given token.
//     *
//     * @param string $token the token to be looked for
//     * @return Users
//     */
//    public static function findIdentityByAccessToken($token, $type = null)
//    {
//        return static::findOne(['access_token' => $token]);
//    }
//
//    public function setPassword($password)
//    {
//        return Yii::$app->security->generatePasswordHash($password);
//    }
//
//    public function generateAuthKey() {
//        return Yii::$app->security->generateRandomString();
//    }
//
////    public static function findIdentityByAccessToken($token, $type = null)
////    {
////        foreach (self::$users as $user) {
////            if ($user['accessToken'] === $token) {
////                return new static($user);
////            }
////        }
////
////        return null;
////    }
//
//
//    public static function findByUsername($username)
//    {
//        return static::findOne(['username' => $username]);
//    }
//
//    public function validatePassword($password)
//    {
//        return  $this->password===$password;
//    }
//
////   public function login()
////   {
////       if ($this->validate())
////       {
////           return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
////       }
////       else
////       {
////           return false;
////       }
////   }    0547617044
//
//}
//
