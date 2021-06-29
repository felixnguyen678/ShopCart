<?php
require_once ('../connection.php');
class User
{
    private $_id;
    private $email;
    private $password;
    private $address;
    private $phoneNumber;
    private $birthday;
    private $orders;

    /**
     * User constructor.
     * @param $_id
     * @param $email
     * @param $password
     * @param $address
     * @param $phoneNumber
     * @param $birthday
     */
    public function __construct($_id, $email, $password, $address, $phoneNumber, $birthday, $orders)
    {
        $this->_id = $_id;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->birthday = $birthday;
        $this->orders = $orders;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    public static function findById($id){
        $collection = Mongo::getInstance()->ShopCart_db->USERS;
        $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectId($id)]);
        foreach($cursor as $user){
            return new User(
                $user['_id'],
                $user['email'],
                $user['password'],
                $user['address'],
                $user['phoneNumber'],
                $user['birthday'],
                NULL
            );

        }
        return NULL;
    }
    public static function findByEmailAndPassword($email, $password){
        $collection = Mongo::getInstance()->ShopCart_db->USERS;
        $cursor = $collection->find(['email'=>$email, 'password' => $password ]);
        foreach($cursor as $user){
            try{
            $user = new User(
                $user['_id'],
                $user['email'],
                $user['password'],
                $user['address'],
                $user['phoneNumber'],
                $user['birthday'],
                NULL
            );
            return $user;
            }
            catch(Exception $e){
                return NULL;
            }

        }
        return NULL;
    }

}