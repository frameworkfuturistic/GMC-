<?php

namespace App\Repository\NoticesTcs;

use App\Models\TcDetail;
use App\Repository\NoticesTcs\iNoticeTcRepo;
use App\Traits\AppHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

/**
 * | Repository for the Illigal Notice Generation Cruds and Know Your Tcs Status
 */

class NoticeTcRepo implements iNoticeTcRepo
{
    use AppHelper;
    public function __construct($roleId)
    {
        $this->menuApp($roleId);
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }

    /**
     * | View Index for the Notice Generation
     */
    public function indexNotice()
    {
        return view('admin.Notice.illigal-notice', $this->array);
    }

    /**
     * | Generate Notice
     */
    public function generateNotice($req)
    {
        try {
            $data = $req->all();
            return view('admin.Notice.pdf-notice', ['data' => $data]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * | Know Your TC Details
     */
    public function knowYourTc()
    {
        $tcDetail = new TcDetail();
        $details = $tcDetail->get();
        return view('admin.view-tcs', ['tcs' => $details], $this->array);
    }
}
