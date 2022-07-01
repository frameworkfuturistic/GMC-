<?php

namespace App\Repository\Hoarding;

use App\Models\Hoarding;
use App\Models\Param;
use App\Models\ParamString;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Traits\AppHelper as TraitAppHelper;

class EloquentHoardingRepository implements HoardingRepository
{
    use TraitAppHelper;

    public function __construct()
    {
        $this->menuApp();
    }

    public function newHoarding()
    {
        $licYear = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', ' 1017')
            ->get();
        $materialType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1020')
            ->get();
        $illu = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1021')
            ->get();
        $face = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1022')
            ->get();
        $hoardingType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1018')
            ->get();
        $propertyType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1019')
            ->get();

        $hoarding = Hoarding::select('RenewalID',
            'HoardingNo',
            'ApplicationDate',
            'LicenseYear',
            'Location',
            'Length',
            'Width',
            'BoardArea',
            'Landmark',
            'Face',
            'Illumination',
            'PropertyType'
        )
            ->orderBy('HoardingID', 'DESC')
            ->get();
        $array = array(
            'licYears' => $licYear,
            'materialTypes' => $materialType,
            'illus' => $illu,
            'faces' => $face,
            'hoardingTypes' => $hoardingType,
            'propertyTypes' => $propertyType,
            'hoardings' => $hoarding,
        );
        return view('admin.agencyDash.newHoarding', $array);
    }

    public function lastBill()
    {
        return view('admin.agencyDash.lastBill');
    }

    public function hoardingPayment()
    {
        return view('admin.agencyDash.hoardingPayment');
    }

    public function currentHoarding()
    {
        return view('admin.agencyDash.currentHoarding');
    }

    public function rejectedHoarding()
    {
        return view('admin.agencyDash.rejectedHoarding');
    }

    public function vendorProfile()
    {
        return view('admin.agencyDash.vendorProfile');
    }

    public function hoardingRules()
    {
        return view('admin.agencyDash.hoardingRules');
    }

