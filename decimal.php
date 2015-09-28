<?php

class DecimalField extends InputField {

    public $places = 2;

    public function validate() {
        return is_numeric(preg_replace('/[^0-9]/', '', $this->value));
    }

    public function result() {
        return $this->format(get($this->name()));
    }

    public function value() {
        return $this->format($this->value);
    }

    public function format($value) {
        if ($this->validate() === false) {
            return $value;
        }

        // Accept commas as well as a decimal separator
        $value = str_replace(',', '.', $value);

        // Interpret decimal position
        $position = strrpos($value, '.');

        if ($position !== false) {
            // String before and after decimal separator
            $before = substr($value, 0, $position);
            $after  = substr($value, $position);
            $value  = preg_replace('/[^0-9]/', '', $before) . $after;
        }

        $filtered = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        return number_format($filtered, $this->places, '.', '');
    }

}