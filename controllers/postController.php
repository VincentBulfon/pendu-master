<?php
$wordIndex = inval($_POST['wordIndex']);
$trials =$_POST['trials'];
$triedLetters = $_POST['triedLetters'];
$letters = getUnserializedLetters($_POST['serializedLetters']); //ecrase la tableau de base avec le tableau qui est envoyé lors de chaque envoi en post du formulaire chaque envoi écrase le tableau précédent.
$word = getWord($words,$wordIndex);

$wordFound = false;

$triedLetter = $_POST['triedLetter'];
$replacementString = $_POST['replacementString'];

$triedLetters .= $triedLetter;
$letters[$triedLetter] = false;  //modifier dans le tableau le status de la lettre qui vient d'être joué.
$letterFound =false;
$wordLength = strlen($word);
for ($i = 0; $i < $wordLength; $i++) {
    $l = substr($word, $i, 1);
    if ($triedLetter === $l) {
        $replacementString = substr_replace($replacementString, $l, $i, 1);
    }
}
if(!$letterFound){
    $trials++;
}else{
    if ($word === $replacementString){
        $wordFound = true;
    }
}

$remainingTrials = MAX_TRIALS-$trials;
$serializedLetters = getSerializedLetters($letters);
