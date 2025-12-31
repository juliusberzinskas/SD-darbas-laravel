<?php

return [
    'app_title' => 'Konferencijų sistema',

    'nav' => [
        'home' => 'Pagrindinis',
        'client' => 'Klientas',
        'employee' => 'Darbuotojas',
        'admin' => 'Administratorius',
        'logout' => 'Logout',
    ],

    'common' => [
        'back' => 'Atgal',
        'none' => 'Nėra',
        'zero' => '0',
    ],

    'auth' => [
        'login_title' => 'Prisijungimas',
        'login_subtitle' => 'Prisijunkite prie sistemos.',
        'password' => 'Slaptažodis',
        'login_button' => 'Prisijungti',
        'no_account' => 'Neturite paskyros?',
        'register_link' => 'Registruotis',
        'quick_login' => 'Greitas prisijungimas (be slaptažodžio):',
        'login_as_admin' => 'Prisijungti kaip administratorius',
        'login_as_employee' => 'Prisijungti kaip darbuotojas',
],


    'home' => [
        'title' => 'Pagrindinis puslapis',
        'student' => 'Studento informacija',
        'name' => 'Vardas',
        'surname' => 'Pavardė',
        'group' => 'Grupė',
        'subsystems' => 'Posistemiai',
    ],

    'conference' => [
        'conferences' => 'Konferencijos',
        'title' => 'Pavadinimas',
        'description' => 'Aprašymas',
        'speakers' => 'Lektoriai',
        'date' => 'Data',
        'time' => 'Laikas',
        'address' => 'Adresas',
        'actions' => 'Veiksmai',
        'view' => 'Peržiūra',
        'register' => 'Registruotis',
        'create' => 'Kurti konferenciją',
        'edit' => 'Redaguoti',
        'delete' => 'Trinti',
        'save' => 'Išsaugoti',
        'update' => 'Atnaujinti',
        'cannot_delete_past' => 'Įvykusių konferencijų trinti negalima.',

        // NEW (client registration form)
        'full_name' => 'Vardas Pavardė',
        'full_name_placeholder' => 'Pvz. Jonas Jonaitis',
        'email_placeholder' => 'pvz. jonas@email.com',
    ],

    'client' => [
    'subtitle' => 'Pasirinkite konferenciją ir užsiregistruokite.',
    'details_subtitle' => 'Konferencijos informacija ir registracija.',
    'conference_info' => 'Konferencijos informacija',
    'no_conferences' => 'Šiuo metu konferencijų nėra.',
    'register_hint' => 'Po registracijos darbuotojas matys jūsų įrašą konferencijos puslapyje.',
    ],

    'employee' => [
        // NEW (employee show page)
        'registered_clients' => 'Užsiregistravę klientai',
        'no_registrations' => 'Nėra registracijų.',
        'name' => 'Vardas',
    ],

    'admin' => [
        'title' => 'Administratoriaus posistemis',
        'manage_users' => 'Naudotojų valdymas',
        'manage_conferences' => 'Konferencijų valdymas',
    ],

    'user' => [
        'users' => 'Naudotojai',
        'edit' => 'Redaguoti naudotoją',
        'first_name' => 'Vardas',
        'last_name' => 'Pavardė',
        'email' => 'El. paštas',
    ],

    'confirm' => [
        // NEW (SweetAlert delete confirm)
        'title' => 'Ar tikrai?',
        'text' => 'Šio veiksmo atšaukti negalima.',
        'confirm_button' => 'Taip, trinti',
        'cancel_button' => 'Atšaukti',
    ],
];
