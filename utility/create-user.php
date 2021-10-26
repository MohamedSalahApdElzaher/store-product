<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once 'src/entity/User.php';


[$filename, $username, $password] = $argv;

// new object
$user = new User();

// password Encryption
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$user->setUserName($username);
$user->setPassword($hashedpassword);

/** EntityManager $em */
$em = $entityManager;
$em->persist($user); // to deal with that object
$em->flush(); // save to db

echo "created user with id ". $user->getId();
