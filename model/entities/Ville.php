<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:22
 */

namespace nains\model\entities;


class Ville
{

    protected $id;
    protected $nom;
    protected $superficie;


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
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $superficie
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }




}