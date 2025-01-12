<?php

namespace App\Repository\PrivateLand;

use App\Models\Param;
use App\Models\ParamString;
use App\Models\PrivateLand;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use App\Traits\AppHelper as TraitAppHelper;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class EloquentPrivateLandRepository implements PrivateLandRepository
{

    use TraitAppHelper;

    public function __construct($roleID)
    {
        $this->menuApp($roleID);
    }

    public function view()
    {
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $data = array('wards' => $ward, 'InstallLocations' => $InstallLocation, 'DisplayTypes' => $DisplayType);
        return View::make('user.land')->with($data);
    }

    // saving files of users details
    public function SavePrivateLand(Request $request)
    {
        $land = new PrivateLand();
        $newID = new Param();

        $workflowInitiator = Workflow::where('WorkflowID', '3')->first();

        $land->RenewalID = $newID->getNewRenewalID('PL');

        $land->applicant = $request->applicant;
        $land->father = $request->father;
        $land->email = $request->email;
        $land->ResidenceAddress = $request->ResidenceAddress;
        $land->WardNo = $request->WardNo;
        $land->PermanentAddress = $request->PermanentAddress;
        $land->WardNo1 = $request->WardNo1;
        $land->MobileNo = $request->MobileNo;
        $land->AadharNo = $request->AadharNo;
        $land->LicenseFrom = $request->LicenseFrom;
        $land->LicenseTo = $request->LicenseTo;
        $land->HoldingNo = $request->HoldingNo;
        $land->TradeLicenseNo = $request->TradeLicenseNo;
        $land->GSTNo = $request->GSTNo;
        $land->EntityName = $request->EntityName;
        $land->EntityAddress = $request->EntityAddress;
        $land->BrandDisplayName = $request->BrandDisplayName;
        $land->BrandDisplayAddress = $request->BrandDisplayAddress;
        $land->EntityWardNo = $request->EntityWardNo;
        $land->DisplayArea = $request->DisplayArea;
        $land->DisplayType = $request->DisplayType;
        $land->NoOfHoarding = $request->NoOfHoarding;
        $land->Longitude = $request->Longitude;
        $land->Latitude = $request->Latitude;
        $land->InstallationLocation = $request->InstallationLocation;

        $land->CurrentUser = $workflowInitiator->Initiator;
        $land->Initiator = $workflowInitiator->Initiator;

        // upload
        // UploadAadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $name = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $name);
            $land->AadharPath = 'UploadFiles/' . $name;
        }
        // UploadAadharPath
        // Upload Trade LicensePath
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $land->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // upload Trade License
        // upload gps photo
        $GPSPhotoPath = $request->GPSPhotoPath;
        if ($GPSPhotoPath) {
            $GPSPhotoPathName = time() . '.' . $GPSPhotoPath->getClientOriginalName();
            $request->GPSPhotoPath->move('UploadFiles', $GPSPhotoPathName);
            $land->GPSPhotoPath = 'UploadFiles/' . $GPSPhotoPathName;
        }
        // upload GPS Photo
        // HoldingNoPath
        $HoldingNoPath = $request->HoldingNoPath;
        if ($HoldingNoPath) {
            $HoldingNoPathName = time() . '.' . $HoldingNoPath->getClientOriginalName();
            $request->HoldingNoPath->move('UploadFiles', $HoldingNoPathName);
            $land->HoldingNoPath = 'UploadFiles/' . $HoldingNoPathName;
        }
        // HoldingNoPath
        // GST No
        $GSTNoPath = $request->GSTNoPath;
        if ($GSTNoPath) {
            $GSTNoPathName = time() . '.' . $GSTNoPath->getClientOriginalName();
            $request->GSTNoPath->move('UploadFiles', $GSTNoPathName);
            $land->GSTNoPath = 'UploadFiles/' . $GSTNoPathName;
        }
        // GSTNo
        // BrandDisplay Path
        $BrandDisplayPath = $request->BrandDisplayPath;
        if ($BrandDisplayPath) {
            $BrandDisplayPathName = time() . '.' . $BrandDisplayPath->getClientOriginalName();
            $request->BrandDisplayPath->move('UploadFiles', $BrandDisplayPathName);
            $land->BrandDisplayPath = 'UploadFiles/' . $BrandDisplayPathName;
        }
        // BrandDisplay Path
        // upload
        $land->save();
        return back()->with('message', 'Successfully Saved');
    }
    // saving files of users details

    // Private Land Inbox View
    public function PrivateLandAdvetInboxView()
    {
        $name = Auth::user()->name;
        $data = PrivateLand::where('CurrentUser', $name)->get();
        $array = array(
            'lands' => $data,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return View::make('admin.PrivateLand.LandInbox')->with($array);
    }

    public function LandInboxUpdate($id)
    {
        $data = PrivateLand::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '3')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '3')
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
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();

        $array = array(
            'land' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child,
        );
        return View::make('admin.PrivateLand.updateLandInbox')->with($array);
    }

    public function UpdatePrivateLand(Request $request)
    {
        //dd($request->all());
        $land = PrivateLand::find($request->id);
        $land->applicant = $request->applicant;
        $land->father = $request->father;
        $land->email = $request->email;
        $land->ResidenceAddress = $request->ResidenceAddress;
        $land->WardNo = $request->WardNo;
        $land->PermanentAddress = $request->PermanentAddress;
        $land->WardNo1 = $request->WardNo1;
        $land->MobileNo = $request->MobileNo;
        $land->AadharNo = $request->AadharNo;
        $land->LicenseFrom = $request->LicenseFrom;
        $land->LicenseTo = $request->LicenseTo;
        $land->HoldingNo = $request->HoldingNo;
        $land->TradeLicenseNo = $request->TradeLicenseNo;
        $land->GSTNo = $request->GSTNo;
        $land->EntityName = $request->EntityName;
        $land->EntityAddress = $request->EntityAddress;
        $land->BrandDisplayName = $request->BrandDisplayName;
        $land->BrandDisplayAddress = $request->BrandDisplayAddress;
        $land->EntityWardNo = $request->EntityWardNo;
        $land->DisplayArea = $request->DisplayArea;
        $land->DisplayType = $request->DisplayType;
        $land->NoOfHoarding = $request->NoOfHoarding;
        $land->Longitude = $request->Longitude;
        $land->Latitude = $request->Latitude;
        $land->InstallationLocation = $request->InstallationLocation;

        // Upload Files
        // UploadAadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $name = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $name);
            $land->AadharPath = 'UploadFiles/' . $name;
        }
        // UploadAadharPath
        // Upload Trade LicensePath
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $land->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // upload Trade License
        // upload gps photo
        $GPSPhotoPath = $request->GPSPhotoPath;
        if ($GPSPhotoPath) {
            $GPSPhotoPathName = time() . '.' . $GPSPhotoPath->getClientOriginalName();
            $request->GPSPhotoPath->move('UploadFiles', $GPSPhotoPathName);
            $land->GPSPhotoPath = 'UploadFiles/' . $GPSPhotoPathName;
        }
        // upload GPS Photo
        // HoldingNoPath
        $HoldingNoPath = $request->HoldingNoPath;
        if ($HoldingNoPath) {
            $HoldingNoPathName = time() . '.' . $HoldingNoPath->getClientOriginalName();
            $request->HoldingNoPath->move('UploadFiles', $HoldingNoPathName);
            $land->HoldingNoPath = 'UploadFiles/' . $HoldingNoPathName;
        }
        // HoldingNoPath
        // GST No
        $GSTNoPath = $request->GSTNoPath;
        if ($GSTNoPath) {
            $GSTNoPathName = time() . '.' . $GSTNoPath->getClientOriginalName();
            $request->GSTNoPath->move('UploadFiles', $GSTNoPathName);
            $land->GSTNoPath = 'UploadFiles/' . $GSTNoPathName;
        }
        // GSTNo
        // BrandDisplay Path
        $BrandDisplayPath = $request->BrandDisplayPath;
        if ($BrandDisplayPath) {
            $BrandDisplayPathName = time() . '.' . $BrandDisplayPath->getClientOriginalName();
            $request->BrandDisplayPath->move('UploadFiles', $BrandDisplayPathName);
            $land->BrandDisplayPath = 'UploadFiles/' . $BrandDisplayPathName;
        }
        // BrandDisplay Path
        // upload
        $land->save();
        return back()->with('message', 'Successfully Updated');
    }

    // Private Land Workflow

    // private land workflow
    public function AddPrivateLandWorkflow(Request $request)
    {
        $data = PrivateLand::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'PLAdvertisement')->get();
        if ($request->forward) {
            $data->CurrentUser = $request->forward;
        }

        $data->ApplicationStatus = $request->AppStatus;

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
        return back()->with('message', 'Successfully Updated');
    }

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
    // Private Land workflow

    // OUTBOX
    public function PrivateLandOutboxView(Request $request)
    {
        $name = Auth::user()->name;
        if ($request->ajax()) {
            $data = PrivateLand::where('CurrentUser', '<>', $name)
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateLandOutbox/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.PrivateLand.PrivateLandOutbox', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updatePrivateLandOutboxView($id)
    {
        $data = PrivateLand::find($id);

        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '3')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '3')
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
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();

        $array = array(
            'land' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );

        return view('admin.PrivateLand.updatePrivateLandOutbox')->with($array);
    }
    // OUTBOX

    // Approved
    public function landApprovedView(Request $request)
    {
        if ($request->ajax()) {
            $data = PrivateLand::where('Approved', '-1')
                ->orderByDesc('id')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateLandApproved/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.PrivateLand.landApproved', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    //  UPDATE APPROVED FOR ADMIN
    public function updateLandApprovedView($id)
    {
        $data = PrivateLand::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '3')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '3')
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
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();

        $array = array(
            'land' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.PrivateLand.updateLandApproved')->with($array);
    }
    // Approved

    // Rejected
    public function landRejectedView(Request $request)
    {
        if ($request->ajax()) {
            $data = PrivateLand::where('Rejected', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateLandRejected/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.PrivateLand.landRejected', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateLandRejectedView($id)
    {
        $data = PrivateLand::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();
        $array = array(
            'land' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.PrivateLand.updateLandRejected')->with($array);
    }
    // Rejected

}
