<?php

namespace App\Repository\Banquet;

use App\Models\BanquetHall;
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


class EloquentBanquetRepository implements BanquetRepository
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
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();

        $array = array(
            'wards' => $ward,
            'locations' => $InstallLocation,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType
        );
        return View::make('user.banquet')->with($array);
    }

    public function addBanquet(Request $request)
    {
        $banquet = new BanquetHall();
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '5')->first();

        $banquet->Applicant = $request->applicant;
        $banquet->RenewalID = $newID->getNewRenewalID('BQ');
        $banquet->licenseYear = $request->licenseYear;
        $banquet->Father = $request->Father;
        $banquet->Email = $request->Email;
        $banquet->Mobile = $request->Mobile;
        $banquet->ResidenceAddress = $request->ResidenceAddress;
        $banquet->WardNo = $request->WardNo;
        $banquet->PermanentAddress = $request->PermanentAddress;
        $banquet->WardNo1 = $request->WardNo1;
        $banquet->HallType = $request->HallType;
        $banquet->EntityName = $request->EntityName;
        $banquet->EntityAddress = $request->EntityAddress;
        $banquet->EntityWard = $request->EntityWard;
        $banquet->HoldingNo = $request->HoldingNo;
        $banquet->TradeLicenseNo = $request->TradeLicenseNo;
        $banquet->Longitude = $request->Longitude;
        $banquet->Latitude = $request->Latitude;
        $banquet->OrganizationType = $request->OrganizationType;
        $banquet->FloorArea = $request->FloorArea;
        $banquet->LandDeedType = $request->LandDeedType;
        $banquet->WaterSupplyType = $request->WaterSupplyType;
        $banquet->ElectricityType = $request->ElectricityType;
        $banquet->SecurityType = $request->SecurityType;
        $banquet->CCTVNo = $request->CCTVNo;
        $banquet->FireExtinguishersNo = $request->FireExtinguishersNo;
        $banquet->EntryGatesNo = $request->EntryGatesNo;
        $banquet->ExitGatesNo = $request->ExitGatesNo;
        $banquet->TwoWheelersParkingSpace = $request->TwoWheelersParkingSpace;
        $banquet->FourWheelersParkingSpace = $request->FourWheelersParkingSpace;
        $banquet->AadharCardNo = $request->AadharCardNo;
        $banquet->PANCardNo = $request->PANCardNo;

        $banquet->CurrentUser = $workflowInitiator->Initiator;
        $banquet->Initiator = $workflowInitiator->Initiator;

        // upload
        // BanquetHallPath
        $BanquetHallPath = $request->BanquetHallPath;
        if ($BanquetHallPath) {
            $BanquetHallPathName = time() . '.' . $BanquetHallPath->getClientOriginalName();
            $request->BanquetHallPath->move('UploadFiles', $BanquetHallPathName);
            $banquet->BanquetHallPath = 'UploadFiles/' . $BanquetHallPathName;
        }
        // BanquetHallPath
        // AadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $AadharPathName = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $AadharPathName);
            $banquet->AadharPath = 'UploadFiles/' . $AadharPathName;
        }
        // AadharPath
        // FireExtinguishersPath
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $banquet->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // FireExtinguishersPath
        // CompostingMachinePath
        $CompostingMachinePath = $request->CompostingMachinePath;
        if ($CompostingMachinePath) {
            $CompostingMachinePathName = time() . '.' . $CompostingMachinePath->getClientOriginalName();
            $request->CompostingMachinePath->move('UploadFiles', $CompostingMachinePathName);
            $banquet->CompostingMachinePath = 'UploadFiles/' . $CompostingMachinePathName;
        }
        // CompostingMachinePath
        // BuildingPlanPath
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $banquet->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // BuildingPlanPath
        // CCTVCameraPath
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $banquet->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera path
        // NameplatePath
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $banquet->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // NamePlatePath
        // ParkingPath
        $ParkingPath = $request->ParkingPath;
        if ($ParkingPath) {
            $ParkingPathName = time() . '.' . $ParkingPath->getClientOriginalName();
            $request->ParkingPath->move('UploadFiles', $ParkingPathName);
            $banquet->ParkingPath = 'UploadFiles/' . $ParkingPathName;
        }
        // ParkingPath
        // EntryExitPath
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $banquet->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // EntryExitPath
        // IOReportCompostingPath
        $IOReportCompostingPath = $request->IOReportCompostingPath;
        if ($IOReportCompostingPath) {
            $IOReportCompostingPathName = time() . '.' . $IOReportCompostingPath->getClientOriginalName();
            $request->IOReportCompostingPath->move('UploadFiles', $IOReportCompostingPathName);
            $banquet->IOReportCompostingPath = 'UploadFiles/' . $IOReportCompostingPathName;
        }
        // IOReportCompostingPath
        // HoldingTaxPath
        $HoldingTaxPath = $request->HoldingTaxPath;
        if ($HoldingTaxPath) {
            $HoldingTaxPathName = time() . '.' . $HoldingTaxPath->getClientOriginalName();
            $request->HoldingTaxPath->move('UploadFiles', $HoldingTaxPathName);
            $banquet->HoldingTaxPath = 'UploadFiles/' . $HoldingTaxPathName;
        }
        // HoldingTaxPath
        // WaterUsageChargePath
        $WaterUsageChargePath = $request->WaterUsageChargePath;
        if ($WaterUsageChargePath) {
            $WaterUsageChargePathName = time() . '.' . $WaterUsageChargePath->getClientOriginalName();
            $request->WaterUsageChargePath->move('UploadFiles', $WaterUsageChargePathName);
            $banquet->WaterUsageChargePath = 'UploadFiles/' . $WaterUsageChargePathName;
        }
        // WaterUsageChargePath
        $banquet->save();
        return back()->with('message', 'Successfully Saved');
    }
    public function banquetInboxView()
    {
        $name = Auth::user()->name;
        $data = banquetHall::where('CurrentUser', $name)
            ->where('Pending', null)
            ->orderByDesc('id')
            ->get();
        $array = array(
            'banquets' => $data,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return View::make('admin.Banquet.banquetInbox')->with($array);
    }

    public function updateBanquetInbox($id)
    {
        $data = banquetHall::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '5')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '5')
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
            ->leftJoin("banquet_halls", "banquet_halls.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('banquet_halls.id', $id)
            ->get();

        $array = array(
            'banquet' => $data,
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
        return View::make('admin.Banquet.updateBanquetInbox')->with($array);
    }

    public function editBanquet(Request $request)
    {
        $banquet = BanquetHall::find($request->id);

        $banquet->Applicant = $request->applicant;
        $banquet->licenseYear = $request->licenseYear;
        $banquet->Father = $request->Father;
        $banquet->Email = $request->Email;
        $banquet->ResidenceAddress = $request->ResidenceAddress;
        $banquet->WardNo = $request->WardNo;
        $banquet->PermanentAddress = $request->PermanentAddress;
        $banquet->WardNo1 = $request->WardNo1;
        $banquet->HallType = $request->HallType;
        $banquet->EntityName = $request->EntityName;
        $banquet->EntityAddress = $request->EntityAddress;
        $banquet->EntityWard = $request->EntityWard;
        $banquet->HoldingNo = $request->HoldingNo;
        $banquet->TradeLicenseNo = $request->TradeLicenseNo;
        $banquet->Longitude = $request->Longitude;
        $banquet->Latitude = $request->Latitude;
        $banquet->OrganizationType = $request->OrganizationType;
        $banquet->FloorArea = $request->FloorArea;
        $banquet->LandDeedType = $request->LandDeedType;
        $banquet->WaterSupplyType = $request->WaterSupplyType;
        $banquet->ElectricityType = $request->ElectricityType;
        $banquet->SecurityType = $request->SecurityType;
        $banquet->CCTVNo = $request->CCTVNo;
        $banquet->FireExtinguishersNo = $request->FireExtinguishersNo;
        $banquet->EntryGatesNo = $request->EntryGatesNo;
        $banquet->ExitGatesNo = $request->ExitGatesNo;
        $banquet->TwoWheelersParkingSpace = $request->TwoWheelersParkingSpace;
        $banquet->FourWheelersParkingSpace = $request->FourWheelersParkingSpace;
        $banquet->AadharCardNo = $request->AadharCardNo;
        $banquet->PANCardNo = $request->PANCardNo;

        // Upload
        // BanquetHallPath
        $BanquetHallPath = $request->BanquetHallPath;
        if ($BanquetHallPath) {
            $BanquetHallPathName = time() . '.' . $BanquetHallPath->getClientOriginalName();
            $request->BanquetHallPath->move('UploadFiles', $BanquetHallPathName);
            $banquet->BanquetHallPath = 'UploadFiles/' . $BanquetHallPathName;
        }
        // BanquetHallPath
        // AadharPath
        $AadharPath = $request->AadharPath;
        if ($AadharPath) {
            $AadharPathName = time() . '.' . $AadharPath->getClientOriginalName();
            $request->AadharPath->move('UploadFiles', $AadharPathName);
            $banquet->AadharPath = 'UploadFiles/' . $AadharPathName;
        }
        // AadharPath
        // FireExtinguishersPath
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $banquet->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // FireExtinguishersPath
        // CompostingMachinePath
        $CompostingMachinePath = $request->CompostingMachinePath;
        if ($CompostingMachinePath) {
            $CompostingMachinePathName = time() . '.' . $CompostingMachinePath->getClientOriginalName();
            $request->CompostingMachinePath->move('UploadFiles', $CompostingMachinePathName);
            $banquet->CompostingMachinePath = 'UploadFiles/' . $CompostingMachinePathName;
        }
        // CompostingMachinePath
        // BuildingPlanPath
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $banquet->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // BuildingPlanPath
        // CCTVCameraPath
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $banquet->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera path
        // NameplatePath
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $banquet->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // NamePlatePath
        // ParkingPath
        $ParkingPath = $request->ParkingPath;
        if ($ParkingPath) {
            $ParkingPathName = time() . '.' . $ParkingPath->getClientOriginalName();
            $request->ParkingPath->move('UploadFiles', $ParkingPathName);
            $banquet->ParkingPath = 'UploadFiles/' . $ParkingPathName;
        }
        // ParkingPath
        // EntryExitPath
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $banquet->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // EntryExitPath
        // IOReportCompostingPath
        $IOReportCompostingPath = $request->IOReportCompostingPath;
        if ($IOReportCompostingPath) {
            $IOReportCompostingPathName = time() . '.' . $IOReportCompostingPath->getClientOriginalName();
            $request->IOReportCompostingPath->move('UploadFiles', $IOReportCompostingPathName);
            $banquet->IOReportCompostingPath = 'UploadFiles/' . $IOReportCompostingPathName;
        }
        // IOReportCompostingPath
        // HoldingTaxPath
        $HoldingTaxPath = $request->HoldingTaxPath;
        if ($HoldingTaxPath) {
            $HoldingTaxPathName = time() . '.' . $HoldingTaxPath->getClientOriginalName();
            $request->HoldingTaxPath->move('UploadFiles', $HoldingTaxPathName);
            $banquet->HoldingTaxPath = 'UploadFiles/' . $HoldingTaxPathName;
        }
        // HoldingTaxPath
        // WaterUsageChargePath
        $WaterUsageChargePath = $request->WaterUsageChargePath;
        if ($WaterUsageChargePath) {
            $WaterUsageChargePathName = time() . '.' . $WaterUsageChargePath->getClientOriginalName();
            $request->WaterUsageChargePath->move('UploadFiles', $WaterUsageChargePathName);
            $banquet->WaterUsageChargePath = 'UploadFiles/' . $WaterUsageChargePathName;
        }
        // WaterUsageChargePath
        // upload

        $banquet->save();
        return back()->with('message', 'Successfully Updated');
    }

    public function banquetWorkflowUpdate(Request $request)
    {
        $data = banquetHall::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'BanquetHall')->get();
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

    //  OUTBOX
    public function banquetOutboxView(Request $request)
    {
        $name = Auth::user()->name;
        if ($request->ajax()) {
            $data = banquetHall::where('CurrentUser', '<>', $name)
                ->where('Pending', null)
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
        return view('admin.Banquet.banquetOutbox', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateBanquetOutbox($id)
    {
        $data = banquetHall::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '5')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '5')
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
            ->leftJoin("banquet_halls", "banquet_halls.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('banquet_halls.id', $id)
            ->get();

        $array = array(
            'banquet' => $data,
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
        return View::make('admin.Banquet.updateBanquetOutbox')->with($array);
    }

    // Approved
    public function banquetApprovedView(Request $request)
    {
        if ($request->ajax()) {
            $data = banquetHall::where('Approved', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateBanquetApproved/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Banquet.banquetApproved', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateBanquetApprovedView($id)
    {
        $data = banquetHall::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '5')->first();

        $WorkFlow = WorkflowCandidate::where('WorkflowID', '5')
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
            ->leftJoin("banquet_halls", "banquet_halls.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('banquet_halls.id', $id)
            ->get();

        $array = array(
            'banquet' => $data,
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
        return view('admin.Banquet.updateBanquetApproved')->with($array);
    }
    // Approved

    // Rejected
    public function banquetBanquetView(Request $request)
    {
        if ($request->ajax()) {
            $data = banquetHall::where('Rejected', '-1')
                ->orderByDesc('id')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "rnc/updateBanquetRejected/" . $row['id'];
                    $btn = "<a href='$link'
                                class='btn btn-success btn-sm'><i class='icon-pen'></i>
                                Details
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Banquet.banquetRejected', [
            'parents' => $this->parent,
            'childs' => $this->child
        ]);
    }

    public function updateBanquetRejectedView($id)
    {
        $data = banquetHall::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("private_lands", "private_lands.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('private_lands.id', $id)
            ->get();
        $array = array(
            'banquet' => $data,
            'comments' => $comments,
            'parents' => $this->parent,
            'childs' => $this->child
        );
        return view('admin.Banquet.updateBanquetRejected')->with($array);
    }
    // Rejected

}
