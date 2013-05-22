<?php

/**
 * Catch-a spammer with a CAPTCHA.
 *
 * @package catcha
 * @version 0.1.0-dev
 * @author J.M. <me@mynetx.net>
 * @copyright 2013 J.M. <me@mynetx.net>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Main Catcha class
 *
 * @package catcha
 */

class Catcha
{
    /**
     * Font file to use for challenge image
     *
     * @access protected
     */
    protected $_imageFont;

    /**
     * Height of the challenge image canvas
     *
     * @access protected
     */
    protected $_imageHeight;

    /**
     * Width of the challenge image canvas
     *
     * @access protected
     */
    protected $_imageWidth;

    /**
     * Class constructor
     *
     * @param void
     *
     * @return void
     */
    public function __construct()
    {
        // initialize member variables
        $this->setImageSize(100, 25);
        $this->setImageFont(dirname(__FILE__) . '/font/Averia-Light.ttf');

        // generate the challenge data
        $this->newChallenge();
    }

    /**
     * Set the canvas size of the challenge image
     *
     * @param int $width  The image width (>= 30px)
     * @param int $height The image height (>= 10px)
     *
     * @return void
     */
    public function setImageSize($width, $height)
    {
        // validate
        $width = intval($width);
        $height = intval($height);
        if ($width < 30 || $height < 10) {
            throw new Exception('setImageSize: invalid parameters');
        }

        // store given values
        $this->_imageWidth = $width;
        $this->_imageHeight = $height;
    }

    /**
     * Set the font file to be used for drawing the challenge characters
     *
     * @param string $font_file The full path to font file (*.ttf)
     *
     * @return void
     */
    public function setImageFont($font_file)
    {
        // validate
        if (! @file_exists($font_file)
            || ! @is_readable($font_file)
        ) {
            throw new Exception('setImageFont: invalid parameters');
        }

        // store given value
        $this->_imageFont = $font_file;
    }

    /**
     * Generate new challenge equation
     * Called implicitly in constructor
     *
     * @param void
     * @return void
     */
    public function newChallenge()
    {

    }
}

?>
