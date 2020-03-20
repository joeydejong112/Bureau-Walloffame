<?php 

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;
    use App\User;
    use App\Role;

    class UserTableSeeder extends Seeder
    {

        public function run()
        {
            $user = new User;
            $user->name = 'Samuel Jackson';
            $user->email = 'joeydejong1112@gmail.com';
            $user->password = bcrypt('Snoek112');
            $user->background = 'green';
            $user->profile_image ='default.png';
            $user->opleiding = 'webdeveloper';
            $user->github = '#';
            $user->gitlab = '#';
            $user->linkedin = '#';
            $user->klas = '2md1';
            $user->about = ' test 1212121';
            $user->website = 'nog niet opgegevns';
            $user->contactemail = '523@gmail.com';
            $user->save();
            $user->roles()->attach(Role::where('name', 'user')->first());

       

            $admin = new User;
            $admin->name = 'Neo Ighodaro';
            $admin->email = 'admin@admin.nl';
            $admin->password = bcrypt('admin');
            $admin->background = 'green';
            $admin->profile_image ='default.png';
            $admin->opleiding = 'webdeveloper';
            $admin->github = '#';
            $admin->gitlab = '#';
            $admin->linkedin = '#';
            $admin->klas = '2md1';
            $admin->about = ' test 1212121';
            $admin->website = 'nog niet opgegevns';
            $admin->contactemail = '523@gmail.com';
            $admin->save();
            $admin->roles()->attach(Role::where('name', 'admin')->first());
        }
    }