<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:09
 */

namespace nains\model\entities;

class groupe
{
    protected $id;
    protected $debuttravail;
    protected $fintravail;
    protected $taverne;
    protected $tunnel;


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
     * @param mixed $debuttravail
     */
    public function setDebuttravail($debuttravail)
    {
        $this->debuttravail = $debuttravail;
    }

    /**
     * @param mixed $fintravail
     */
    public function setFintravail($fintravail)
    {
        $this->fintravail = $fintravail;
    }

    /**
     * @param mixed $taverne
     */
    public function setTaverne($taverne)
    {
        $this->taverne = $taverne;
    }

    /**
     * @param mixed $tunnel
     */
    public function setTunnel($tunnel)
    {
        $this->tunnel = $tunnel;
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
    public function getDebuttravail()
    {
        return $this->debuttravail;
    }

    /**
     * @return mixed
     */
    public function getFintravail()
    {
        return $this->fintravail;
    }

    /**
     * @return mixed
     */
    public function getTaverne()
    {
        return $this->taverne;
    }

    /**
     * @return mixed
     */
    public function getTunnel()
    {
        return $this->tunnel;
    }



}