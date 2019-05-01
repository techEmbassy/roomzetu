<?php
/**
 * class.Base32.php5
 * Provide Base32 conversion class
 * 
 * @author Shannon Wynter {@link http://fremnet.net/contact}
 * @version 0.1
 * @copyright Copyright &copy; 2006 Shannon Wynter
 * @link http://fremnet.net
 * 
 * Class to provide base32 encoding/decoding of strings
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * 
 * ChangeLog
 * -----------
 * version 0.1, 2006-06-22, Shannon Wynter {@link http://fremnet.net/contact}
 *  - Initial release
 * 
 * Notes
 * -----------
 * For dealing with humans it's probably best to use csSafe rather then csRFC3548
 * 
 */

/**
 * Class Base32
 * 
 * PHP5 class to provide Base32 conversion
 *
 */
class Base32 {

	/**
	 * csRFC3548
	 * 
	 * The character set as defined by RFC3548
	 * @link http://www.ietf.org/rfc/rfc3548.txt
	 */
	// $csRFC3548 = 'ABCDEFGHIJKLMNOPQRSTUVWXZY234567';

	/**
	 * csSafe
	 * 
	 * This character set is designed to be more human friendly
	 * For example: i, I, L, l and 1 all map to 1
	 * Also: there is no U - to help prevent offencive output
	 * @link http://www.crockford.com/wrmg/base32.html
	 *
	 */
	// $csSafe = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
	
	/**
	 * cs09AV
	 * 
	 * This character set follows the example of the hex
	 * character set and is included to make this class
	 * compatible with MIME::Base32
	 * @link http://search.cpan.org/~danpeder/MIME-Base32-1.01/Base32.pm
	 * 
	 */
	// $cs09AV = '0123456789ABCDEFGHIJKLMNOPQRSTUV';

	// define the Charsets (for PHP4)
	var $cs09AV;
	var $csSafe;
	var $csRFC3548;
	
	/**
	 * _charset
	 * 
	 * Internal holder of the current character set.
	 *
	 * @access protected
	 * @var string
	 */
	var $_charset;

	
	/**
	 * Constructor
	 *
	 * Call to create a new object.
	 * 
	 * @param string $charset (optional) The character set to use
	 * @see setCharset
	 */
	function __construct() {
		$csRFC3548 = 'ABCDEFGHIJKLMNOPQRSTUVWXZY234567';
		$csSafe = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
		$cs09AV = '0123456789ABCDEFGHIJKLMNOPQRSTUV';
		$_charset = $csSafe;
		$this->setCharset($csSafe);
	}
	
	/**
	 * str2bin
	 * 
	 * Converts any ascii string to a binary string
	 *
	 * @param string $str The string you want to convert
	 * @return string String of 0's and 1's
	 */
	 function str2bin($str) {
		$chrs = unpack('C*', $str);
		return vsprintf(str_repeat('%08b', count($chrs)), $chrs);
	}
	
	/**
	 * bin2str
	 * 
	 * Converts a binary string to an ascii string
	 *
	 * @param string $str The string of 0's and 1's you want to convert
	 * @return string The ascii output
	 * @throws Exception
	 */
	 function bin2str($str) {
		if (strlen($str) % 8 > 0)
			echo('Length must be divisible by 8');
		if (!preg_match('/^[01]+$/', $str))
			echo('Only 0\'s and 1\'s are permitted');

		preg_match_all('/.{8}/', $str, $chrs);
		$chrs = array_map(bindec, $chrs[0]);
		// I'm just being slack here
		array_unshift($chrs, 'C*');
		return call_user_func_array('pack', $chrs);
	}
	
