<?php
namespace App\Http\Controllers\Traits;

use App\Models\Agency;
use App\Models\User;
use App\Models\Param;
use App\Models\ParamString;
use App\Models\Workflow;
use App\Models\WorkflowCandidate;
use App\Models\WorkflowTrack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use datetime;

trait Agencies
{
    public function indexView()
    {
        $entiryType = ParamString::where('ParamCategoryID', '17')->get();
        return view('user.agency', ['entityTypes' => $entiryType]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "entityType" => "required",
            "entityName" => "required",
        ]);
        $agency = new Agency;
        $newID = new Param();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();

        $agency->RenewalID = $newID->getNewRenewalID('AG');
        $agency->ApplicationDate = date("Y-m-d");
        $agency->EntityType = $request->entityType;
        $agency->EntityName = $request->entityName;
        $agency->Address = $request->address;
        $agency->MobileNo = $request->mobile;
        $agency->Telephone = $request->telephone;
        $agency->Fax = $request->fax;
        $agency->Email = $request->email;
        $agency->PANNo = $request->pan;
        $agency->GSTNo = $request->gstNo;
        $agency->EntityName = $request->entityName;
        $agency->Blacklisted = $request->blacklisted;
        $agency->PendingCourtCase = $request->pendingCourtCase;
        $agency->PendingAmount = $request->pendingAmount;
        $agency->EntityName = $request->entityName;
        $agency->Director1Name = $request->director1Name;
        $agency->Director2Name = $request->director2Name;
        $agency->Director3Name = $request->director3Name;
        $agency->Director4Name = $request->director4Name;
        $agency->Director1Mobile = $request->director1Mobile;
        $agency->Director2Mobile = $request->director2Mobile;
        $agency->Director3Mobile = $request->director3Mobile;
        $agency->Director4Mobile = $request->director4Mobile;
        $agency->Director1Email = $request->director1Email;
        $agency->Director2Email = $request->director2Email;
        $agency->Director3Email = $request->director3Email;
        $agency->Director4Email = $request->director4Email;
        $agency->Director1Email = $request->director1Email;

        $agency->CurrentUser = $workflowInitiator->Initiator;
        $agency->Initiator = $workflowInitiator->Initiator;

