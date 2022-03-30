<?php
namespace App\Http\Controllers\Traits;

use App\Models\Hostel;
use App\Models\Param;
use App\Models\ParamString;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

trait Hostels
{
    public function view(){
        $ward = ParamString::where('ParamCategoryID', '7')->get();
        $InstallLocation = ParamString::where('ParamCategoryID', '1023')->get();
        $hallType = ParamString::where('ParamCategoryID', '13')->get();
        $organizeType = ParamString::where('ParamCategoryID', '3')->get();
        $deedType = ParamString::where('ParamCategoryID', '12')->get();
        $supplyType = ParamString::where('ParamCategoryID', '11')->get();
        $electricityType = ParamString::where('ParamCategoryID', '10')->get();
        $establishedType=ParamString::where('ParamCategoryID','16')->get();
        $lodgeType=ParamString::where('ParamCategoryID','4')->get();

        $array = array(
            'wards' => $ward,
            'locations' => $InstallLocation,
            'hallTypes' => $hallType,
            'organizeTypes' => $organizeType,
            'deedTypes' => $deedType,
            'supplyTypes' => $supplyType,
            'electricityTypes' => $electricityType,
            'establishedTypes'=>$establishedType,
            'lodgeTypes'=>$lodgeType
        );
        return View::make('user.hostel')->with($array);
    }

    public function addHostel(Request $request)
    {
        $hostel = new Hostel();
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '6')->first();
        $hostel->RenewalID = $newID->getNewRenewalID('LD');
        $hostel->Applicant = $request->Applicant;
        $hostel->Father = $request->Father;
        $hostel->mobile = $request->mobile;
        $hostel->email = $request->email;
        $hostel->ResidenceAddress = $request->ResidenceAddress;
        $hostel->WardNo = $request->WardNo;
        $hostel->PermanentAddress = $request->PermanentAddress;
        $hostel->WardNo1 = $request->WardNo1;
        $hostel->LicenseYear = $request->LicenseYear;
        $hostel->EstablishedType = $request->EstablishedType;
        $hostel->EntityName = $request->EntityName;
        $hostel->EntityAddress = $request->EntityAddress;
        $hostel->HoldingNo = $request->HoldingNo;
        $hostel->LicenseNo = $request->LicenseNo;
        $hostel->Longitude = $request->Longitude;
        $hostel->Latitude = $request->Latitude;
        $hostel->OrganizationType = $request->OrganizationType;
        $hostel->LandDeedType = $request->LandDeedType;
        $hostel->WaterSupplyType = $request->WaterSupplyType;
        $hostel->ElectricityType = $request->ElectricityType;
        $hostel->SecurityType = $request->SecurityType;
        $hostel->LodgeType = $request->LodgeType;
        $hostel->CCTVCameraNo = $request->CCTVCameraNo;
        $hostel->NoOfBeds = $request->NoOfBeds;
        $hostel->NoOfRooms = $request->NoOfRooms;
        $hostel->NoOfFireExtinguishers = $request->NoOfFireExtinguishers;
        $hostel->NoOfEntryGate = $request->EntryGatesNo;
        $hostel->NoOfExitGate = $request->NoOfExitGate;
        $hostel->NoOfTwoWheelersParking = $request->NoOfTwoWheelersParking;
        $hostel->NoOfFourWheelersParking = $request->NoOfFourWheelersParking;
        $hostel->AadharNo = $request->AadharNo;
        $hostel->PANNo = $request->PANNo;

        $hostel->CurrentUser = $workflowInitiator->Initiator;
        $hostel->Initiator = $workflowInitiator->Initiator;

        // upload
        // Hostel Frontage Path
        $HostelFrontagePath = $request->HostelFrontagePath;
        if ($HostelFrontagePath) {
            $HostelFrontagePathName = time() . '.' . $HostelFrontagePath->getClientOriginalName();
            $request->HostelFrontagePath->move('UploadFiles', $HostelFrontagePathName);
            $hostel->HostelFrontagePath = 'UploadFiles/' . $HostelFrontagePathName;
        }
        // Hostel Frontage Path
        // Aadhar No Path
        $AadharNoPath = $request->AadharNoPath;
        if ($AadharNoPath) {
            $AadharNoPathName = time() . '.' . $AadharNoPath->getClientOriginalName();
            $request->AadharNoPath->move('UploadFiles', $AadharNoPathName);
            $hostel->AadharNoPath = 'UploadFiles/' . $AadharNoPathName;
        }
        // Aadhar No Path
        // Fire Extinguishers Path
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $hostel->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // Fire Extinguishers Path
        // CCTV Camera Path
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $hostel->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera Path
        // Name Plate Path
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $hostel->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // Name Plate Path
        // Entry Exit Path
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $hostel->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // Entry Exit Path
        // Building Plan Path
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $hostel->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // Building Plan Path
        // solid Waste Path
        $SolidWastePath = $request->SolidWastePath;
        if ($SolidWastePath) {
            $SolidWastePathName = time() . '.' . $SolidWastePath->getClientOriginalName();
            $request->SolidWastePath->move('UploadFiles', $SolidWastePathName);
            $hostel->SolidWastePath = 'UploadFiles/' . $SolidWastePathName;
        }
        // Solid Waste path
        // Holding Tax Receipt Path
        $hostel->HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;

