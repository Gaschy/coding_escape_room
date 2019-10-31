<?php

namespace CodingEscapeRoom\Models;

class Session extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="Ses_ID", type="integer", length=11, nullable=false)
     */
    protected $Ses_ID;

    /**
     *
     * @var string
     * @Column(column="Ses_Key", type="string", nullable=false)
     */
    protected $Ses_Key;

    /**
     *
     * @var string
     * @Column(column="Ses_Start", type="string", nullable=false)
     */
    protected $Ses_Start;

    /**
     *
     * @var integer
     * @Column(column="Ses_Progress", type="integer", length=11, nullable=false)
     */
    protected $Ses_Progress;

    /**
     *
     * @var string
     * @Column(column="Ses_Finish", type="string", nullable=true)
     */
    protected $Ses_Finish;

    /**
     * Method to set the value of field Ses_ID
     *
     * @param integer $Ses_ID
     * @return $this
     */
    public function setSesID($Ses_ID)
    {
        $this->Ses_ID = $Ses_ID;

        return $this;
    }

    /**
     * Method to set the value of field Ses_Key
     *
     * @param string $Ses_Key
     * @return $this
     */
    public function setSesKey($Ses_Key)
    {
        $this->Ses_Key = $Ses_Key;

        return $this;
    }

    /**
     * Method to set the value of field Ses_Start
     *
     * @param string $Ses_Start
     * @return $this
     */
    public function setSesStart($Ses_Start)
    {
        $this->Ses_Start = $Ses_Start;

        return $this;
    }

    /**
     * Method to set the value of field Ses_Progress
     *
     * @param integer $Ses_Progress
     * @return $this
     */
    public function setSesProgress($Ses_Progress)
    {
        $this->Ses_Progress = $Ses_Progress;

        return $this;
    }

    /**
     * Method to set the value of field Ses_Finish
     *
     * @param string $Ses_Finish
     * @return $this
     */
    public function setSesFinish($Ses_Finish)
    {
        $this->Ses_Finish = $Ses_Finish;

        return $this;
    }

    /**
     * Returns the value of field Ses_ID
     *
     * @return integer
     */
    public function getSesID()
    {
        return $this->Ses_ID;
    }

    /**
     * Returns the value of field Ses_Key
     *
     * @return string
     */
    public function getSesKey()
    {
        return $this->Ses_Key;
    }

    /**
     * Returns the value of field Ses_Start
     *
     * @return string
     */
    public function getSesStart()
    {
        return $this->Ses_Start;
    }

    /**
     * Returns the value of field Ses_Progress
     *
     * @return integer
     */
    public function getSesProgress()
    {
        return $this->Ses_Progress;
    }

    /**
     * Returns the value of field Ses_Finish
     *
     * @return string
     */
    public function getSesFinish()
    {
        return $this->Ses_Finish;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("session");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'session';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Session[]|Session|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Session|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'Ses_ID' => 'Ses_ID',
            'Ses_Key' => 'Ses_Key',
            'Ses_Start' => 'Ses_Start',
            'Ses_Progress' => 'Ses_Progress',
            'Ses_Finish' => 'Ses_Finish'
        ];
    }

}
