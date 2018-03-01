<?php
if (!isset($_COOKIE['gamedata'])) {
    die('Veuillez activer vos cookies pour jouer au pendu.');
} else {
    extract(decode($_COOKIE['gamedata']));//recrée les variables qui ont été encodées dans le cookie en getcontroller
}
$word = getWord($words, $wordIndex);
$triedLetter = $_POST['triedLetter'];
$wordFound = false;

$triedLetters .= $triedLetter;
$letters[$triedLetter] = false;  //modifier dans le tableau le status de la lettre qui vient d'être joué.
$letterFound = false;
$wordLength = strlen($word);
for ($i = 0; $i < $wordLength; $i++) {
    $l = substr($word, $i, 1);
    if ($triedLetter === $l) {
        $letterFound = true;
        $replacementString = substr_replace($replacementString, $l, $i, 1);
    }
}
if (!$letterFound) {
    $trials++;
} else {
    if ($word === $replacementString) {
        $wordFound = true;
    }
}
$remainingTrials = MAX_TRIALS - $trials;

setcookie('gamedata', encode(compact('letters', 'triedLetters', 'wordIndex', 'replacementString', 'trials')));