    // SAVING HOARDING
    public function storeHoarding(Request $request)
    {
        // dd($request->all());

        $hoarding = new Hoarding();
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();
        $hoarding->RenewalID = $request->renewalID;
        $hoarding->ApplicationDate = Carbon::now()->format('Y-m-d');
        $hoarding->HoardingNo = $newID->getNewRenewalID('HRD');
        $hoarding->LicenseYear = $request->LicenseYear;
        // $hoarding->zone='';
        $hoarding->Location = $request->location;
        $hoarding->Longitude = $request->longitude;
        $hoarding->Latitude = $request->latitude;
        $hoarding->Length = $request->lengthOfHoarding;
        $hoarding->Width = $request->widthOfHoarding;
        $hoarding->BoardArea = $request->areaOfBoard;
        $hoarding->MaterialType = $request->materialType;
        $hoarding->Illumination = $request->illumination;
        $hoarding->Face = $request->facing;
        $hoarding->Landmark = $request->landmark;
        $hoarding->HoardingCategory = $request->hoardingType;
        $hoarding->PropertyType = $request->propertyType;
        $hoarding->OwnerName = $request->ownerName;
        $hoarding->OwnerAddress = $request->ownerAddress;
        $hoarding->OwnerCity = $request->ownerCity;
        $hoarding->OwnerPhone = $request->ownerPhone;
        $hoarding->OwnerWhatsapp = $request->ownerWhatsapp;
        
        $hoarding->CurrentUser = $workflowInitiator->Initiator;
        $hoarding->Initiator = $workflowInitiator->Initiator;
        $hoarding->WorkflowID=$workflowInitiator->WorkflowID;

        /*
        ===========================PHOTO UPLOADS============================================
         */

        // Building Permit Path
        $buildingPermitPath = $request->buildingPermitPath;
        if ($buildingPermitPath) {
            $buildingPermitPathName = time() . '.' . $buildingPermitPath->getClientOriginalName();
            $buildingPermitPath->move('UploadFiles', $buildingPermitPathName);
            $hoarding->BuildingPermitPath = 'UploadFiles/' . $buildingPermitPathName;
        }
        // Building Permit Path
        // SITE PHOTOGRAPH
        $sitePhotoPath = $request->sitePhotographPath;
        if ($sitePhotoPath) {
            $sitePhotoPathName = time() . '.' . $sitePhotoPath->getClientOriginalName();
            $sitePhotoPath->move('UploadFiles', $sitePhotoPathName);
            $hoarding->SitePhotographPath = 'UploadFiles/' . $sitePhotoPathName;
        }
        // SITE PHOTOGRAPH
        // ENGINEER CERTIFICATE PATH
        $engineerCertificatePath = $request->engineerCertificatePath;
        if ($engineerCertificatePath) {
            $engineerCertificatePathName = time() . '.' . $engineerCertificatePath->getClientOriginalName();
            $engineerCertificatePath->move('UploadFiles', $engineerCertificatePathName);
            $hoarding->EngineerCertificatePath = 'UploadFiles/' . $engineerCertificatePathName;
        }
        // ENGINEER CERTIFICATE PATH
        // AGREEMENT PATH
        $agreementPath = $request->agreementPath;
        if ($agreementPath) {
            $agreementPathName = time() . '.' . $agreementPath->getClientOriginalName();
            $agreementPath->move('UploadFiles', $agreementPathName);
            $hoarding->AgreementPath = 'UploadFiles/' . $agreementPathName;
        }
        // AGREEMENT PATH
        // GPS PHOTOGRAPH PATH
        $GPSPath = $request->GPSPath;
        if ($GPSPath) {
            $GPSPathName = time() . '.' . $GPSPath->getClientOriginalName();
            $GPSPath->move('UploadFiles', $GPSPathName);
            $hoarding->GPSPhotographPath = 'UploadFiles/' . $GPSPathName;
        }
        // GPS PHOTOGRAPH PATH
        // SKETCH PLAN PATH
        $sketchPlanPath = $request->sketchPlanPath;
        if ($sketchPlanPath) {
            $sketchPlanPathName = time() . '.' . $sketchPlanPath->getClientOriginalName();
            $sketchPlanPath->move('UploadFiles', $sketchPlanPathName);
            $hoarding->SketchPlanPath = 'UploadFiles/' . $sketchPlanPathName;
        }
        // SKETCH PLAN PATH
        // PENDING DUES PATH
        $pendingDuesPath = $request->pendingDuesPath;
        if ($pendingDuesPath) {
            $pendingDuesPathName = time() . '.' . $pendingDuesPath->getClientOriginalName();
            $pendingDuesPath->move('UploadFiles', $pendingDuesPathName);
            $hoarding->PendingDuesPath = 'UploadFiles/' . $pendingDuesPathName;
        }
        // PENDING DUES PATH
        // ARCHITECTURAL DRAWING PATH
        $architecturalDrawingPath = $request->architecturalDrawingPath;
        if ($architecturalDrawingPath) {
            $architecturalDrawingPathName = time() . '.' . $architecturalDrawingPath->getClientOriginalName();
            $architecturalDrawingPath->move('UploadFiles', $architecturalDrawingPathName);
            $hoarding->ArchitecturalDrawingPath = 'UploadFiles/' . $architecturalDrawingPathName;
        }
        // ARCHITECTURAL DRAWING PATH
        // PROCEEDING 1 PHOTO
        $proceeding1Photo = $request->proceeding1Photo;
        if ($proceeding1Photo) {
            $proceeding1PhotoName = time() . '.' . $proceeding1Photo->getClientOriginalName();
            $proceeding1Photo->move('UploadFiles', $proceeding1PhotoName);
            $hoarding->proceeding1Photo = 'UploadFiles/' . $proceeding1PhotoName;
        }
        // PROCEEDING 1 PHOTO
        // PROCEEDING 2 PHOTO
        $proceeding2Photo = $request->proceeding2Photo;
        if ($proceeding2Photo) {
            $proceeding2PhotoName = time() . '.' . $proceeding2Photo->getClientOriginalName();
            $proceeding2Photo->move('UploadFiles', $proceeding2PhotoName);
            $hoarding->proceeding2Photo = 'UploadFiles/' . $proceeding2PhotoName;
        }
        // PROCEEDING 2 PHOTO
        // EXTRA DOC 1
        $extraDoc1 = $request->extraDoc1;
        if ($extraDoc1) {
            $extraDoc1Name = time() . '.' . $extraDoc1->getClientOriginalName();
            $extraDoc1->move('UploadFiles', $extraDoc1Name);
            $hoarding->ExtraDoc1 = 'UploadFiles/' . $extraDoc1Name;
        }
        // EXTRA DOC 1
        // EXTRA DOC 2
        $extraDoc2 = $request->extraDoc2;
        if ($extraDoc2) {
            $extraDoc2Name = time() . '.' . $extraDoc2->getClientOriginalName();
            $extraDoc2->move('UploadFiles', $extraDoc2Name);
            $hoarding->ExtraDoc2 = 'UploadFiles/' . $extraDoc2Name;
        }
        // EXTRA DOC 2

        /*
        ==========================PHOTO UPLOADS =============================================
         */
        $hoarding->save();
        return back()->with('message', 'Successfully Saved the Data');
    }
    // SAVING HOARDING

