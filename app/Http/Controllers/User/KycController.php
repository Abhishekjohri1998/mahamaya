<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kyc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KycController extends Controller
{
    public function submitkyc(Request $request){
        try {
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'dob' => 'required|date',
                'gender' => 'required|string',
                'address' => 'required|string|max:500',
                'doc_type' => 'required|string',
                'doc1' => 'required|mimes:jpg,jpeg,png,pdf|max:4000',
                'doc2' => 'required|mimes:jpg,jpeg,png,pdf|max:4000',
                'photo' => 'required|mimes:jpg,jpeg,png|max:4000',
            ]);

            $path1 = $path2 = $path3 = null;

            // Handle Document 1
            if($request->hasfile('doc1')){
                $path1 = $request->file('doc1')->store('kyc/documents', 'public');
            }

            // Handle Document 2
            if($request->hasfile('doc2')){
                $path2 = $request->file('doc2')->store('kyc/documents', 'public');
            }

            // Handle Photo
            if($request->hasfile('photo')){
                $path3 = $request->file('photo')->store('kyc/photos', 'public');
            }

            // Save to database
            $newdoc = new Kyc();
            $newdoc->firstname = $request->firstname;
            $newdoc->lastname = $request->lastname;
            $newdoc->address = $request->address;
            $newdoc->dob = $request->dob;
            $newdoc->gender = $request->gender;
            $newdoc->doc_type = $request->doc_type;
            $newdoc->doc1 = $path1;
            $newdoc->doc2 = $path2;
            $newdoc->photo = $path3;
            $newdoc->status = 'pending';
            $newdoc->user = Auth::id();
            $newdoc->save();

            Log::info('KYC submitted successfully', [
                'user_id' => Auth::id(),
                'kyc_id' => $newdoc->id
            ]);

            return redirect()->back()->with('success', "Verification documents successfully submitted and under review");

        } catch (\Exception $e) {
            Log::error('KYC submission failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Failed to submit KYC documents. Please try again.');
        }
    }
}