        $HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;
        if ($SolidWastePath) {
            $HoldingTaxReceiptPathName = time() . '.' . $HoldingTaxReceiptPath->getClientOriginalName();
            $request->HoldingTaxReceiptPath->move('UploadFiles', $HoldingTaxReceiptPathName);
            $hostel->HoldingTaxReceiptPath = 'UploadFiles/' . $HoldingTaxReceiptPathName;
        }
        // Holding Tax Receipt Path
        $hostel->save();

        return back()->with('message', 'Successfully Saved');
    }

    public function hostelInboxView()
    {
        $name = Auth::user()->name;
        $data = Hostel::where('CurrentUser', $name)->get();
        $array = array('hostels' => $data);
        return View::make('admin.Hostel.hostelInbox')->with($array);
    }

    public function updateHostelInboxView($id)
    {
        $data = Hostel::find($id);
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
        $establishedType=ParamString::where('ParamCategoryID','16')->get();
        $lodgeType=ParamString::where('ParamCategoryID','4')->get();

        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hostels", "hostels.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('hostels.id', $id)
            ->get();

        $array = array(
            'hostel' => $data,
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
            'establishedTypes'=>$establishedType,
            'lodgeTypes'=>$lodgeType
        );
        return View::make('admin.Hostel.updateHostelInbox')->with($array);
    }

    public function editHostel(Request $request)
    {
        $hostel = Hostel::find($request->id);

        $hostel->Applicant = $request->Applicant;
        $hostel->Father = $request->Father;
        $hostel->mobile = $request->mobile;
        $hostel->email = $request->email;
        $hostel->ResidenceAddress = $request->ResidenceAddress;
        $hostel->WardNo = $request->WardNo;
        $hostel->PermanentAddress = $request->PermanentAddress;
        $hostel->WardNo1 = $request->WardNo1;
        $hostel->LicenseYear = $request->LicenseYear;
        $hostel->EstablishedType = $request->EstablishedType;
        $hostel->EntityName = $request->EntityName;
        $hostel->EntityAddress = $request->EntityAddress;
        $hostel->HoldingNo = $request->HoldingNo;
        $hostel->LicenseNo = $request->LicenseNo;
        $hostel->Longitude = $request->Longitude;
        $hostel->Latitude = $request->Latitude;
        $hostel->OrganizationType = $request->OrganizationType;
        $hostel->LandDeedType = $request->LandDeedType;
        $hostel->WaterSupplyType = $request->WaterSupplyType;
        $hostel->ElectricityType = $request->ElectricityType;
        $hostel->SecurityType = $request->SecurityType;
        $hostel->LodgeType = $request->LodgeType;
        $hostel->CCTVCameraNo = $request->CCTVCameraNo;
        $hostel->NoOfBeds = $request->NoOfBeds;
        $hostel->NoOfRooms = $request->NoOfRooms;
        $hostel->NoOfFireExtinguishers = $request->NoOfFireExtinguishers;
        $hostel->NoOfEntryGate = $request->EntryGatesNo;
        $hostel->NoOfExitGate = $request->NoOfExitGate;
        $hostel->NoOfTwoWheelersParking = $request->NoOfTwoWheelersParking;
        $hostel->NoOfFourWheelersParking = $request->NoOfFourWheelersParking;
        $hostel->AadharNo = $request->AadharNo;
        $hostel->PANNo = $request->PANNo;

        //  upload
        // Hostel Frontage Path
        $HostelFrontagePath = $request->HostelFrontagePath;
        if ($HostelFrontagePath) {
            $HostelFrontagePathName = time() . '.' . $HostelFrontagePath->getClientOriginalName();
            $request->HostelFrontagePath->move('UploadFiles', $HostelFrontagePathName);
            $hostel->HostelFrontagePath = 'UploadFiles/' . $HostelFrontagePathName;
        }
        // Hostel Frontage Path
        // Aadhar No Path
        $AadharNoPath = $request->AadharNoPath;
        if ($AadharNoPath) {
            $AadharNoPathName = time() . '.' . $AadharNoPath->getClientOriginalName();
            $request->AadharNoPath->move('UploadFiles', $AadharNoPathName);
            $hostel->AadharNoPath = 'UploadFiles/' . $AadharNoPathName;
        }
        // Aadhar No Path
        // Fire Extinguishers Path
        $FireExtinguishersPath = $request->FireExtinguishersPath;
        if ($FireExtinguishersPath) {
            $FireExtinguishersPathName = time() . '.' . $FireExtinguishersPath->getClientOriginalName();
            $request->FireExtinguishersPath->move('UploadFiles', $FireExtinguishersPathName);
            $hostel->FireExtinguishersPath = 'UploadFiles/' . $FireExtinguishersPathName;
        }
        // Fire Extinguishers Path
        // CCTV Camera Path
        $CCTVCameraPath = $request->CCTVCameraPath;
        if ($CCTVCameraPath) {
            $CCTVCameraPathName = time() . '.' . $CCTVCameraPath->getClientOriginalName();
            $request->CCTVCameraPath->move('UploadFiles', $CCTVCameraPathName);
            $hostel->CCTVCameraPath = 'UploadFiles/' . $CCTVCameraPathName;
        }
        // CCTV Camera Path
        // Name Plate Path
        $NamePlatePath = $request->NamePlatePath;
        if ($NamePlatePath) {
            $NamePlatePathName = time() . '.' . $NamePlatePath->getClientOriginalName();
            $request->NamePlatePath->move('UploadFiles', $NamePlatePathName);
            $hostel->NamePlatePath = 'UploadFiles/' . $NamePlatePathName;
        }
        // Name Plate Path
        // Entry Exit Path
        $EntryExitPath = $request->EntryExitPath;
        if ($EntryExitPath) {
            $EntryExitPathName = time() . '.' . $EntryExitPath->getClientOriginalName();
            $request->EntryExitPath->move('UploadFiles', $EntryExitPathName);
            $hostel->EntryExitPath = 'UploadFiles/' . $EntryExitPathName;
        }
        // Entry Exit Path
        // Building Plan Path
        $BuildingPlanPath = $request->BuildingPlanPath;
        if ($BuildingPlanPath) {
            $BuildingPlanPathName = time() . '.' . $BuildingPlanPath->getClientOriginalName();
            $request->BuildingPlanPath->move('UploadFiles', $BuildingPlanPathName);
            $hostel->BuildingPlanPath = 'UploadFiles/' . $BuildingPlanPathName;
        }
        // Building Plan Path
        // solid Waste Path
        $SolidWastePath = $request->SolidWastePath;
        if ($SolidWastePath) {
            $SolidWastePathName = time() . '.' . $SolidWastePath->getClientOriginalName();
            $request->SolidWastePath->move('UploadFiles', $SolidWastePathName);
            $hostel->SolidWastePath = 'UploadFiles/' . $SolidWastePathName;
        }
        // Solid Waste path
        // Holding Tax Receipt Path
        $hostel->HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;

        $HoldingTaxReceiptPath = $request->HoldingTaxReceiptPath;
        if ($SolidWastePath) {
            $HoldingTaxReceiptPathName = time() . '.' . $HoldingTaxReceiptPath->getClientOriginalName();
            $request->HoldingTaxReceiptPath->move('UploadFiles', $HoldingTaxReceiptPathName);
            $hostel->HoldingTaxReceiptPath = 'UploadFiles/' . $HoldingTaxReceiptPathName;
        }
        // Holding Tax Receipt Path
        $hostel->save();

        return back()->with('message', 'Successfully Updated');

    }

    public function hostelWorkflowUpdate(Request $request)
    {
        $data = Hostel::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'Lodge')->get();
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

    public function hostelOutboxView()
    {
        $name = Auth::user()->name;
        $data = Hostel::where('CurrentUser', '<>', $name)->get();
        return view('admin.Hostel.hostelOutbox', ['hostels' => $data]);
    }

    public function hostelOutboxUpdateView($id)
    {
        $data = Hostel::find($id);
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
            ->leftJoin("hostels", "hostels.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('hostels.id', $id)
            ->get();

        $array = array(
            'hostel' => $data,
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
        );
        return View::make('admin.Hostel.updateHostelOutbox')->with($array);
    }
    // Approved
    public function hostelApprovedView()
    {
        $data = Hostel::where('Approved', '-1')->get();
        return view('admin.Hostel.hostelApproved', ['hostels' => $data]);
    }

    public function updateHostelApprovedView($id)
    {
        $data = Hostel::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hostels", "hostels.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('hostels.id', $id)
            ->get();
        $array = array(
            'hostel' => $data,
            'comments' => $comments,
        );
        return view('admin.Hostel.updateHostelApproved')->with($array);
    }
    // Approved

    // Rejected
    public function hostelRejectedView()
    {
        $data = Hostel::where('Rejected', '-1')->get();
        return view('admin.Hostel.hostelRejected', ['hostels' => $data]);
    }

    public function updateHostelRejectedView($id)
    {
        $data = Hostel::find($id);
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hostels", "hostels.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('hostels.id', $id)
            ->get();
        $array = array(
            'hostel' => $data,
            'comments' => $comments,
        );
        return view('admin.Hostel.updateHostelRejected')->with($array);
    }
    // Rejected
}
