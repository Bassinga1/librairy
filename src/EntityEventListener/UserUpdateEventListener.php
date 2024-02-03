<?php

namespace App\EntityEventListener;

use App\Entity\User;


class UserUpdateEventListener{
        // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encryptSecret;
        // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(string $encriptSecret){
    $this->encryptSecret = $encriptSecret;
}
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function preUpdate(User $user):void{
        // on déclare l'algorithme de cryptage - aide: doctrine-project.org/projects/doctrine-orm/en/2.16/reference/events.html
        $cypher = "aes-256-gcm"; // aide: levelup.gitconnected.com/encryption-in-php-cf3ca98f4287
        $key = $this->encryptSecret;
        // On crée une clé d'encryption spécifique à l'utilisateur
        $iv = base64_decode($user->getSecretIv());
        // On crypte le prénom de l'utilisateur
        if(!is_null($user->getLastname())){
            $lastname = $user->getLastname();
            $lastnameCrypte = openssl_encrypt($lastname, $cypher, $key, 0, $iv, $tag);
            $finalLastnameCrypte = base64_encode($tag.$lastnameCrypte);
            $user->setLastname($finalLastnameCrypte);
        }
        // On crypte le nom de l'utilisateur
        if(!is_null($user->getName())){
            $name = $user->getName();
            $nameCrypte = openssl_encrypt($name, $cypher, $key, 0, $iv, $tag);
            $finalNameCrypte = base64_encode($tag.$nameCrypte);
            $user->setName($finalNameCrypte);
        }

    }

}