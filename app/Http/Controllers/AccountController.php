<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function show()
    {
        return view('account.show');
    }

    public function updateGeneralInformation(Request $request)
    {
        try {
            $user = auth()->user();
            // Récupérer les données du formulaire depuis la requête
            $lastname = $request->input('lastname');
            $firstname = $request->input('firstname');
            $email = $request->input('email');
            $phone_number = $request->input('phone_number');
            $country = $request->input('country');
            $address = $request->input('address');
            $fileupload = $request->file('fileupload');
    
            $user->lastname = $lastname;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->phone_number = $phone_number;
            $user->country = $country;
            $user->address = $address;
    
            if ($fileupload) {
                try {
                    // Traiter le fichier et enregistrer son emplacement
                    $filePath = $fileupload->store('uploads', 'public');
                    $user->avatar = $filePath;
                } catch (\Exception $e) {
                    throw new \Exception('An error occurred while processing the uploaded file');
                }
            }
    
            $user->save();
    
            // Retourner une réponse JSON
            return response()->json(['success' =>true, 'message' => 'User information updated successfully']);
        } catch (\Exception $e) {
            // Gérer les autres erreurs
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

    public function updatePassword(Request $request)
    {

        $customMessages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit contenir au moins :min caractères.',
            'max' => 'Le champ :attribute doit contenir au maximum :max caractères.',
            'same' => 'Les champs :attribute et :other doivent correspondre.',
        ];
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|max:6',
            'confirmPassword' => 'required|same:newPassword',
        ], $customMessages);

        $user = auth()->user();

        // Vérifier si le mot de passe actuel correspond à celui de l'utilisateur
        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Le mot de passe actuel est incorrect',
                'errors' => [
                    'currentPassword' => 'Le mot de passe actuel est incorrect'
                ]
            ]);
        }

        // Mettre à jour le mot de passe de l'utilisateur
        $user->password = bcrypt($validatedData['newPassword']);
        $user->save();

        // Retourner une réponse JSON indiquant le succès
        return response()->json([
            'success' => true,
            'message' => 'Mot de passe mis à jour avec succès'
        ]);
    }

    public function wallet($accountCode)
    {
        $account = Account::where('account_code', $accountCode)->get();
        // return view('account.show', compact('account'));
    }
}
