<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:10
 */
namespace nains\model\entities;


class Taverne
{

    protected $id;
    protected $nom;
    protected $chambres;
    protected $blonde;
    protected $brune;
    protected $rousse;
    protected $ville;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data){
        foreach ($data as $key => $val){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)){

              if (is_numeric($val)) {
                $val = (int)$val;
              }
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
     * @param mixed $chambres
     */
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;
    }

    /**
     * @param mixed $blonde
     */
    public function setBlonde($blonde)
    {
        $this->blonde = $blonde;
    }

    /**
     * @param mixed $brune
     */
    public function setBrune($brune)
    {
        $this->brune = $brune;
    }

    /**
     * @param mixed $rousse
     */
    public function setRousse($rousse)
    {
        $this->rousse = $rousse;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
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
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * @return mixed
     */
    public function getBlonde()
    {
        return $this->blonde;
    }

    /**
     * @return mixed
     */
    public function getBrune()
    {
        return $this->brune;
    }

    /**
     * @return mixed
     */
    public function getRousse()
    {
        return $this->rousse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

}
