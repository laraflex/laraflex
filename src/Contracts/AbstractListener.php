<?php
namespace laraflex\Contracts;


abstract class AbstractListener{

    abstract protected function listeners();

    abstract static public function create();

    public function dependencies($arrayObjects){
        if (!empty($arrayObjects)){
            $arrayComponents = array();
            foreach ($arrayObjects as $object){
                $arrayComponents[] = $object->component;
            }

            $arrayTmp = array();
            if (!empty($dependencies = $this->listeners())){
                foreach ($dependencies as $key => $item){
                    if (in_array($key, $arrayComponents)){
                        $arrayTmp[] = $item::create()->toObject();
                    }
                }
            }
            return $arrayTmp;
        }else{
            return NULL;
        }
    }

}
