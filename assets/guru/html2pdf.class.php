<?php
/**
* Constructeur
*
* @param string $sens - orientasinya : landscape atau portrait
* @param string $format - format kertasnya : A4, A5, dan lain-lain
* @param string $langue - Bahasanya : en, fr, dan lain-lain
* @param boolean $unicode - TRUE means clustering the input text IS unicode (default = true)
* @param String $encoding - charset encoding; Default is UTF-8
* @param array $marges - margins by default, in order (left, top, right, bottom)
* @return null
*/
public function __construct($sens = 'P', $format = 'A4', $langue='en', $unicode=true, $encoding='UTF-8', $marges = array(5, 5, 5, 8));
}