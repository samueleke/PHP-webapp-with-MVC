<?php

class Group
{
  
    private $csapatNev;
    private $schoolID;


    function __construct($csapatNev,$schoolID)
    {
       $this->csapatNev = $csapatNev;
       $this->schoolID = $schoolID;
    }

    public function getCsapatNev()
    {
        return $this->csapatNev;
    }

    public function getSchoolID()
    {
        return $this->schoolID;
    }


}
