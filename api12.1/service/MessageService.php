<?php

class MessageService
{
    private $errors;
    private $input_errors;
    private $infos;

    public function __construct()
    {
        $this->errors=$_SESSION["errors"] ?? [];
        $this->infos=$_SESSION["infos"] ?? [];
        $this->input_errors=$_SESSION["input_errors"] ?? [];

        $_SESSION["errors"]=[];
        $_SESSION["infos"]=[];
        $_SESSION["input_errors"]=[];
    }

    public function CountErrors()
    {
        return count($this->errors);
    }

    public function CountInputErrors()
    {
        return count($this->input_errors);
    }

    public function CountInfos()
    {
        return count($this->infos);
    }

    public function CountNewErrors()
    {
        if (key_exists("errors",$_SESSION))return count($_SESSION["errors"]);
        else return 0;
    }

    public function CountNewInputErrors()
    {
        if (key_exists("input_errors",$_SESSION)) return count($_SESSION["input_errors"]);
        else return 0;

    }

    public function CountNewInfos()
    {
        if (key_exists("infos",$_SESSION)) return count($_SESSION["infos"]);
        else return 0;
    }

    /**
     * @return mixed
     */
    public function getInputErrors()
    {
        return $this->input_errors;
    }

    public function AddMessage($type,$msg,$key=null)
    {
        if ($key) $_SESSION[$type][$key]=$msg;
        else $_SESSION[$type][]=$msg;
    }

    public function ShowErrors()
    {
        foreach ($this->errors as $value)
        {
            print "<div class='error'>$value</div>";
        }
    }

    public function ShowInfos()
    {
        foreach ($this->infos as $value)
        {
            print "<div class='msgs'>$value</div>";
        }
    }
}