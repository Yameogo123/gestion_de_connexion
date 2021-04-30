<?php

function est_vide(string $val):bool{
    return empty($val);
}

function est_string(string $val):bool{
    return is_string($val);
}

function valide_info(string $val, array &$array, string $key, string $message="champ obligatoire"):void{
    if(empty($val)){
        $array[$key]=$message;
    }else{
        if(!is_string($val)){
            $array[$key]="Vous devez saisir une info valide";
        }
    }
}

function valide_pass2(string $val, string $val2,array &$array, string $key, string $message="champ obligatoire"):void{
    if(empty($val)){
        $array[$key]=$message;
    }else{
        if($val!=$val2){
            $array[$key]="Mot de passe non correspondant";
        }
    }
}

function valide_login(string $login, array &$array,string $key, string $message="champ obligatoire"):void{
    if(empty($login)){
        $array[$key]=$message;
    }else{
        if (!filter_var($login,FILTER_VALIDATE_EMAIL)){
            $array[$key]="Vous devez saisir un login valide";
        }
    }
}

function form_valide(array $array):bool{
    return count($array)==0;
}