	/**
	 * fromBin
	 * 
	 * Converts a correct binary string to base32
	 *
	 * @param string $str The string of 0's and 1's you want to convert
	 * @return string String encoded as base32
	 * @throws exception
	 */
	function fromBin($str) {
		if (strlen($str) % 8 > 0)
			echo('Length must be divisible by 8');
		if (!preg_match('/^[01]+$/', $str))
			echo('Only 0\'s and 1\'s are permitted');

		// Base32 works on the first 5 bits of a byte, so we insert blanks to pad it out
		$str = preg_replace('/(.{5})/', '000$1', $str);

		// We need a string divisible by 5
		$length = strlen($str);
		$rbits = $length & 7;
		
		if ($rbits > 0) {
			// Excessive bits need to be padded
			$ebits = substr($str, $length - $rbits);
			$str = substr($str, 0, $length - $rbits);
			$str .= "000$ebits".str_repeat('0', 5 - strlen($ebits));
		}

		preg_match_all('/.{8}/', $str, $chrs);
		$chrs = array_map(array($this, '_mapcharset'), $chrs[0]);
		return join('', $chrs);
	}


	//if(!function_exists('str_split')){
   function strsplit($string,$split_length=1){
       $count = strlen($string); 
       if($split_length < 1){
           return false; 
       } elseif($split_length > $count){
           return array($string);
       } else {
           $num = (int)ceil($count/$split_length); 
           $ret = array(); 
           for($i=0;$i<$num;$i++){ 
               $ret[] = substr($string,$i*$split_length,$split_length); 
           } 
           return $ret;
       }     
   } 
// }


	/**
	 * toBin
	 * 
	 * Accepts a base32 string and returns an ascii binary string
	 *
	 * @param string $str The base32 string to convert
	 * @return string Ascii binary string
	 */
	function toBin($str) {
		if (!preg_match('/^['.$this->_charset.']+$/', $str))
			echo('Must match character set');

		// Convert the base32 string back to a binary string

		$str = join('',array_map(array($this, '_mapbin'), $this->strsplit($str)));
		// Remove the extra 0's we added
		$str = preg_replace('/000(.{5})/', '$1', $str);
		// Unpad if nessicary
		$length = strlen($str);
		$rbits = $length & 7;
		if ($rbits > 0) 
			$str = substr($str, 0, $length - $rbits);
		
		return $str;
	}

	/**
	 * fromString
	 * 
	 * Convert any string to a base32 string
	 * This should be binary safe...
	 *
	 * @param string $str The string to convert
	 * @return string The converted base32 string
	 */
	function fromString($str) {
		return $this->fromBin($this->str2bin($str));
	}
	
	/**
	 * toString
	 * 
	 * Convert any base32 string to a normal string
	 * This should be binary safe...
	 * 
	 * @param string $str The base32 string to convert
	 * @return string The normal string
	 */
	function toString($str) {
		$str = strtoupper($str);
		
		// csSafe actually has to be able to consider extra characters
		if ($this->_charset == $this->csSafe) {
			$str = str_replace('O','0',$str);
			$str = str_replace(array('I','L'),'1',$str);
		}
		
		return $this->bin2str($this->tobin($str));
	}
	
	/**
	 * _mapcharset
	 * 
	 * Used with array_map to map the bits from a binary string
	 * directly into a base32 character set
	 *
	 * @access private
	 * @param string $str The string of 0's and 1's you want to convert
	 * @return char Resulting base32 character
	 */
	function _mapcharset($str) {
		return $this->_charset[bindec($str)];
	}
	
	/**
	 * _mapbin
	 * 
	 * Used with array_map to map the characters from a base32
	 * character set directly into a binary string
	 *
	 * @access private
	 * @param char $chr The caracter to map
	 * @return str String of 0's and 1's
	 */
	function _mapbin($chr) {
		return sprintf('%08b',strpos($this->_charset,$chr));
	}
	
	/**
	 * setCharset
	 * 
	 * Used to set the internal _charset variable
	 * I've left it so that people can arbirtrarily set their
	 * own charset
	 *
	 * Can be called with:
	 * * Base32::csRFC3548
	 * * Base32::csSafe
	 * * Base32::cs09AV
	 * 
	 * @param string $charset The character set you want to use
	 * @throws Exception
	 */
	function setCharset($charset) {
		if (strlen($charset) == 32) {
			$this->_charset = strtoupper($charset);
		} else {
			//echo('Length must be exactly 32');
			;
		}
	}	
}