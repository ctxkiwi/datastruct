<?php

namespace DataStruct\Field;

class IntegerField extends \DataStruct\Field implements \DataStruct\FieldInterface {

    protected $type = 'integer';

    private $_min = null;
    private $_max = null;

    public function validate($data, &$errors = []): bool {

        if (!is_array($errors)) {
            $errors = [];
        }

        if ($this->isNullable() && $data === null) {
            return true;
        }

        if (!is_int($data)) {
            $errors[] = ['error' => 'incorrect-type', 'message' => 'Incorrect data type'];
            return false;
        }

        if ($this->_min && $data < $this->_min) {
            $errors[] = ['error' => 'integer-min', 'message' => 'Integer field must be larger or equal to ' . $this->_min . ''];
            return false;
        }
        if ($this->_max && $data > $this->_max) {
            $errors[] = ['error' => 'integer-max', 'message' => 'Integer field must be smaller or equal to ' . $this->_max . ''];
            return false;
        }

        return true;
    }

    public function fixData($data) {
        if ($this->validate($data)) {
            return $data;
        }

        return $this->getDefault();
    }

    public function getExample() {
        return 123;
    }

    public function min(int $min) {
        $this->_min = $min;
        return $this;
    }

    public function max(int $max) {
        $this->_max = $max;
        return $this;
    }

}