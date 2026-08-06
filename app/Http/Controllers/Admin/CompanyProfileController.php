<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $company = CompanyProfile::first();

        return view('admin.company-profile.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tentang' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $company = CompanyProfile::first();

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($validated);

        return redirect()->route('admin.company-profile.edit')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
