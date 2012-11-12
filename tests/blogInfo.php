<?php

/* "THE BEER-WARE LICENSE" (Revision 42):
 * Jaap Broekhuizen <jaapz.b@gmail.com> wrote this file. As long as you retain 
 * this notice you can do whatever you want with this stuff. If we meet some 
 * day, and you think this stuff is worth it, you can buy me a beer in return.
 */

require_once '../src/Tumblr.php';

$tumblr = new Tumblr();
$tumblr->setApiKey('pYiJYdRAFJHgQl7ekaVirCiYg8IRiVOp5ONDZ2PziJFXmVEwhv');

$blogInfo = $tumblr->blogInfo('jaapz.tumblr.com');

var_dump($blogInfo);
