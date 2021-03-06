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
    require_once(APPPATH . 'third_party/recaptchalib.php');

    /**
     * Description of Recaptcha
     *
     * @author stretch
     */
    class Form_Field_Recaptcha extends Form_Field implements Form_Field_Interface {

        //@todo move these keys to a config file or the db.
        private static $recaptcha_public_keys  = array(
            'local'      => '6LdbwuoSAAAAAPSqvEWCzUjzF4AV239u4d3_LXn1',
            'test'       => '6LddwuoSAAAAAJ0InljB8jscSUlZGIaPbzLEqBN_',
            'production' => '6LdcwuoSAAAAAILGBIhw37hMBCOyTBNeXvUrIIHI'
        );
        private static $recaptcha_private_keys = array(
            'local'      => '6LdbwuoSAAAAANM-ZAgTGYs0pJZQbXJKLtE1X7nb',
            'test'       => '6LddwuoSAAAAAGBG6Jg6Ll2i8SXtsnVO9OorSI6G',
            'production' => '6LdcwuoSAAAAACHSXwLzlcgMvwSbz7nwjgFZFY8P'
        );

        public function __construct() {
            parent::__construct();
        }

        /**
         * Generates the form field
         *
         * @return string
         * @access public
         * @since 1.0
         */
        public function generateField() {
            $pub_key = self::fetchPublicKey();
            $this->renderField( recaptcha_get_html( $pub_key ) );
        }

        /**
         * validates the recaptcha field
         *
         * @param string $server
         * @param string $challenge_field
         * @param string $response_field
         * @return boolean
         */
        public static function validate( $server, $challenge_field, $response_field ) {
            $private_key = self::fetchPrivateKey();
            $response    = recaptcha_check_answer( $private_key, $server, $challenge_field, $response_field );

            return Utilities::getBoolean( $response->is_valid );
        }

        /**
         * returns the public key for the recaptcha api
         *
         * @return string
         * @since 1.0
         */
        protected static function fetchPublicKey() {
            $url = base_url();

            switch( $url ) {
                case 'http://eventcolumn.local':
                    $key = 'local';
                    break;

                case 'http://eventcolumn.com':
                case 'https://eventcolumn.com':
                    $key = 'production';
                    break;

                case 'http://eventcolumn.stretchnate.com':
                default:
                    $key = 'test';
                    break;
            }

            return self::$recaptcha_public_keys[$key];
        }

        /**
         * returns the private key for the recaptcha api
         *
         * @return string
         * @since 1.0
         */
        protected static function fetchPrivateKey() {
            $url = base_url();

            switch( $url ) {
                case 'http://eventcolumn.local':
                    $key = 'local';
                    break;

                case 'http://eventcolumn.com':
                case 'https://eventcolumn.com':
                    $key = 'production';
                    break;

                case 'http://eventcolumn.stretchnate.com':
                default:
                    $key = 'test';
                    break;
            }

            return self::$recaptcha_private_keys[$key];
        }

    }

?>
