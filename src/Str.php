<?php

    namespace KsUtils;

    class Str
    {
        /**
         * Checks if string ends with another string
         * @param string $needle Supposed end
         * @param string $str Tested string
         * @return boolean TRUE if string ends with another string, FALSE
         *              otherwise
         */
        public static function endsWith($needle, $str)
        {
            $end = substr($str, -1*strlen($needle));
            return $end == $needle;
        }

        /**
         * Returns a random string
         * @param int $charsAmount String's length
         * @param string $chars Chars in the random string. Default is a-z,
         *          digits and "_" (underscore)
         * @return string Random string with specified length
         */
        public static function random($charsAmount, $chars = array())
        {
            if(!$chars) {
                $chars = array(
                    'a', 'b', 'c', 'd', 'e',
                    'f', 'g', 'h', 'i', 'j',
                    'k', 'l', 'm', 'n', 'o',
                    'p', 'q', 'r', 's', 't',
                    'u', 'v', 'w', 'x', 'y',
                    'z', '0', '1', '2', '3',
                    '4', '5', '6', '7', '8',
                    '9', '_'
                );
            }

            $str = '';

            for($i=1; $i<=$charsAmount; $i++)
            {
                $str .= $chars[array_rand($chars)];
            }

            return $str;
        }

        /**
         * Returns substring after last occurance of $char. Search is
         * case insensitive
         * @param string $char What to search
         * @param string $str Where to search
         * @return string Resulting string
         */
        static function getSubstrAfterLast($char, $str)
        {
            $pos = strripos($str, $char);
            return $pos ? substr($str, $pos+1) : null;
        }

        /**
         * Replaces cyrillic chars to latin
         * @param string $string Non-latin string
         * @return string Latin string
         */
        static function translit($string) {
            $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',
                'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
                'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',
                'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',
                'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
                'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

                'А' => 'A',   'Б' => 'B',   'В' => 'V',
                'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
                'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',
                'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',
                'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
                'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                'é' => 'e', 'â' => 'a', 'ô' => 'o', 'è' => 'e',
                "'" => '_', 'ë' => 'e', 'à' => 'a',
                'î' => 'i', 'ê' => 'e', 'û' => 'u',
                'ç' => 'c', 'ï' => 'i', 'ü' => 'u',
                '(' => '', ')' => ''
            );
            return strtr($string, $converter);
        }

        /**
         * Returns a slugabized string (for example in url usage)
         * @param string $str Unslugabized string
         * @param string $defaultChar Replacement for wrong chars
         * @return string Slugabized string. Contains only chars: a-z,0-9,-,_
         */
        static function slugabize($str, $defaultChar="") {

            $str = mb_strtolower($str, 'UTF-8');
            $str = self::translit($str);

            /*if(!preg_match('|^[A-Za-z0-9\s_\.-]+$|', $str)) {
                die('Unknown symbol in string: ' . $str);
            }*/

            $str = preg_replace('~[^-a-z0-9_]+~u', $defaultChar, $str);
            return $str;
        }

        /**
         * Encodes variable to a json and russian chars into utf codes
         * @param mixed $data The value being encoded. Can be any type except a resource.
         * @return string String containing the JSON representation of value
         */
        static function json_encode($data)
        {
            $arr_replace_utf = array('\u0410', '\u0430','\u0411','\u0431','\u0412','\u0432',
            '\u0413','\u0433','\u0414','\u0434','\u0415','\u0435','\u0401','\u0451','\u0416',
            '\u0436','\u0417','\u0437','\u0418','\u0438','\u0419','\u0439','\u041a','\u043a',
            '\u041b','\u043b','\u041c','\u043c','\u041d','\u043d','\u041e','\u043e','\u041f',
            '\u043f','\u0420','\u0440','\u0421','\u0441','\u0422','\u0442','\u0423','\u0443',
            '\u0424','\u0444','\u0425','\u0445','\u0426','\u0446','\u0427','\u0447','\u0428',
            '\u0448','\u0429','\u0449','\u042a','\u044a','\u042d','\u044b','\u042c','\u044c',
            '\u042d','\u044d','\u042e','\u044e','\u042f','\u044f');

            $arr_replace_cyr = array('А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е',
            'Ё', 'ё', 'Ж','ж','З','з','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о',
            'П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Ц','ц','Ч','ч','Ш','ш',
            'Щ','щ','Ъ','ъ','Ы','ы','Ь','ь','Э','э','Ю','ю','Я','я');

            $str1 = json_encode($data);
            $str2 = str_replace($arr_replace_utf, $arr_replace_cyr, $str1);
            return $str2;
        }

        /**
         * Use whitespace to format json string
         * @param string $json Unformatted json string
         * @return string Formatted json string
         */
        static function jsonBeautify($json)
        {
            $result      = '';
            $pos         = 0;
            $strLen      = strlen($json);
            $indentStr   = '  ';
            $newLine     = "\n";
            $prevChar    = '';
            $outOfQuotes = true;

            for ($i=0; $i<=$strLen; $i++) {

                // Grab the next character in the string.
                $char = substr($json, $i, 1);

                // Are we inside a quoted string?
                if ($char == '"' && $prevChar != '\\') {
                    $outOfQuotes = !$outOfQuotes;

                // If this character is the end of an element,
                // output a new line and indent the next line.
                } else if(($char == '}' || $char == ']') && $outOfQuotes) {
                    $result .= $newLine;
                    $pos --;
                    for ($j=0; $j<$pos; $j++) {
                        $result .= $indentStr;
                    }
                }

                // Add the character to the result string.
                $result .= $char;

                // If the last character was the beginning of an element,
                // output a new line and indent the next line.
                if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                    $result .= $newLine;
                    if ($char == '{' || $char == '[') {
                        $pos ++;
                    }

                    for ($j = 0; $j < $pos; $j++) {
                        $result .= $indentStr;
                    }
                }

                $prevChar = $char;
            }

            return $result;
        }
    }

?>