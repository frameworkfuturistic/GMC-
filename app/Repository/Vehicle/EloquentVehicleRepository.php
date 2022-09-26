<?php

namespace App\Repository\Vehicle;

use App\Models\Param;
use App\Models\ParamString;
use App\Models\VehicleAdvertisement;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use Datetime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Traits\AppHelper as TraitAppHelper;
use Yajra\DataTables\DataTables;

class EloquentVehicleRepository implements VehicleRepository
{
    use TraitAppHelper;

    public function __construct($roleID)
    {
        $this->menuApp($roleID);
    }

    public function view()
    {
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $vehicleType = ParamString::where('ParamCategoryID', '2024')->get();
        $data = array('wards' => $ward, 'vehicleTypes' => $vehicleType, 'DisplayTypes' => $DisplayType);
        return View::make('user.vehicle')->with($data);
    }

    public function saveVehicle(Request $request)
    {
        $vehicle = new VehicleAdvertisement();
        $newID = new Param();

        $workflowInitiator = Workflow::where('WorkflowID', '2')->first();

        $vehicle->RenewalID = $newID->getNewRenewalID('VH');

        $vehicle->applicant = $request->applicant;
        $vehicle->father = $request->father;
        $vehicle->email = $request->email;
        $vehicle->ResidenceAddress = $request->ResidenceAddress;
        $vehicle->WardNo = $request->WardNo;
        $vehicle->PermanentAddress = $request->PermanentAddress;
        $vehicle->WardNo1 = $request->WardNo1;
        $vehicle->MobileNo = $request->MobileNo;
        $vehicle->AadharNo = $request->AadharNo;
        $vehicle->LicenseFrom = $request->LicenseFrom;
        $vehicle->LicenseTo = $request->LicenseTo;
        $vehicle->EntityName = $request->EntityName;
        $vehicle->TradeLicenseNo = $request->TradeLicenseNo;
        $vehicle->GSTNo = $request->GSTNo;
        $vehicle->VehicleNo = $request->VehicleNo;
        $vehicle->VehicleName = $request->VehicleName;
        $vehicle->VehicleType = $request->VehicleType;
        $vehicle->BrandDisplay = $request->BrandDisplay;
        $vehicle->FrontArea = $request->FrontArea;
        $vehicle->RearArea = $request->RearArea;
        $vehicle->Side1Area = $request->Side1Area;
        $vehicle->TopArea = $request->TopArea;
        $vehicle->DisplayType = $request->DisplayType;

        $vehicle->CurrentUser = $workflowInitiator->Initiator;
        $vehicle->Initiator = $workflowInitiator->Initiator;


        // Upload

        // Aadhar Upload
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $name = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $name);
            $vehicle->AadharPath = 'UploadFiles/' . $name;
        }
        // Aadhar Upload
        // TradeLicensePath
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $vehicle->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // TradeLicensePath
        // VehiclePhotoPath
        $VehiclePhotoPath = $request->VehiclePhotoPath;
        if ($VehiclePhotoPath) {
            $VehiclePhotoPathName = time() . '.' . $VehiclePhotoPath->getClientOriginalName();
            $request->VehiclePhotoPath->move('UploadFiles', $VehiclePhotoPathName);
            $vehicle->VehiclePhotoPath = 'UploadFiles/' . $VehiclePhotoPathName;
        }
        // VehiclePhotoPath
        // OwnerBookPath
        $OwnerBookPath = $request->OwnerBookPath;
        if ($OwnerBookPath) {
            $OwnerBookPathName = time() . '.' . $OwnerBookPath->getClientOriginalName();
            $request->OwnerBookPath->move('UploadFiles', $OwnerBookPathName);
            $vehicle->OwnerBookPath = 'UploadFiles/' . $OwnerBookPathName;
        }
        // OwnerBookPath
        // DrivingLicensePath
        $DrivingLicensePath = $request->DrivingLicensePath;
        if ($DrivingLicensePath) {
            $DrivingLicensePathName = time() . '.' . $DrivingLicensePath->getClientOriginalName();
            $request->DrivingLicensePath->move('UploadFiles', $DrivingLicensePathName);
            $vehicle->DrivingLicensePath = 'UploadFiles/' . $DrivingLicensePathName;
        }
        // DrivingLicensePath
        // InsurancePhotoPath
        $InsurancePhotoPath = $request->InsurancePhotoPath;
        if ($InsurancePhotoPath) {
            $InsurancePhotoPathName = time() . '.' . $InsurancePhotoPath->getClientOriginalName();
            $request->InsurancePhotoPath->move('UploadFiles', $InsurancePhotoPathName);
            $vehicle->InsurancePhotoPath = 'UploadFiles/' . $InsurancePhotoPathName;
        }
        // InsurancePhotoPath
        // GSTNoPhotoPath
        $GSTNoPhotoPath = $request->GSTNoPhotoPath;
        if ($GSTNoPhotoPath) {
            $GSTNoPhotoPathName = time() . '.' . $GSTNoPhotoPath->getClientOriginalName();
            $request->GSTNoPhotoPath->move('UploadFiles', $GSTNoPhotoPathName);
            $vehicle->GSTNoPhotoPath = 'UploadFiles/' . $GSTNoPhotoPathName;
        }
        // GSTNoPhotoPath

        // Upload
        $vehicle->save();
        return back()->with('message', 'Successfully Saved');
    }

    public function vehicleInboxView()
    {
        $name = Auth::user()->name;
        $data = VehicleAdvertisement::where('CurrentUser', $name)
            ->where('Pending', null)
            ->orderByDesc('id')
            ->get();
        $array = array(
            'vehicles' => $data,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Vehicle.vehicleInbox')->with($array);
    }

    public function vehicleInboxUpdate($id)
    {
        $data = VehicleAdvertisement::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '2')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '2')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $vehicleType = ParamString::where('ParamCategoryID', '2024')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("vehicle_advertisements", "vehicle_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('vehicle_advertisements.id', $id)
            ->get();

        $array = array(
            'vehicle' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'vehicletypes' => $vehicleType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Vehicle.updateVehicleInbox')->with($array);
    }

    // update Vehicle Inbox
    public function UpdateVehicleInbox(Request $request)
    {
        $vehicle = VehicleAdvertisement::find($request->id);
        $vehicle->applicant = $request->applicant;
        $vehicle->father = $request->father;
        $vehicle->email = $request->email;
        $vehicle->ResidenceAddress = $request->ResidenceAddress;
        $vehicle->WardNo = $request->WardNo;
        $vehicle->PermanentAddress = $request->PermanentAddress;
        $vehicle->WardNo1 = $request->WardNo1;
        $vehicle->MobileNo = $request->MobileNo;
        $vehicle->AadharNo = $request->AadharNo;
        $vehicle->LicenseFrom = $request->LicenseFrom;
        $vehicle->LicenseTo = $request->LicenseTo;
        $vehicle->EntityName = $request->EntityName;
        $vehicle->TradeLicenseNo = $request->TradeLicenseNo;
        $vehicle->GSTNo = $request->GSTNo;
        $vehicle->VehicleNo = $request->VehicleNo;
        $vehicle->VehicleName = $request->VehicleName;
        $vehicle->VehicleType = $request->VehicleType;
        $vehicle->BrandDisplay = $request->BrandDisplay;
        $vehicle->FrontArea = $request->FrontArea;
        $vehicle->RearArea = $request->RearArea;
        $vehicle->Side1Area = $request->Side1Area;
        $vehicle->TopArea = $request->TopArea;
        $vehicle->DisplayType = $request->DisplayType;

        $vehicle->Amount = $request->amount;
        $vehicle->GST = $request->GST;
        $vehicle->NetAmount = $request->total;

        // upload
        // Aadhar Upload
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $name = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $name);
            $vehicle->AadharPath = 'UploadFiles/' . $name;
        }
        // Aadhar Upload
        // TradeLicensePath
        $TradeLicensePath = $request->TradeLicensePath;
        if ($TradeLicensePath) {
            $TradeLicensePathName = time() . '.' . $TradeLicensePath->getClientOriginalName();
            $request->TradeLicensePath->move('UploadFiles', $TradeLicensePathName);
            $vehicle->TradeLicensePath = 'UploadFiles/' . $TradeLicensePathName;
        }
        // TradeLicensePath
        // VehiclePhotoPath
        $VehiclePhotoPath = $request->VehiclePhotoPath;
        if ($VehiclePhotoPath) {
            $VehiclePhotoPathName = time() . '.' . $VehiclePhotoPath->getClientOriginalName();
            $request->VehiclePhotoPath->move('UploadFiles', $VehiclePhotoPathName);
            $vehicle->VehiclePhotoPath = 'UploadFiles/' . $VehiclePhotoPathName;
        }
        // VehiclePhotoPath
        // OwnerBookPath
        $OwnerBookPath = $request->OwnerBookPath;
        if ($OwnerBookPath) {
            $OwnerBookPathName = time() . '.' . $OwnerBookPath->getClientOriginalName();
            $request->OwnerBookPath->move('UploadFiles', $OwnerBookPathName);
            $vehicle->OwnerBookPath = 'UploadFiles/' . $OwnerBookPathName;
        }
        // OwnerBookPath
        // DrivingLicensePath
        $DrivingLicensePath = $request->DrivingLicensePath;
        if ($DrivingLicensePath) {
            $DrivingLicensePathName = time() . '.' . $DrivingLicensePath->getClientOriginalName();
            $request->DrivingLicensePath->move('UploadFiles', $DrivingLicensePathName);
            $vehicle->DrivingLicensePath = 'UploadFiles/' . $DrivingLicensePathName;
        }
        // DrivingLicensePath
        // InsurancePhotoPath
        $InsurancePhotoPath = $request->InsurancePhotoPath;
        if ($InsurancePhotoPath) {
            $InsurancePhotoPathName = time() . '.' . $InsurancePhotoPath->getClientOriginalName();
            $request->InsurancePhotoPath->move('UploadFiles', $InsurancePhotoPathName);
            $vehicle->InsurancePhotoPath = 'UploadFiles/' . $InsurancePhotoPathName;
        }
        // InsurancePhotoPath
        // GSTNoPhotoPath
        $GSTNoPhotoPath = $request->GSTNoPhotoPath;
        if ($GSTNoPhotoPath) {
            $GSTNoPhotoPathName = time() . '.' . $GSTNoPhotoPath->getClientOriginalName();
            $request->GSTNoPhotoPath->move('UploadFiles', $GSTNoPhotoPathName);
            $vehicle->GSTNoPhotoPath = 'UploadFiles/' . $GSTNoPhotoPathName;
        }
        // GSTNoPhotoPath

        // Upload
        $vehicle->save();
        return back()->with('message', 'Successfully Updated');
        // upload
    }

    // WORKFLOW
    public function addVehicleWorkflow(Request $request)
    {
        $data = VehicleAdvertisement::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'VehicleAdvertisement')->get();
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
        return back()->with('message', 'Successfully Updated');
    }

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
    // OUTBOX
    public function vehicleOutboxView(Request $request)
    {
        $name = Auth::user()->name;
        if ($request->ajax()) {
            $data = VehicleAdvertisement::where('CurrentUser', '<>', $name)
                ->where('Pending', null)
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateVehicleOutbox/" . $row['id'];
                    $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                                <i class='icon-pen'></i> Details
                            </a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Vehicle.vehicleOutbox', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateVehicleOutboxView($id)
    {
        $data = VehicleAdvertisement::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '2')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '2')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $vehicleType = ParamString::where('ParamCategoryID', '2024')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("vehicle_advertisements", "vehicle_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('vehicle_advertisements.id', $id)
            ->get();

        $array = array(
            'vehicle' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'vehicletypes' => $vehicleType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );

        return view('admin.Vehicle.updateVehicleOutbox')->with($array);
    }
    // OUTBOX

    // Approved
    public function vehicleApprovedView(Request $request)
    {
        if ($request->ajax()) {
            $data = VehicleAdvertisement::where('Approved', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateVehicleApproved/" . $row['id'];
                    $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                                <i class='icon-pen'></i> Details
                            </a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.Vehicle.vehicleApproved', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateVehicleApprovedView($id)
    {
        $data = VehicleAdvertisement::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '2')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '2')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $DisplayType = ParamString::where('ParamCategoryID', '8')->get();
        $vehicleType = ParamString::where('ParamCategoryID', '2024')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("vehicle_advertisements", "vehicle_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('vehicle_advertisements.id', $id)
            ->get();

        $array = array(
            'vehicle' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'DisplayTypes' => $DisplayType,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'vehicletypes' => $vehicleType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.Vehicle.updateVehicleApproved')->with($array);
    }
    // Approved

    // Rejected
    public function vehicleRejectedView(Request $request)
    {
        if ($request->ajax()) {
            $data = VehicleAdvertisement::where('Rejected', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateVehicleRejected/" . $row['id'];
                    $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                                <i class='icon-pen'></i> Details
                            </a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.Vehicle.vehicleRejected', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateVehicleRejectedView($id)
    {
        $data = VehicleAdvertisement::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("vehicle_advertisements", "vehicle_advertisements.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('vehicle_advertisements.id', $id)
            ->get();
        $array = array(
            'vehicle' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.Vehicle.updateVehicleRejected')->with($array);
    }
    // Rejected
}