    /* FOR ADMIN USED FUNCTIONS */
    // VIEW
    public function hoardingInbox(){
        $name = Auth::user()->name;
        $hoarding=Hoarding::select(
                            'HoardingID',
                            'RenewalID',
                            'ApplicationDate',
                            'HoardingNo',
                            'LicenseYear',
                            'Location',
                            'Longitude',
                            'Latitude',
                            'Length',
                            'Width',
                            'BoardArea',
                            'MaterialType'
                           )
                           ->where('CurrentUser','=',$name)
                          ->orderByDesc('HoardingID')
                          ->get();
        return view('admin.Hoarding.inbox',[
            'hoardings'=>$hoarding,
            'parents'=>$this->parent,
            'childs'=>$this->child
        ]);
    }

    public function hoardingInboxByID($id){
        $hoarding=Hoarding::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();

        // FOR FORWADING APPLICATION
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        // FOR FORWARDING APPLICATION
        $comment = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hoardings", "hoardings.HoardingNo", "=", "workflow_tracks.RenewalID")
            ->where('hoardings.HoardingID', $id)
            ->get();

        $licYear = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', ' 1017')
            ->get();
        $materialType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1020')
            ->get();
        $illu = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1021')
            ->get();
        $face = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1022')
            ->get();
        $hoardingType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1018')
            ->get();
        $propertyType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1019')
            ->get();

        $array = array(
            'licYears' => $licYear,
            'materialTypes' => $materialType,
            'illus' => $illu,
            'faces' => $face,
            'hoardingTypes' => $hoardingType,
            'propertyTypes' => $propertyType,
            'hoardings' => $hoarding,
            'workflowInitiators' => $workflowInitiator,
            'workflows' => $WorkFlow,
            'comments' => $comment,
            'parents'=>$this->parent,
            'childs'=>$this->child
        );

        // dd($hoarding);

        return view('admin.Hoarding.update-inbox',$array);
    }

    public function hoardingOutbox(){
        $name = Auth::user()->name;
        $hoarding=Hoarding::select(
                            'HoardingID',
                            'RenewalID',
                            'ApplicationDate',
                            'HoardingNo',
                            'LicenseYear',
                            'Location',
                            'Longitude',
                            'Latitude',
                            'Length',
                            'Width',
                            'BoardArea',
                            'MaterialType'
                           )
                           ->where('CurrentUser','<>',$name)
                          ->orderByDesc('HoardingID')
                          ->get();
        return view('admin.Hoarding.outbox',[
            'hoardings'=>$hoarding,
            'parents'=>$this->parent,
            'childs'=>$this->child
        ]);
    }

