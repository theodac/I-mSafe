<?php


class SituationModel
{
    private $id;
    public $type;
    public $is_secure;
    public $nbr_people;
    public $nbr_childs;
    public $nbr_babies;
    public $user_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getIsSecure()
    {
        return $this->is_secure;
    }

    /**
     * @param mixed $is_secure
     */
    public function setIsSecure($is_secure): void
    {
        $this->is_secure = $is_secure;
    }

    /**
     * @return mixed
     */
    public function getNbrPeople()
    {
        return $this->nbr_people;
    }

    /**
     * @param mixed $nbr_people
     */
    public function setNbrPeople($nbr_people): void
    {
        $this->nbr_people = $nbr_people;
    }

    /**
     * @return mixed
     */
    public function getNbrChilds()
    {
        return $this->nbr_childs;
    }

    /**
     * @param mixed $nbr_childs
     */
    public function setNbrChilds($nbr_childs): void
    {
        $this->nbr_childs = $nbr_childs;
    }

    /**
     * @return mixed
     */
    public function getNbrBabies()
    {
        return $this->nbr_babies;
    }

    /**
     * @param mixed $nbr_babies
     */
    public function setNbrBabies($nbr_babies): void
    {
        $this->nbr_babies = $nbr_babies;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }


    public function create($uuid,$type,$nbr_people){
        $db = new Model();
        //$uuid = "1fc2c8e9-77b2-1726-e7f5-84706386fdd0";
        //$type = "Confinement";
        //$nbr_people = 2;
        $queryUser = $db->requetePG("SELECT id from public.users WHERE uuid='$uuid'")->fetch();

        $querySituation = $db->requetePG("INSERT into public.situation(type,is_secure,user_id,nbr_people,nbr_childs,nbr_babies)
                                                VALUES ('$type',null ,'$queryUser[0]','$nbr_people',0,0)");


    }

    public function updateSituation($is_secure,$uuid){
        $db = new Model();
        $queryUser = $db->requetePG("SELECT id from public.users WHERE uuid='$uuid'")->fetch();
        $db->requetePG("UPDATE public.situation SET is_secure='$is_secure' WHERE user_id='$queryUser[0]'");
    }

    public function updateChilds($nbr_childs,$nbr_babies,$uuid){
        $db = new Model();
        $queryUser = $db->requetePG("SELECT id from public.users WHERE uuid='$uuid'")->fetch();
        $db->requetePG("UPDATE public.situation SET nbr_childs='$nbr_childs', nbr_babies='$nbr_babies' WHERE user_id='$queryUser[0]'");
    }



}