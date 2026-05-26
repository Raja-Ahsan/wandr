<?php

use App\Yantrana\Components\User\Models\User;
use App\Yantrana\Components\User\Models\UserAuthorityModel;
use App\Yantrana\Components\User\Models\UserProfile;
use App\Yantrana\Components\User\Repositories\ManageUserRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /** Admin role id in `user_roles` table */
    const ADMIN_ROLE_ID = 1;

    const ADMIN_EMAIL = 'admin@gmail.com';

    const ADMIN_USERNAME = 'admin';

    const ADMIN_PASSWORD = 'Admin@123';

    /**
     * Create or update the default admin user.
     *
     * @return void
     */
    public function run()
    {
        $manageUserRepository = app(ManageUserRepository::class);

        DB::transaction(function () use ($manageUserRepository) {
            $user = User::where('email', self::ADMIN_EMAIL)
                ->orWhere('username', self::ADMIN_USERNAME)
                ->first();

            if ($user) {
                $user->email = self::ADMIN_EMAIL;
                $user->username = self::ADMIN_USERNAME;
                $user->password = bcrypt(self::ADMIN_PASSWORD);
                $user->status = 1;
                $user->first_name = $user->first_name ?: 'Wandr';
                $user->last_name = $user->last_name ?: 'Admin';
                $user->save();

                $this->command->info('Existing user updated: '.self::ADMIN_EMAIL);
            } else {
                $user = $manageUserRepository->storeUser([
                    'email' => self::ADMIN_EMAIL,
                    'username' => self::ADMIN_USERNAME,
                    'password' => self::ADMIN_PASSWORD,
                    'status' => 1,
                    'first_name' => 'Wandr',
                    'last_name' => 'Admin',
                    'designation' => 'Administrator',
                    'mobile_number' => '0000000000',
                ]);

                if (! $user) {
                    throw new \RuntimeException('Failed to create admin user.');
                }

                $this->command->info('Admin user created: '.self::ADMIN_EMAIL);
            }

            $authority = UserAuthorityModel::where('users__id', $user->_id)->first();

            if ($authority) {
                $authority->status = 1;
                $authority->user_roles__id = self::ADMIN_ROLE_ID;
                $authority->save();
            } else {
                $created = $manageUserRepository->storeUserAuthority([
                    'user_id' => $user->_id,
                    'user_roles__id' => self::ADMIN_ROLE_ID,
                ]);

                if (! $created) {
                    throw new \RuntimeException('Failed to assign admin role.');
                }
            }

            $profile = UserProfile::where('users__id', $user->_id)->first();

            if (! $profile) {
                $profile = new UserProfile;
                $profile->assignInputsAndSave(
                    [
                        'users__id' => $user->_id,
                        'is_verified' => 1,
                        'status' => 1,
                        'gender' => 1,
                    ],
                    ['users__id', 'is_verified', 'status', 'gender']
                );
            } else {
                $profile->status = 1;
                $profile->is_verified = 1;
                $profile->save();
            }

            $this->command->info('Admin role assigned (user_roles__id = '.self::ADMIN_ROLE_ID.').');
            $this->command->line('Login: /user/login');
            $this->command->line('Email: '.self::ADMIN_EMAIL);
            $this->command->line('Password: '.self::ADMIN_PASSWORD);
            $this->command->line('Admin panel: /admin');
        });
    }
}
