<?php

namespace App\Repository\NoticesTcs;

/**
 * | Interface for Illigal Notice and Know Your TC Status
 */
interface iNoticeTcRepo
{
    public function indexNotice();              // View To Generate Notice
    public function generateNotice($req);       // Generate Notice
    public function knowYourTc();             // Know Your TC
}
