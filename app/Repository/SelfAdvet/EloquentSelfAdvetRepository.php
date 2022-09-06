<?php

namespace App\Repository\SelfAdvet;

use App\Models\Param;
use App\Models\ParamString;
use App\Models\SelfAdvertisements;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use App\Traits\AppHelper as TraitAppHelper;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use DataTables;

class EloquentSelfAdvetRepository implements SelfAdvetRepository
{

    use TraitAppHelper;

    public function __construct()
    {
        $this->menuApp();
    }

    /* this function is for the user interface who will fillup the form */
    public function SelfAdvetView()
    {
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $data = array('wards' => $ward, 'InstallLocations' => $InstallLocation, 'DisplayTypes' => $DisplayType);
        return View::make('user.selfAdvet')->with($data);
    }

    /*this function is for the user saving data in database  */
    public function saveFiles(Request $request)
    {
        $data = new SelfAdvertisements();
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '1')->first();

        $data->RenewalID = $newID->getNewRenewalID('SF');

        $data->LicenseYear = $request->LicenseYear;
        $data->Applicant = $request->Applicant;
        $data->Father = $request->Father;
        $data->Email = $request->Email;
        $data->ResidenceAddress = $request->ResidenceAddress;
        $data->WardNo = $request->WardNo;
        $data->PermanentAddress = $request->PermanentAddress;
        $data->WardNo1 = $request->WardNo1;
        $data->MobileNo = $request->MobileNo;
        $data->AadharNo = $request->AadharNo;
        $data->EntityName = $request->EntityName;
        $data->EntityAddress = $request->EntityAddress;
        $data->InstallLocation = $request->InstallLocation;
        $data->BrandDisplay = $request->BrandDisplay;
        $data->HoldingNo = $request->HoldingNo;
        $data->TradeLicense = $request->TradeLicense;
        $data->GSTNo = $request->GSTNo;
        $data->DisplayType = $request->DisplayType;
        $data->DisplayArea = $request->DisplayArea;
        $data->Longitude = $request->Longitude;
        $data->Latitude = $request->Latitude;

        $data->CurrentUser = $workflowInitiator->Initiator;
        $data->Initiator = $workflowInitiator->Initiator;

