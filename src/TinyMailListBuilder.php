<?php

namespace PiedWeb\TinyMailListBuilder;

class TinyMailListBuilder
{
    protected $listFolder;
    protected $mailList;

    public function __construct($mailList = [], $listFolder = 'list')
    {
        $this->listFolder = $listFolder;
        $this->mailList = $mailList;
    }

    public function add($email, $list)
    {
        $email = $this->checkEmail($email);
        if ($email) {
            return $this->storeEmail($email, $list);
        }
    }

    protected function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }

        return false;
    }

    protected function storeEmail($email, $list)
    {
        $list = in_array($list, $this->mailList) ? $list : 'default';
        $file = $this->listFolder.'/'.$list.'.txt';
        if (!exec('grep '.escapeshellarg($email).' '.$file)) {
            return file_put_contents($file, $email.PHP_EOL, FILE_APPEND);
        }
    }
}
