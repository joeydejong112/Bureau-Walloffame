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
            $user->save();
            $user->roles()->attach(Role::where('name', 'user')->first());

            $admin = new User;
            $admin->name = 'Neo Ighodaro';
            $admin->email = 'admin@admin.nl';
            $admin->password = bcrypt('admin');
            $admin->save();
            $admin->roles()->attach(Role::where('name', 'admin')->first());
        }
    }