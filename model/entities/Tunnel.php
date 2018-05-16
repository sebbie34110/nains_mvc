<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:22
 */
namespace nains\model\entities;

class Tunnel
{

    protected $id;
    protected progres;
    protected $villedepart;
    protected $villearrivee;


    public function __construct($data)
    {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data){
        foreach ($data as $key => $val){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($val);
            }
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $villedepart
     */
    public function setVilledepart($villedepart)
    {
        $this->villedepart = $villedepart;
    }

    /**
     * @param mixed $villearrivee
     */
    public function setVillearrivee($villearrivee)
    {
        $this->villearrivee = $villearrivee;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVilledepart()
    {
        return $this->villedepart;
    }

    /**
     * @return mixed
     */
    public function getVillearrivee()
    {
        return $this->villearrivee;
    }




}