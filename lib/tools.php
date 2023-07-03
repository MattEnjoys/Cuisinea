<?php
// Cette fonction divise une chaîne de caractères en un tableau de lignes
function linesToArray(string $string)
{
    // Scinde une chaine de caractère en segments PHP_EOL pour saut de ligne
    return explode(PHP_EOL, $string);
}

//  Pour prendre en compte tous les caractères spéciaux (des noms données aux images par exemple). Fonction native à PHP
function slugify($text, string $divider = '-')
{
    // Remplace les non-lettres ou les chiffres par un diviseur
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    // Translittérer
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Supprimer les caractères indésirables
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, $divider);
    // Supprimer le diviseur en double
    $text = preg_replace('~-+~', $divider, $text);
    // Minuscule
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}