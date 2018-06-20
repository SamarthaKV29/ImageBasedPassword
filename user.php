<?php
class User
{
    public $name;
    public $emailid;
    public $password;

    public function __construct($name, $emailid, $password)
    {
        $this->name = $name;
        $this->emailid = $emailid;
        $this->password = $password;
        //echo '<script>console.log("User Created.")</script>';
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->emailid;
    }

}
