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
     * generates a single <textarea> field for the Form object using the CI form_helper functions
     *
     * @author stretch
     */
    class Form_Field_Input_Textarea extends Form_Field_Input implements Form_Field_Interface {

        public function __construct() {
            parent::__construct();

            //modify attributes array to fit textarea better
            $this->attributes['rows'] = '20';
            $this->attributes['cols'] = '35';
            $this->attributes['wrap'] = null;
        }

        /**
         * Generates the form field
         *
         * @return string
         * @access public
         * @since 1.0
         */
        public function generateField() {
            $this->renderField( form_textarea( $this->filterAttributes(), '', $this->element_javascript ) );
        }

        /**
         * sets the rows attribtue. default is 20
         *
         * @param type $rows
         * @return \Field_Input_Textarea
         */
        public function setRows( $rows ) {
            $this->attributes['rows'] = $rows;
            return $this;
        }

        /**
         * sets the cols attribute. default is 35
         *
         * @param type $cols
         * @return \Field_Input_Textarea
         */
        public function setCols( $cols ) {
            $this->attributes['cols'] = $cols;
            return $this;
        }

        /**
         * set the textarea wrap attribute, accepts 'hard' or 'soft' as values
         *
         * @param  String $wrap
         * @throws UnexpectedValueException
         * @return \Field_Input_Textarea
         */
        public function setWrap( $wrap ) {
            $wrap = trim( $wrap );
            if( $wrap == 'hard' || $wrap == 'soft' ) {
                $this->attributes['wrap'] = $wrap;
            } else {
                throw new UnexpectedValueException( "invalid wrap value <!--Textarea::setWrap()-->" );
            }

            return $this;
        }

    }

?>
