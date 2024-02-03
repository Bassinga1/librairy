<?php

namespace App\EntityEventListener;

use App\Entity\User;

class UserLoadEventListener
{
        // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encryptSecret;
        // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(string $encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;
    }
        // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function postLoad(User $user):void {
        $key = $this->encryptSecret;
        $cypher = "aes-256-gcm";
        // On crée une clé d'encryption spécifique à l'utilisateur
        $iv = base64_decode($user->getSecretIv());
        // on décrypte ce qui a été crypté
        if(!is_null($user->getLastname())){
            $datas = base64_decode($user->getLastname());
            // On récupère le tag qui a servi à crypter
            $tag = substr($datas, 16);
            $lastnameCrypte = substr($datas, 0, 16);
            // On décrypte
            $lastname = openssl_decrypt($lastnameCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setLastname($lastname);
        }
        if(!is_null($user->getName())){
            $datas = base64_decode($user->getName());
            // On récupère le tag qui a servi à crypter
            $tag = substr($datas, 16);
            $nameCrypte = substr($datas, 0, 16);
            // On décrypte
            $name = openssl_decrypt($nameCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setName($name);
        }
    }
}