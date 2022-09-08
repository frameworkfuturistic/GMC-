<?php

namespace App\Repository\Dharmsala;

use App\Models\Dharmasala;
use App\Models\Param;
use App\Models\ParamString;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Traits\AppHelper as TraitAppHelper;
use Yajra\DataTables\DataTables;

class EloquentDharmsalaRepository implements DharmsalaRepository
{

    use TraitAppHelper;

    public function __construct()
    {
        $this->menuApp();
    }

    public function view()
    {
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();
        $lodgeType = ParamString::where('ParamCategoryID', '16')->get();
        $array = array(
            'wards' => $ward,
            'locations' => $InstallLocation,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType,
            'lodgeTypes' => $lodgeType
        );
        return View::make('user.dharmasala')->with($array);
    }

    public function addDharmasala(Request $request)
    {
        $dharmasala = new Dharmasala();
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '7')->first();
        $dharmasala->RenewalID = $newID->getNewRenewalID('DH');

        $dharmasala->Applicant = $request->Applicant;
        $dharmasala->Father = $request->Father;
        $dharmasala->mobile = $request->mobile;
        $dharmasala->email = $request->email;
        $dharmasala->ResidenceAddress = $request->ResidenceAddress;
        $dharmasala->WardNo = $request->WardNo;
        $dharmasala->PermanentAddress = $request->PermanentAddress;
        $dharmasala->WardNo1 = $request->WardNo1;
        $dharmasala->LicenseYear = $request->LicenseYear;
        $dharmasala->EstablishedType = $request->EstablishedType;
        $dharmasala->EntityName = $request->EntityName;
        $dharmasala->EntityAddress = $request->EntityAddress;
        $dharmasala->HoldingNo = $request->HoldingNo;
        $dharmasala->LicenseNo = $request->LicenseNo;
        $dharmasala->Longitude = $request->Longitude;
        $dharmasala->Latitude = $request->Latitude;
        $dharmasala->OrganizationType = $request->OrganizationType;
        $dharmasala->LandDeedType = $request->LandDeedType;
        $dharmasala->WaterSupplyType = $request->WaterSupplyType;
        $dharmasala->ElectricityType = $request->ElectricityType;
        $dharmasala->SecurityType = $request->SecurityType;
        $dharmasala->LodgeType = $request->LodgeType;
        $dharmasala->CCTVCameraNo = $request->CCTVCameraNo;
        $dharmasala->NoOfBeds = $request->NoOfBeds;
        $dharmasala->NoOfRooms = $request->NoOfRooms;
        $dharmasala->NoOfFireExtinguishers = $request->NoOfFireExtinguishers;
        $dharmasala->NoOfEntryGate = $request->EntryGatesNo;
        $dharmasala->NoOfExitGate = $request->NoOfExitGate;
        $dharmasala->NoOfTwoWheelersParking = $request->NoOfTwoWheelersParking;
        $dharmasala->NoOfFourWheelersParking = $request->NoOfFourWheelersParking;
        $dharmasala->AadharNo = $request->AadharNo;
        $dharmasala->PANNo = $request->PANNo;

        $dharmasala->CurrentUser = $workflowInitiator->Initiator;
        $dharmasala->Initiator = $workflowInitiator->Initiator;

        // upload
        // dharmasala Frontage Path
        $HostelFrontagePath = $request->dharmasalaFrontagePath;
        if ($HostelFrontagePath) {
            $HostelFrontagePathName = time() . '.' . $HostelFrontagePath->getClientOriginalName();
            $request->dharmasalaFrontagePath->move('UploadFiles', $HostelFrontagePathName);
            $dharmasala->HostelFrontagePath = 'UploadFiles/' . $HostelFrontagePathName;
        }
        // Hostel Frontage Path
        // Aadhar No Path
        $AadharNoPath = $request->AadharNoPath;
        if ($AadharNoPath) {
            $AadharNoPathName = time() . '.' . $AadharNoPath->getClientOriginalName();
            $request->AadharNoPath->move('UploadFiles', $AadharNoPathName);
            $dharmasala->AadharNoPath = 'UploadFiles/' . $AadharNoPathName;
        }
        // Aadhar No Path
        // Fire Extinguishers Path
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $dharmasala->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // Fire Extinguishers Path
        // CCTV Camera Path
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $dharmasala->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera Path
        // Name Plate Path
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $dharmasala->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // Name Plate Path
        // Entry Exit Path
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $dharmasala->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // Entry Exit Path
        // Building Plan Path
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $dharmasala->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // Building Plan Path
        // solid Waste Path
        $SolidWastePath = $request->SolidWastePath;
        if ($SolidWastePath) {
            $SolidWastePathName = time() . '.' . $SolidWastePath->getClientOriginalName();
            $request->SolidWastePath->move('UploadFiles', $SolidWastePathName);
            $dharmasala->SolidWastePath = 'UploadFiles/' . $SolidWastePathName;
        }
        // Solid Waste path
        // Holding Tax Receipt Path
        $dharmasala->HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;