    public function hoardingOutboxByID($id){
        $hoarding=Hoarding::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();

        // FOR FORWADING APPLICATION
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        // FOR FORWARDING APPLICATION
        $comment = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hoardings", "hoardings.HoardingNo", "=", "workflow_tracks.RenewalID")
            ->where('hoardings.HoardingID', $id)
            ->get();

        $licYear = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', ' 1017')
            ->get();
        $materialType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1020')
            ->get();
        $illu = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1021')
            ->get();
        $face = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1022')
            ->get();
        $hoardingType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1018')
            ->get();
        $propertyType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1019')
            ->get();

        $array = array(
            'licYears' => $licYear,
            'materialTypes' => $materialType,
            'illus' => $illu,
            'faces' => $face,
            'hoardingTypes' => $hoardingType,
            'propertyTypes' => $propertyType,
            'hoardings' => $hoarding,
            'workflowInitiators' => $workflowInitiator,
            'workflows' => $WorkFlow,
            'comments' => $comment,
            'parents'=>$this->parent,
            'childs'=>$this->child
        );
        return view('admin.Hoarding.update-outbox',$array);
    }

    public function hoardingPmt(){
        return view('admin.Hoarding.pmt');
    }

    public function hoardingApproved(){
        $hoarding=Hoarding::select(
            'HoardingID',
            'RenewalID',
            'ApplicationDate',
            'HoardingNo',
            'LicenseYear',
            'Location',
            'Longitude',
            'Latitude',
            'Length',
            'Width',
            'BoardArea',
            'MaterialType'
        )
        ->where('Approved','=','-1')
        ->orderByDesc('HoardingID')
        ->get();
        return view('admin.Hoarding.approved',[
            'hoardings'=>$hoarding,
            'parents'=>$this->parent,
            'childs'=>$this->child
        ]);
    }

    public function hoardingApprovedByID($id){
        $hoarding=Hoarding::find($id);
        $username = Auth::user()->name;

        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();

        // FOR FORWADING APPLICATION
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        // FOR FORWARDING APPLICATION
        $comment = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hoardings", "hoardings.HoardingNo", "=", "workflow_tracks.RenewalID")
            ->where('hoardings.HoardingID', $id)
            ->get();

        $licYear = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', ' 1017')
            ->get();
        $materialType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1020')
            ->get();
        $illu = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1021')
            ->get();
        $face = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1022')
            ->get();
        $hoardingType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1018')
            ->get();
        $propertyType = ParamString::select('StringParameter')
            ->where('ParamCategoryID', '=', '1019')
            ->get();

        $array = array(
            'licYears' => $licYear,
            'materialTypes' => $materialType,
            'illus' => $illu,
            'faces' => $face,
            'hoardingTypes' => $hoardingType,
            'propertyTypes' => $propertyType,
            'hoardings' => $hoarding,
            'workflowInitiators' => $workflowInitiator,
            'workflows' => $WorkFlow,
            'comments' => $comment,
            'parents'=>$this->parent,
            'childs'=>$this->child
        );
        return view('admin.Hoarding.update-approved',$array);
    }

    public function hoardingRejected(){
        $hoarding=Hoarding::select(
            'HoardingID',
            'RenewalID',
            'ApplicationDate',
            'HoardingNo',
            'LicenseYear',
            'Location',
            'Longitude',
            'Latitude',
            'Length',
            'Width',
            'BoardArea',
            'MaterialType'
        )
        ->where('Rejected','=','-1')
        ->orderByDesc('HoardingID')
        ->get();
        return view('admin.Hoarding.rejected',[
            'hoardings'=>$hoarding,
            'parents'=>$this->parent,
            'childs'=>$this->child
        ]);
    }

    public function hoardingRejectedByID($id){
        $hoarding=Hoarding::find($id);
        $comment = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("hoardings", "hoardings.HoardingNo", "=", "workflow_tracks.RenewalID")
            ->where('hoardings.HoardingID', $id)
            ->get();
        $array=array(
            'hoardings'=>$hoarding,
            'comments'=>$comment,
            'parents'=>$this->parent,
            'childs'=>$this->child
        );
        return view('admin.Hoarding.update-rejected',$array);
    }
    // VIEW