        // Upload Files
            // GST PATH
            $GSTPath = $request->gstPhoto;
            if ($GSTPath) {
                $GSTPathName = time() . '.' . $GSTPath->getClientOriginalName();
                $request->gstPhoto->move('UploadFiles', $GSTPathName);
                $agency->GSTPath = 'UploadFiles/' . $GSTPathName;
            }
            // GST PATH
            // IT RETURN PATH 1
            $ITReturnPath1=$request->itReturnPhoto1;
            if ($ITReturnPath1) {
                $ITReturnPath1Name = time() . '.' . $ITReturnPath1->getClientOriginalName();
                $request->itReturnPhoto1->move('UploadFiles', $ITReturnPath1Name);
                $agency->ITReturnPath1 = 'UploadFiles/' . $ITReturnPath1Name;
            }
            // IT RETURN PATH 1
            // IT RETURN PATH 2
            $ITReturnPath2=$request->itReturnPhoto2;
            if ($ITReturnPath2) {
                $ITReturnPath2Name = time() . '.' . $ITReturnPath2->getClientOriginalName();
                $request->itReturnPhoto2->move('UploadFiles', $ITReturnPath2Name);
                $agency->ITReturnPath2 = 'UploadFiles/' . $ITReturnPath2Name;
            }
            // IT RETURN PATH 2
            // PAN NO PATH
            $panPath=$request->panNo;
            if($panPath){
                $panPathName=time().'.'.$panPath->getClientOriginalName();
                $request->panNo->move('UploadFiles/',$panPathName);
                $agency->PANNoPath = 'UploadFiles/' . $panPathName;
            }
            // PAN NO PATH
            // AFFIDIFIT PATH
            $AffidifitPath=$request->affidifitPhoto;
            if($AffidifitPath){
                $AffidifitPathName=time().'.'.$AffidifitPath->getClientOriginalName();
                $request->affidifitPhoto->move('UploadFiles/', $AffidifitPathName);
                $agency->AffidavitPath = 'UploadFiles/' . $AffidifitPathName;
            }
            // AFFIDIFIT PATH
            // DIRECTOR 1 AADHAR PATH
            $Director1AadharPath=$request->director1Aadhar;
            if($Director1AadharPath){
                $Director1AadharPathName=time().'.'.$Director1AadharPath->getClientOriginalName();
                $request->director1Aadhar->move('UploadFiles/', $Director1AadharPathName);
                $agency->Director1AadharPath = 'UploadFiles/' . $Director1AadharPathName;
            }
            // DIRECTOR 1 AADHAR PATH
            // DIRECTOR 2 AADHAR PATH
            $Director2AadharPath=$request->director2Aadhar;
            if($Director2AadharPath){
                $Director2AadharPathName=time().'.'.$Director2AadharPath->getClientOriginalName();
                $request->director2Aadhar->move('UploadFiles/', $Director2AadharPathName);
                $agency->Director2AadharPath = 'UploadFiles/' . $Director2AadharPathName;
            }
            // DIRECTOR 2 AADHAR PATH
            // DIRECTOR 3 AADHAR PATH
            $Director3AadharPath=$request->director3Aadhar;
            if($Director3AadharPath){
                $Director3AadharPathName=time().'.'.$Director3AadharPath->getClientOriginalName();
                $request->director3Aadhar->move('UploadFiles/', $Director3AadharPathName);
                $agency->Director3AadharPath = 'UploadFiles/' . $Director3AadharPathName;
            }
            // DIRECTOR 3 AADHAR PATH
            // DIRECTOR 4 AADHAR PATH
            $Director4AadharPath=$request->director4Aadhar;
            if($Director4AadharPath){
                $Director4AadharPathName=time().'.'.$Director4AadharPath->getClientOriginalName();
                $request->director4Aadhar->move('UploadFiles/', $Director4AadharPathName);
                $agency->Director4AadharPath = 'UploadFiles/' . $Director4AadharPathName;
            }
            // DIRECTOR 4 AADHAR PATH
        // Upload Files
        $agency->save();
        return back()->with('success', 'Successfully Saved the Record');
    }

    public function agencyInbox(){
        $name = Auth::user()->name;
        $data = Agency::where('CurrentUser', $name)->get();
        $array = array('agencies' => $data);
        return View::make('admin.agency.inbox')->with($array);
    }

    public function updateInboxView($id){
        $data = Agency::find($id);
        $username = Auth::user()->name;
        $entiryType = ParamString::where('ParamCategoryID', '17')->get();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("agencies", "agencies.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('agencies.id', $id)
            ->get();

        $array= array(
            'agency'=>$data,
            'workflowInitiator'=>$workflowInitiator,
            'workflows'=>$WorkFlow,
            'comments'=>$comments,
            'entityTypes'=>$entiryType
        );
        return View::make('admin.agency.updateInbox')->with($array);
    }

    public function editAgency($request){
       // dd($request->all());
        $agency=Agency::find($request->id);
        $agency->EntityType = $request->entityType;
        $agency->EntityName = $request->entityName;
        $agency->Address = $request->address;
        $agency->MobileNo = $request->mobile;
        $agency->Telephone = $request->telephone;
        $agency->Fax = $request->fax;
        $agency->Email = $request->email;
        $agency->PANNo = $request->pan;
        $agency->GSTNo = $request->gstNo;
        $agency->EntityName = $request->entityName;
        $agency->Blacklisted = $request->blacklisted;
        $agency->PendingCourtCase = $request->pendingCourtCase;
        $agency->PendingAmount = $request->pendingAmount;
        $agency->EntityName = $request->entityName;
        $agency->Director1Name = $request->director1Name;
        $agency->Director2Name = $request->director2Name;
        $agency->Director3Name = $request->director3Name;
        $agency->Director4Name = $request->director4Name;
        $agency->Director1Mobile = $request->director1Mobile;
        $agency->Director2Mobile = $request->director2Mobile;
        $agency->Director3Mobile = $request->director3Mobile;
        $agency->Director4Mobile = $request->director4Mobile;
        $agency->Director1Email = $request->director1Email;
        $agency->Director2Email = $request->director2Email;
        $agency->Director3Email = $request->director3Email;
        $agency->Director4Email = $request->director4Email;
        $agency->Director1Email = $request->director1Email;

        // Upload Files
            // GST PATH
            $GSTPath = $request->gstPhoto;
            if ($GSTPath) {
                $GSTPathName = time() . '.' . $GSTPath->getClientOriginalName();
                $request->gstPhoto->move('UploadFiles', $GSTPathName);
                $agency->GSTPath = 'UploadFiles/' . $GSTPathName;
            }
            // GST PATH
            // IT RETURN PATH 1
            $ITReturnPath1=$request->itReturnPhoto1;
            if ($ITReturnPath1) {
                $ITReturnPath1Name = time() . '.' . $ITReturnPath1->getClientOriginalName();
                $request->itReturnPhoto1->move('UploadFiles', $ITReturnPath1Name);
                $agency->ITReturnPath1 = 'UploadFiles/' . $ITReturnPath1Name;
            }
            // IT RETURN PATH 1
            // IT RETURN PATH 2
            $ITReturnPath2=$request->itReturnPhoto2;
            if ($ITReturnPath2) {
                $ITReturnPath2Name = time() . '.' . $ITReturnPath2->getClientOriginalName();
                $request->itReturnPhoto2->move('UploadFiles', $ITReturnPath2Name);
                $agency->ITReturnPath2 = 'UploadFiles/' . $ITReturnPath2Name;
            }
            // IT RETURN PATH 2
            // PAN NO PATH
            $panPath=$request->panNo;
            if($panPath){
                $panPathName=time().'.'.$panPath->getClientOriginalName();
                $request->panNo->move('UploadFiles/',$panPathName);
                $agency->PANNoPath = 'UploadFiles/' . $panPathName;
            }
            // PAN NO PATH
            // AFFIDIFIT PATH
            $AffidifitPath=$request->affidifitPhoto;
            if($AffidifitPath){
                $AffidifitPathName=time().'.'.$AffidifitPath->getClientOriginalName();
                $request->affidifitPhoto->move('UploadFiles/', $AffidifitPathName);
                $agency->AffidavitPath = 'UploadFiles/' . $AffidifitPathName;
            }
            // AFFIDIFIT PATH
            // DIRECTOR 1 AADHAR PATH
            $Director1AadharPath=$request->director1Aadhar;
            if($Director1AadharPath){
                $Director1AadharPathName=time().'.'.$Director1AadharPath->getClientOriginalName();
                $request->director1Aadhar->move('UploadFiles/', $Director1AadharPathName);
                $agency->Director1AadharPath = 'UploadFiles/' . $Director1AadharPathName;
            }
            // DIRECTOR 1 AADHAR PATH
            // DIRECTOR 2 AADHAR PATH
            $Director2AadharPath=$request->director2Aadhar;
            if($Director2AadharPath){
                $Director2AadharPathName=time().'.'.$Director2AadharPath->getClientOriginalName();
                $request->director2Aadhar->move('UploadFiles/', $Director2AadharPathName);
                $agency->Director2AadharPath = 'UploadFiles/' . $Director2AadharPathName;
            }
            // DIRECTOR 2 AADHAR PATH
            // DIRECTOR 3 AADHAR PATH
            $Director3AadharPath=$request->director3Aadhar;
            if($Director3AadharPath){
                $Director3AadharPathName=time().'.'.$Director3AadharPath->getClientOriginalName();
                $request->director3Aadhar->move('UploadFiles/', $Director3AadharPathName);
                $agency->Director3AadharPath = 'UploadFiles/' . $Director3AadharPathName;
            }
            // DIRECTOR 3 AADHAR PATH
            // DIRECTOR 4 AADHAR PATH
            $Director4AadharPath=$request->director4Aadhar;
            if($Director4AadharPath){
                $Director4AadharPathName=time().'.'.$Director4AadharPath->getClientOriginalName();
                $request->director4Aadhar->move('UploadFiles/', $Director4AadharPathName);
                $agency->Director4AadharPath = 'UploadFiles/' . $Director4AadharPathName;
            }
            // DIRECTOR 4 AADHAR PATH
        // Upload Files
        $agency->save();
        return back()->with('success','You have successfully updated the record');
    }

    // Comment
    public function workflowComment(Request $request){
        $comment = new WorkflowTrack();
        $name = Auth::user()->name;
        $comment->RenewalID = $request->RenewalID;
        $comment->TrackDate = new DateTime();
        $comment->UserID = $name;
        $comment->Remarks = $request->comments;
        $comment->save();
    }
    // Comment

    public function agencyWorkflowUpdate(Request $request){
        $data = Agency::find($request->id);
        $workflowID = Workflow::where('WorkflowName', 'AgencyAdvertisement')->get();
        if ($request->forward) {
            $data->CurrentUser = $request->forward;
        }

        $data->ApplicationStatus = $request->AppStatus;

        /*udpate status */
        if ($request->UpdateStatus == 'Approved') {
            $data->Approved = '-1';
            $data->Pending = '0';
            $data->Rejected = '0';
            
            $data->Approver=Auth::user()->name;

            $user=new User;
            $user->name=$request->RenewalID;
            $user->email=$request->email;
            $user->password=Hash::make($request->mobile);
            $user->save();
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

    // OUTBOX
    public function outboxView(){
        $name = Auth::user()->name;
        $data = Agency::where('CurrentUser', '<>', $name)->get();
        return view('admin.agency.Outbox', ['agencies' => $data]);
    }
    // OUTBOX

    public function updateOutboxView($id){
        $data = Agency::find($id);
        $username = Auth::user()->name;
        $entiryType = ParamString::where('ParamCategoryID', '17')->get();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("agencies", "agencies.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('agencies.id', $id)
            ->get();

        $array= array(
            'agency'=>$data,
            'workflowInitiator'=>$workflowInitiator,
            'workflows'=>$WorkFlow,
            'comments'=>$comments,
            'entityTypes'=>$entiryType
        );
        return View::make('admin.agency.updateOutbox')->with($array);
    }

    public function agencyApprovedView(){
        $data = Agency::where('Approved', '-1')->get();
        return view('admin.agency.approved', ['agencies' => $data]);
    }

    public function updateApprovedView($id){
        $data = Agency::find($id);
        $username = Auth::user()->name;
        $entiryType = ParamString::where('ParamCategoryID', '17')->get();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("agencies", "agencies.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('agencies.id', $id)
            ->get();

        $array= array(
            'agency'=>$data,
            'workflowInitiator'=>$workflowInitiator,
            'workflows'=>$WorkFlow,
            'comments'=>$comments,
            'entityTypes'=>$entiryType
        );
        return View::make('admin.agency.updateApproved')->with($array);
    }

    public function agencyRejectedView(){
        $data = Agency::where('Rejected', '-1')->get();
        return view('admin.agency.rejected', ['agencies' => $data]);
    }

    public function updateRejectedView($id){
        $data = Agency::find($id);
        $username = Auth::user()->name;
        $entiryType = ParamString::where('ParamCategoryID', '17')->get();
        $workflowInitiator = Workflow::where('WorkflowID', '4')->first();
        $WorkFlow = WorkflowCandidate::where('WorkflowID', '4')
            ->where('UserID', '<>', $username)
            ->get();
        $comments = WorkflowTrack::select(
            "workflow_tracks.Remarks",
            "workflow_tracks.UserID",
            "workflow_tracks.TrackDate"
        )
            ->leftJoin("agencies", "agencies.RenewalID", "=", "workflow_tracks.RenewalID")
            ->where('agencies.id', $id)
            ->get();

        $array= array(
            'agency'=>$data,
            'workflowInitiator'=>$workflowInitiator,
            'workflows'=>$WorkFlow,
            'comments'=>$comments,
            'entityTypes'=>$entiryType
        );
        return View::make('admin.agency.updateRejected')->with($array);
    }
}