        $HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;
        if ($SolidWastePath) {
            $HoldingTaxReceiptPathName = time() . '.' . $HoldingTaxReceiptPath->getClientOriginalName();
            $request->HoldingTaxReceiptPath->move('UploadFiles', $HoldingTaxReceiptPathName);
            $dharmasala->HoldingTaxReceiptPath = 'UploadFiles/' . $HoldingTaxReceiptPathName;
        }
        // Holding Tax Receipt Path
        $dharmasala->save();
        return back()->with('message', 'Successfully Saved');
    }

    public function inboxView()
    {
        $name = Auth::user()->name;
        $data = Dharmasala::where('CurrentUser', $name)
            ->where('Pending', null)
            ->orderByDesc('id')
            ->get();
        $array = array(
            'dharmasalas' => $data,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Dharmasala.Inbox')->with($array);
    }

    public function updateDharmasalaInboxView($id)
    {
        $data = Dharmasala::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '6')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '6')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("dharmasalas", "dharmasalas.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('dharmasalas.id', $id)
            ->get();

        $array = array(
            'dharmasala' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Dharmasala.updateInbox')->with($array);
    }

    public function editDharmasala(Request $request)
    {
        $dharmasala = Dharmasala::find($request->id);

        $dharmasala->Applicant = $request->Applicant;
        $dharmasala->Father = $request->Father;
        $dharmasala->mobile = $request->mobile;
        $dharmasala->email = $request->email;
        $dharmasala->ResidenceAddress = $request->ResidenceAddress;
        $dharmasala->WardNo = $request->WardNo;
        $dharmasala->PermanentAddress = $request->PermanentAddress;
        $dharmasala->WardNo1 = $request->WardNo1;
        $dharmasala->LicenseYear = $request->LicenseYear;
        $dharmasala->EstablishedType = $request->EstablishedType;
        $dharmasala->EntityName = $request->EntityName;
        $dharmasala->EntityAddress = $request->EntityAddress;
        $dharmasala->HoldingNo = $request->HoldingNo;
        $dharmasala->LicenseNo = $request->LicenseNo;
        $dharmasala->Longitude = $request->Longitude;
        $dharmasala->Latitude = $request->Latitude;
        $dharmasala->OrganizationType = $request->OrganizationType;
        $dharmasala->LandDeedType = $request->LandDeedType;
        $dharmasala->WaterSupplyType = $request->WaterSupplyType;
        $dharmasala->ElectricityType = $request->ElectricityType;
        $dharmasala->SecurityType = $request->SecurityType;
        $dharmasala->LodgeType = $request->LodgeType;
        $dharmasala->CCTVCameraNo = $request->CCTVCameraNo;
        $dharmasala->NoOfBeds = $request->NoOfBeds;
        $dharmasala->NoOfRooms = $request->NoOfRooms;
        $dharmasala->NoOfFireExtinguishers = $request->NoOfFireExtinguishers;
        $dharmasala->NoOfEntryGate = $request->EntryGatesNo;
        $dharmasala->NoOfExitGate = $request->NoOfExitGate;
        $dharmasala->NoOfTwoWheelersParking = $request->NoOfTwoWheelersParking;
        $dharmasala->NoOfFourWheelersParking = $request->NoOfFourWheelersParking;
        $dharmasala->AadharNo = $request->AadharNo;
        $dharmasala->PANNo = $request->PANNo;

        // Upload
        // dharmasala Frontage Path
        $HostelFrontagePath = $request->dharmasalaFrontagePath;
        if ($HostelFrontagePath) {
            $HostelFrontagePathName = time() . '.' . $HostelFrontagePath->getClientOriginalName();
            $request->dharmasalaFrontagePath->move('UploadFiles', $HostelFrontagePathName);
            $dharmasala->HostelFrontagePath = 'UploadFiles/' . $HostelFrontagePathName;
        }
        // Hostel Frontage Path
        // Aadhar No Path
        $AadharNoPath = $request->AadharNoPath;
        if ($AadharNoPath) {
            $AadharNoPathName = time() . '.' . $AadharNoPath->getClientOriginalName();
            $request->AadharNoPath->move('UploadFiles', $AadharNoPathName);
            $dharmasala->AadharNoPath = 'UploadFiles/' . $AadharNoPathName;
        }
        // Aadhar No Path
        // Fire Extinguishers Path
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $dharmasala->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // Fire Extinguishers Path
        // CCTV Camera Path
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $dharmasala->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera Path
        // Name Plate Path
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $dharmasala->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // Name Plate Path
        // Entry Exit Path
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $dharmasala->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // Entry Exit Path
        // Building Plan Path
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $dharmasala->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // Building Plan Path
        // solid Waste Path
        $SolidWastePath = $request->SolidWastePath;
        if ($SolidWastePath) {
            $SolidWastePathName = time() . '.' . $SolidWastePath->getClientOriginalName();
            $request->SolidWastePath->move('UploadFiles', $SolidWastePathName);
            $dharmasala->SolidWastePath = 'UploadFiles/' . $SolidWastePathName;
        }
        // Solid Waste path
        // Holding Tax Receipt Path
        $dharmasala->HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;

        $HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;
        if ($SolidWastePath) {
            $HoldingTaxReceiptPathName = time() . '.' . $HoldingTaxReceiptPath->getClientOriginalName();
            $request->HoldingTaxReceiptPath->move('UploadFiles', $HoldingTaxReceiptPathName);
            $dharmasala->HoldingTaxReceiptPath = 'UploadFiles/' . $HoldingTaxReceiptPathName;
        }
        // Holding Tax Receipt Path
        $dharmasala->save();
        return back()->with('message', 'Successfully Updated');
        // Upload

    }

    public function workflowUpdate(Request $request)
    {
        $data = Dharmasala::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'Dharamshala')->get();
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

    // OUTBOX
    public function dharmasalaOutboxView(Request $request)
    {
        $name = Auth::user()->name;
        if ($request->ajax()) {
            $data = Dharmasala::where('CurrentUser', '<>', $name)
                ->where('Pending', null)
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updatedharmasalaOutbox/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $array = array(
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Dharmasala.Outbox')->with($array);
    }

    public function dharmasalaOutboxUpdateView($id)
    {
        $data = Dharmasala::find($id);

        $username = Auth::user()->name;
        $workflowInitiator = Workflow::where('WorkflowID', '6')->first();
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '6')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("dharmasalas", "dharmasalas.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('dharmasalas.id', $id)
            ->get();

        $array = array(
            'dharmasala' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Dharmasala.updateOutbox')->with($array);
    }
    // OUTBOX

    // Approved
    public function dharmasalaApprovedView(Request $request)
    {
        if ($request->ajax()) {
            $data = Dharmasala::where('Approved', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateDharmasalaApproved/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Dharmasala.dharmasalaApproved', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateDharmasalaApprovedView($id)
    {
        $data = Dharmasala::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '6')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '6')
            ->where('UserID', '<>', $username)
            ->get();
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("dharmasalas", "dharmasalas.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('dharmasalas.id', $id)
            ->get();

        $array = array(
            'dharmasala' => $data,
            'workflows' => $WorkFlow,
            'wards' => $ward,
            'locations' => $InstallLocation,
            'workflowInitiator' => $workflowInitiator,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.Dharmasala.updateDharmasalaApproved')->with($array);
    }
    // Approved

    // Rejected
    public function DharmasalaRejectedView(Request $request)
    {
        if ($request->ajax()) {
            $data = Dharmasala::where('Rejected', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateDharmasalaRejected/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Dharmasala.dharmasalaRejected', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateDharmasalaRejectedView($id)
    {
        $data = Dharmasala::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();
        $array = array(
            'dharmasala' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.Dharmasala.updateDharmasalaRejected')->with($array);
    }
    // Rejected
}
