<?php

class PropertyTest {

    // место хранения перегруженных данных
    private $data = array();
    
    // прешрузка не применяется к объявленным свойствам.
    public $declared = 1;

    // здксь перезагрузка будет использована только при доступе вне класса
    private $hidden = 2;
    public function __set($name, $value)
    {
        echo "Установка '$name' в '$value' <br> ";
        $this->data[$name] = $value; 
    }

    public function __get($name){
        echo "Получение '$name' <br ";
        if(array_key_exists($name, $this->data)){
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Не определенное свойсво в __get():' . $name . 
            ' в файле ' . $trace[0]['file'] . 
            ' на стройке ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    public function __isset($name)
    {
        echo " Установлено ли '$name' <br>";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Уничтожение '$name' ";
        unset($this->data[$name]);
    }
    // не магический метод

    public function getHidden(){
        return $this->hidden;
    }

}
echo '<pre><br>';

$obj = new PropertyTest;

$obj->a = 1;

echo '<br>';
echo $obj->a;
echo '<br>';

echo '<br>';
var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo '<br>';

echo '<br>';
// $echo $obj->declared;
echo '<br>';

echo '<br>';
echo $obj->getHidden();
echo '<br>';
echo $obj->hidden;





