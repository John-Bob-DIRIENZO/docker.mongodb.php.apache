<?php


namespace JohnBob\Src;


class Test implements \MongoDB\BSON\Unserializable
{
    private $_id;
    private $address;
    private $borough;
    private $cuisine;
    private $grades;
    private $name;
    private $restaurant_id;

    /**
     * C'est un peu le constructeur spécial ici
     * @inheritDoc
     */
    public function bsonUnserialize(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }

    /**
     * You can do (string) $this->_id
     * @return mixed
     */
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * @param mixed $_id
     */
    public function set_id($_id)
    {
        $this->_id = $_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getBorough()
    {
        return $this->borough;
    }

    /**
     * @param mixed $borough
     */
    public function setBorough($borough)
    {
        $this->borough = $borough;
    }

    /**
     * @return mixed
     */
    public function getCuisine()
    {
        return $this->cuisine;
    }

    /**
     * @param mixed $cuisine
     */
    public function setCuisine($cuisine)
    {
        $this->cuisine = $cuisine;
    }

    /**
     * @return mixed
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * @param mixed $grades
     */
    public function setGrades($grades)
    {
        $this->grades = $grades;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRestaurant_Id()
    {
        return $this->restaurant_id;
    }

    /**
     * @param mixed $restaurant_id
     */
    public function setRestaurant_Id($restaurant_id)
    {
        $this->restaurant_id = $restaurant_id;
    }
}