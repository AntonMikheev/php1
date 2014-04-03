<html>
    <head>
        <script type="text/javascript" src="javascript/jquery-2.1.0.js"></script>
    </head>
<body>
<?php

abstract class User {

    protected $privilegies;

    function __construct() {
        echo "321" ;
    }

    public function setPrivilegies($privilegies) {
        $this->privilegies = $privilegies;
    }

    public function getPrivilegies() {
        return $this->privilegies;
    }

}

class Usual extends User {

    function __construct() {
        $this->privilegies = "User";
        echo __CLASS__;
    }

}

class Master extends User {

    function __construct() {
        $this->privilegies = "Master";
        echo __CLASS__;
    }

}

class Admin extends User {

    function __construct() {
        $this->privilegies = "Admin1";
        echo "777";
    }

    public function getPrivilegies() {
        return $this->privilegies . 'This account has all privilegies';
    }

}

class Authorization {

    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    function getRule() {
        switch ($this->getId()) {
            case 1:
                $u = new Master;
                return $u;
                break;
            case 2:
                $u = new Usual;
                return $u;
                break;
            case 3:
                $u = new Admin;
                return $u;
                break;
            default :
                return NULL;
        }
    }

}

$author = new Authorization(rand(1, 3));
if ($author->getRule() !== NULL) {
    echo "11User online : " . $author->getRule()->getPrivilegies() . "<br>";
} else {
    echo "Not exist";
}
?>
</body>
</html>