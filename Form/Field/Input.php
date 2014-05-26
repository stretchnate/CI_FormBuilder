<?php
    /**
     * copyright (C) 2013, 2014 Dustin Nate <stretchnate@gmail.com>
     * This file is part of CI_FormBuilder.
     *
     * CI_FormBuilder is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * CI_FormBuilder is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with CI_FormBuilder.  If not, see <http://www.gnu.org/licenses/>.
     */

    /**
     * generates a single <input type="text"> field for the Form object using the CI form_helper functions
     *
     * @author stretch
     */
    class Form_Field_Input extends Form_Field implements Form_Field_Interface {

        public function __construct() {
            parent::__construct();

            //add additinal attributes pertinent to input fields
            $this->attributes['autocomplete']     = null;
            $this->attributes['form_no_validate'] = null;
            $this->attributes['list']             = null;
            $this->attributes['max']              = null;
            $this->attributes['maxlength']        = null;
            $this->attributes['min']              = null;
            $this->attribtues['minlength']        = null;
            $this->attributes['multiple']         = null;
            $this->attributes['pattern']          = null;
            $this->attributes['placeholder']      = null;
            $this->attributes['readonly']         = null;
            $this->attributes['size']             = null;
            $this->attributes['step']             = null;
            $this->attributes['value']            = null;
        }

        /**
         * Generates the form field
         *
         * @return string
         * @access public
         * @since 1.0
         */
        public function generateField() {
            $this->renderField( form_input( $this->filterAttributes(), '', $this->element_javascript ) );
        }

        //setters
        public function setAutocomplete( $autocomplete ) {
            $this->attributes['autocomplete'] = $autocomplete;
            return $this;
        }

        public function setFormNoValidate( $form_no_validate ) {
            $this->attributes['form_no_validate'] = $form_no_validate;
            return $this;
        }

        /**
         * refers to a datalist element that contains pre-defined options for an input element
         * @param type $datalist
         */
        public function setList( $list ) {
            $this->attributes['list'] = $list;
            return $this;
        }

        public function setMax( $max ) {
            $this->attributes['max'] = $max;
            return $this;
        }

        public function setMaxLength( $maxlength ) {
            $this->attributes['maxlength'] = $maxlength;
            return $this;
        }

        public function setMin( $min ) {
            $this->attributes['min'] = $min;
            return $this;
        }

        public function setMinLength( $min_length ) {
            $this->attributes['minlength'] = $min_length;
            return $this;
        }

        public function setMultiple( $multiple ) {
            $this->attributes['multiple'] = $multiple;
            return $this;
        }

        public function setPattern( $pattern ) {
            $this->attributes['pattern'] = $pattern;
            return $this;
        }

        public function setPlaceholder( $placeholder ) {
            $this->attributes['placeholder'] = $placeholder;
            return $this;
        }

        public function setReadonly( $readonly ) {
            $this->attributes['readonly'] = ($readonly) ? 'readonly' : null;
            return $this;
        }

        public function setSize( $size ) {
            $this->attributes['size'] = $size;
            return $this;
        }

        public function setStep( $step ) {
            $this->attributes['step'] = $step;
            return $this;
        }

        public function setValue( $value ) {
            $this->attributes['value'] = $value;
            return $this;
        }

    }

?>