        // upload image
        // AadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $AadharPathName = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $AadharPathName);
            $data->AadharPath = 'UploadFiles/' . $AadharPathName;
        }
        // Municipal Trade Files
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $data->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // GPS Photo
        $GPSPhotoPath = $request->GPSPhotoPath;
        if ($GPSPhotoPath) {
            $GPSPhotoPathName = time() . '.' . $GPSPhotoPath->getClientOriginalName();
            $request->GPSPhotoPath->move('UploadFiles', $GPSPhotoPathName);
            $data->GPSPhotoPath = 'UploadFiles/' . $GPSPhotoPathName;
        }
        // Holding No
        $HoldingNoPath = $request->HoldingNoPath;
        if ($HoldingNoPath) {
            $HoldingNoPathName = time() . '.' . $HoldingNoPath->getClientOriginalName();
            $request->HoldingNoPath->move('UploadFiles', $HoldingNoPathName);
            $data->HoldingNoPath = 'UploadFiles/' . $HoldingNoPathName;
        }
        // GST No
        $GSTPath = $request->GSTPath;
        if ($GSTPath) {
            $GSTPathName = time() . '.' . $GSTPath->getClientOriginalName();
            $request->GSTPath->move('UploadFiles', $GSTPathName);
            $data->GSTPath = 'UploadFiles/' . $GSTPathName;
        }
        // Proceeeding 1
        $Proceeding1Photo = $request->Proceeding1Photo;
        if ($Proceeding1Photo) {
            $Proceeding1PhotoName = time() . '.' . $Proceeding1Photo->getClientOriginalName();
            $request->Proceeding1Photo->move('UploadFiles', $Proceeding1PhotoName);
            $data->Proceeding1Photo = 'UploadFiles/' . $Proceeding1PhotoName;
        }
        // Proceeding2
        $Proceeding2Photo = $request->Proceeding2Photo;
        if ($Proceeding2Photo) {
            $Proceeding2PhotoName = time() . '.' . $Proceeding2Photo->getClientOriginalName();
            $request->Proceeding2Photo->move('UploadFiles', $Proceeding2PhotoName);
            $data->Proceeding2Photo = 'UploadFiles/' . $Proceeding2PhotoName;
        }
        // Proceeding3
        $Proceeding3Photo = $request->Proceeding3Photo;
        if ($Proceeding3Photo) {
            $Proceeding3PhotoName = time() . '.' . $Proceeding3Photo->getClientOriginalName();
            $request->Proceeding3Photo->move('UploadFiles', $Proceeding3PhotoName);
            $data->Proceeding3Photo = 'UploadFiles/' . $Proceeding3PhotoName;
        }
        // Extra1
        $ExtraDoc1 = $request->ExtraDoc1;
        if ($ExtraDoc1) {
            $ExtraDoc1Name = time() . '.' . $ExtraDoc1->getClientOriginalName();
            $request->ExtraDoc1->move('UploadFiles', $ExtraDoc1Name);
            $data->extraDoc1 = 'UploadFiles/' . $ExtraDoc1Name;
        }
        // Extra2
        $ExtraDoc2 = $request->ExtraDoc2;
        if ($ExtraDoc2) {
            $ExtraDoc2Name = time() . '.' . $ExtraDoc2->getClientOriginalName();
            $request->ExtraDoc2->move('UploadFiles', $ExtraDoc2Name);
            $data->extraDoc2 = 'UploadFiles/' . $ExtraDoc2Name;
        }

        $data->save();
        return back()->with('message', 'Successfully Saved');
    }

    /* this function is for the the admin initiator updating data */
    public function updateFiles(Request $request)
    {
        $data = SelfAdvertisements::find($request->id);
        $data->LicenseYear = $request->LicenseYear;
        $data->OldRegistrationNo = $request->OldRegistrationNo;
        $data->Applicant = $request->Applicant;
        $data->Father = $request->Father;
        $data->Email = $request->Email;
        $data->ResidenceAddress = $request->ResidenceAddress;
        $data->WardNo = $request->WardNo;
        $data->PermanentAddress = $request->PermanentAddress;
        $data->WardNo1 = $request->WardNo1;
        $data->MobileNo = $request->MobileNo;
        $data->AadharNo = $request->AadharNo;
        $data->EntityName = $request->EntityName;
        $data->EntityAddress = $request->EntityAddress;

        $data->InstallLocation = $request->InstallLocation;

        $data->BrandDisplay = $request->BrandDisplay;
        $data->HoldingNo = $request->HoldingNo;
        $data->TradeLicense = $request->TradeLicense;
        $data->GSTNo = $request->GSTNo;
        $data->DisplayType = $request->DisplayType;
        $data->DisplayArea = $request->DisplayArea;
        $data->Longitude = $request->Longitude;
        $data->Latitude = $request->Latitude;

        $data->Amount = $request->amount;
        $data->GST = $request->GST;
        $data->NetAmount = $request->total;

        // upload image
        // AadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $AadharPathName = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $AadharPathName);
            $data->AadharPath = 'UploadFiles/' . $AadharPathName;
        }
        // Municipal Trade Files
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $data->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // GPS Photo
        $GPSPhotoPath = $request->GPSPhotoPath;
        if ($GPSPhotoPath) {
            $GPSPhotoPathName = time() . '.' . $GPSPhotoPath->getClientOriginalName();
            $request->GPSPhotoPath->move('UploadFiles', $GPSPhotoPathName);
            $data->GPSPhotoPath = 'UploadFiles/' . $GPSPhotoPathName;
        }
        // Holding No
        $HoldingNoPath = $request->HoldingNoPath;
        if ($HoldingNoPath) {
            $HoldingNoPathName = time() . '.' . $HoldingNoPath->getClientOriginalName();
            $request->HoldingNoPath->move('UploadFiles', $HoldingNoPathName);
            $data->HoldingNoPath = 'UploadFiles/' . $HoldingNoPathName;
        }
        // GST No
        $GSTPath = $request->GSTPath;
        if ($GSTPath) {
            $GSTPathName = time() . '.' . $GSTPath->getClientOriginalName();
            $request->GSTPath->move('UploadFiles', $GSTPathName);
            $data->GSTPath = 'UploadFiles/' . $GSTPathName;
        }
        // Proceeeding 1
        $Proceeding1Photo = $request->Proceeding1Photo;
        if ($Proceeding1Photo) {
            $Proceeding1PhotoName = time() . '.' . $Proceeding1Photo->getClientOriginalName();
            $request->Proceeding1Photo->move('UploadFiles', $Proceeding1PhotoName);
            $data->Proceeding1Photo = 'UploadFiles/' . $Proceeding1PhotoName;
        }
        // Proceeding2
        $Proceeding2Photo = $request->Proceeding2Photo;
        if ($Proceeding2Photo) {
            $Proceeding2PhotoName = time() . '.' . $Proceeding2Photo->getClientOriginalName();
            $request->Proceeding2Photo->move('UploadFiles', $Proceeding2PhotoName);
            $data->Proceeding2Photo = 'UploadFiles/' . $Proceeding2PhotoName;
        }
        // Proceeding3
        $Proceeding3Photo = $request->Proceeding3Photo;
        if ($Proceeding3Photo) {
            $Proceeding3PhotoName = time() . '.' . $Proceeding3Photo->getClientOriginalName();
            $request->Proceeding3Photo->move('UploadFiles', $Proceeding3PhotoName);
            $data->Proceeding3Photo = 'UploadFiles/' . $Proceeding3PhotoName;
        }
        // Extra1
        $ExtraDoc1 = $request->ExtraDoc1;
        if ($ExtraDoc1) {
            $ExtraDoc1Name = time() . '.' . $ExtraDoc1->getClientOriginalName();
            $request->ExtraDoc1->move('UploadFiles', $ExtraDoc1Name);
            $data->extraDoc1 = 'UploadFiles/' . $ExtraDoc1Name;
        }
        // Extra2
        $ExtraDoc2 = $request->ExtraDoc2;
        if ($ExtraDoc2) {
            $ExtraDoc2Name = time() . '.' . $ExtraDoc2->getClientOriginalName();
            $request->ExtraDoc2->move('UploadFiles', $ExtraDoc2Name);
            $data->extraDoc2 = 'UploadFiles/' . $ExtraDoc2Name;
        }

        $data->save();
        return back()->with('message', 'Successfully Updated');
    }

    /* This function is for the admin Inbox*/
    public function SelfAdvetInboxView()
    {
        $name = Auth::user()->name;
        $data = SelfAdvertisements::where('CurrentUser', $name)->get();
        $array = [
            'SelfAds' => $data,
            'parents' => $this->parent,
            'childs' => $this->child,
        ];
        return view('admin.SelfAdv.advetInbox')->with($array);
    }
    // WORKFLOW
    public function AddSelfAdvetInboxWorkflow(Request $request)
    {
        $data = SelfAdvertisements::find($request->id);

        $workflowID = Workflow::where('WorkflowName', 'SelfAdvertisement')->get();
        if ($request->forward) {
            $data->CurrentUser = $request->forward;
        }
        if ($request->AppStatus) {
            $data->ApplicationStatus = $request->AppStatus;
        }
        /*udpate status */
        if ($request->UpdateStatus == 'Approved') {
            $data->Approved = '-1';
            $data->Pending = '0';
            $data->Rejected = '0';
        }

        if ($request->UpdateStatus == 'Pending') {
            $data->Pending = '-1';
            $data->Approved = '0';
            $data->Rejected = '0';
        }

        if ($request->UpdateStatus == 'Rejected') {
            $data->Rejected = '-1';
            $data->Approved = '0';
            $data->Pending = '0';
        }
        /*update status*/
        $data->save();
    }
    // WORKFLOW

    // Comment Section
    // comment on WorkflowTrack
    public function workflowTrack(Request $request)
    {
        $comment = new WorkflowTrack();
        $name = Auth::user()->name;
        $comment->RenewalID = $request->RenewalID;
        $comment->TrackDate = new DateTime();
        $comment->UserID = $name;
        $comment->Remarks = $request->comments;
        $comment->save();
    }
    // Comment on workflowTrack

    //function for admin Outbox
    public function SelfAdvetOutboxView(Request $request)
    {
        $name = Auth::user()->name;

        if ($request->ajax()) {
            $data = SelfAdvertisements::where('CurrentUser', '<>', $name)
                ->orderByDesc('id')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateadvetOutbox/" . $row['id'];
                    $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                                <i class='icon-pen'></i> Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.SelfAdv.advetOutbox', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    // this function is fetching data of individual applicants
    public function updateSelfAdvetInboxView($id)
    {
        $data = SelfAdvertisements::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '1')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '1')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("self_advertisements", "self_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('self_advertisements.id', $id)
            ->get();
        $array = array(
            'SelfAds' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return View::make('admin.SelfAdv.updateadvetInbox')->with($array);
    }

    public function updateSelfAdvetOutboxView($id)
    {
        $data = SelfAdvertisements::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '1')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '1')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("self_advertisements", "self_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('self_advertisements.id', $id)
            ->get();
        $array = array(
            'SelfAds' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );

        return view('admin.SelfAdv.updateadvetOutbox')->with($array);
    }

    // Payment
    public function paymentDash()
    {
        $data = SelfAdvertisements::all();
        return view('admin.SelfAdv.advetPayment', [
            'SelfAds' => $data, 'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function paymentDetailsView($id)
    {
        $data = SelfAdvertisements::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("self_advertisements", "self_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('self_advertisements.id', $id)
            ->get();
        $array = array(
            'SelfAds' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return View::make('admin.SelfAdv.updateadvetPayment')->with($array);
    }
    // Payment

    // Approved
    public function advetApprovedView()
    {
        $data = SelfAdvertisements::where('Approved', '-1')->get();
        return view('admin.SelfAdv.advetApproved', [
            'SelfAds' => $data, 'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateAdvetApprovedView($id)
    {
        $data = SelfAdvertisements::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '1')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '1')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("self_advertisements", "self_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('self_advertisements.id', $id)
            ->get();
        $array = array(
            'SelfAds' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return view('admin.SelfAdv.updateadvetApproved')->with($array);
    }
    // Approved

    // Rejected
    public function advetRejectedView()
    {
        $data = SelfAdvertisements::where('Rejected', '-1')->get();
        return view('admin.SelfAdv.advetRejected', [
            'SelfAds' => $data, 'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateAdvetRejectedView($id)
    {
        $data = SelfAdvertisements::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("self_advertisements", "self_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('self_advertisements.id', $id)
            ->get();
        $array = array(
            'SelfAds' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return view('admin.SelfAdv.updateadvetRejected')->with($array);
    }
    // Rejected

    // Payment
    public function paymentUpdate(Request $request)
    {
        dd($request->all());
    }
    // Payment

    // function used for the modifing data on workflow of selfAdvertisement
    // function used for the modifing data on workflow of selfAdvertisement
}