    public function editHoarding(Request $request, $id){
        
        $hoarding = Hoarding::find($id);
        $hoarding->LicenseYear = $request->LicenseYear;
        $hoarding->PermissionFrom=$request->licenseFrom;
        $hoarding->PermissionTo=$request->licenseTo;
        
        $hoarding->Location = $request->location;
        $hoarding->Longitude = $request->longitude;
        $hoarding->Latitude = $request->latitude;
        $hoarding->Length = $request->lengthOfHoarding;
        $hoarding->Width = $request->widthOfHoarding;
        $hoarding->BoardArea = $request->areaOfBoard;
        $hoarding->MaterialType = $request->materialType;
        $hoarding->Illumination = $request->illumination;
        $hoarding->Face = $request->facing;
        $hoarding->Landmark = $request->landmark;
        $hoarding->HoardingCategory = $request->hoardingType;
        $hoarding->PropertyType = $request->propertyType;
        $hoarding->OwnerName = $request->ownerName;
        $hoarding->OwnerAddress = $request->ownerAddress;
        $hoarding->OwnerCity = $request->ownerCity;
        $hoarding->OwnerPhone = $request->ownerPhone;
        $hoarding->OwnerWhatsapp = $request->ownerWhatsapp;
        $hoarding->zone=$request->zone;

        $hoarding->LicenseFee=$request->licenseFee;
        $hoarding->Amount=$request->amount;
        $hoarding->GST=$request->gst;
        $hoarding->NetAmount=$request->netAmount;
        /*
        ===========================PHOTO UPLOADS============================================
         */

        // Building Permit Path
        $buildingPermitPath = $request->buildingPermitPath;
        if ($buildingPermitPath) {
            $buildingPermitPathName = time() . '.' . $buildingPermitPath->getClientOriginalName();
            $buildingPermitPath->move('UploadFiles', $buildingPermitPathName);
            $hoarding->BuildingPermitPath = 'UploadFiles/' . $buildingPermitPathName;
        }
        // Building Permit Path
        // SITE PHOTOGRAPH
        $sitePhotoPath = $request->sitePhotographPath;
        if ($sitePhotoPath) {
            $sitePhotoPathName = time() . '.' . $sitePhotoPath->getClientOriginalName();
            $sitePhotoPath->move('UploadFiles', $sitePhotoPathName);
            $hoarding->SitePhotographPath = 'UploadFiles/' . $sitePhotoPathName;
        }
        // SITE PHOTOGRAPH
        // ENGINEER CERTIFICATE PATH
        $engineerCertificatePath = $request->engineerCertificatePath;
        if ($engineerCertificatePath) {
            $engineerCertificatePathName = time() . '.' . $engineerCertificatePath->getClientOriginalName();
            $engineerCertificatePath->move('UploadFiles', $engineerCertificatePathName);
            $hoarding->EngineerCertificatePath = 'UploadFiles/' . $engineerCertificatePathName;
        }
        // ENGINEER CERTIFICATE PATH
        // AGREEMENT PATH
        $agreementPath = $request->agreementPath;
        if ($agreementPath) {
            $agreementPathName = time() . '.' . $agreementPath->getClientOriginalName();
            $agreementPath->move('UploadFiles', $agreementPathName);
            $hoarding->AgreementPath = 'UploadFiles/' . $agreementPathName;
        }
        // AGREEMENT PATH
        // GPS PHOTOGRAPH PATH
        $GPSPath = $request->GPSPath;
        if ($GPSPath) {
            $GPSPathName = time() . '.' . $GPSPath->getClientOriginalName();
            $GPSPath->move('UploadFiles', $GPSPathName);
            $hoarding->GPSPhotographPath = 'UploadFiles/' . $GPSPathName;
        }
        // GPS PHOTOGRAPH PATH
        // SKETCH PLAN PATH
        $sketchPlanPath = $request->sketchPlanPath;
        if ($sketchPlanPath) {
            $sketchPlanPathName = time() . '.' . $sketchPlanPath->getClientOriginalName();
            $sketchPlanPath->move('UploadFiles', $sketchPlanPathName);
            $hoarding->SketchPlanPath = 'UploadFiles/' . $sketchPlanPathName;
        }
        // SKETCH PLAN PATH
        // PENDING DUES PATH
        $pendingDuesPath = $request->pendingDuesPath;
        if ($pendingDuesPath) {
            $pendingDuesPathName = time() . '.' . $pendingDuesPath->getClientOriginalName();
            $pendingDuesPath->move('UploadFiles', $pendingDuesPathName);
            $hoarding->PendingDuesPath = 'UploadFiles/' . $pendingDuesPathName;
        }
        // PENDING DUES PATH
        // ARCHITECTURAL DRAWING PATH
        $architecturalDrawingPath = $request->architecturalDrawingPath;
        if ($architecturalDrawingPath) {
            $architecturalDrawingPathName = time() . '.' . $architecturalDrawingPath->getClientOriginalName();
            $architecturalDrawingPath->move('UploadFiles', $architecturalDrawingPathName);
            $hoarding->ArchitecturalDrawingPath = 'UploadFiles/' . $architecturalDrawingPathName;
        }
        // ARCHITECTURAL DRAWING PATH
        // PROCEEDING 1 PHOTO
        $proceeding1Photo = $request->proceeding1Photo;
        if ($proceeding1Photo) {
            $proceeding1PhotoName = time() . '.' . $proceeding1Photo->getClientOriginalName();
            $proceeding1Photo->move('UploadFiles', $proceeding1PhotoName);
            $hoarding->proceeding1Photo = 'UploadFiles/' . $proceeding1PhotoName;
        }
        // PROCEEDING 1 PHOTO
        // PROCEEDING 2 PHOTO
        $proceeding2Photo = $request->proceeding2Photo;
        if ($proceeding2Photo) {
            $proceeding2PhotoName = time() . '.' . $proceeding2Photo->getClientOriginalName();
            $proceeding2Photo->move('UploadFiles', $proceeding2PhotoName);
            $hoarding->proceeding2Photo = 'UploadFiles/' . $proceeding2PhotoName;
        }
        // PROCEEDING 2 PHOTO
        // EXTRA DOC 1
        $extraDoc1 = $request->extraDoc1;
        if ($extraDoc1) {
            $extraDoc1Name = time() . '.' . $extraDoc1->getClientOriginalName();
            $extraDoc1->move('UploadFiles', $extraDoc1Name);
            $hoarding->ExtraDoc1 = 'UploadFiles/' . $extraDoc1Name;
        }
        // EXTRA DOC 1
        // EXTRA DOC 2
        $extraDoc2 = $request->extraDoc2;
        if ($extraDoc2) {
            $extraDoc2Name = time() . '.' . $extraDoc2->getClientOriginalName();
            $extraDoc2->move('UploadFiles', $extraDoc2Name);
            $hoarding->ExtraDoc2 = 'UploadFiles/' . $extraDoc2Name;
        }
        // EXTRA DOC 2

        /*
        ==========================PHOTO UPLOADS =============================================
         */
        $hoarding->save();
        return back()->with('message', 'Successfully Updated the Data');

    }

    public function addComment(Request $request){
        $comment = new WorkflowTrack();
        $name = Auth::user()->name;
        $comment->RenewalID = $request->RenewalID;
        $comment->TrackDate = new DateTime();
        $comment->UserID = $name;
        $comment->Remarks = $request->comments;
        $comment->save();
    }

    public function hoardingWorkflow(Request $request){
        // dd($request->all());

        $data = Hoarding::find($request->id);
        $approver=Auth()->user()->name;
        $workflowID = Workflow::where('WorkflowName', 'AgencyAdvertisement')->get();
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

            $data->Approver=$approver;
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
    /* FOR ADMIN USED FUNCTIONS */
}
