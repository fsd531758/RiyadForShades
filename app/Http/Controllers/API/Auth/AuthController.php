<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    //login
    public function login()
    {
        $data = request()->username;

        $fieldType = filter_var($data, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [$fieldType => $data, 'password' => \request()->password, 'status' => 1];

        if (!$token = auth('api')->attempt($credentials)) {
            return failureResponse( 'Unauthorized');
        }
        return successResponse('success', ['token' => $token, 'user' => \auth('api')->user()]);
    }

    //logout
    public function logout()
    {
        auth('api')->logout();
        auth('api')->invalidate();
        return successResponse(1, 'success');
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    //register
    public function register(Request $request)
    {
        try {
            $validator = $request->except(['profile_image']);
            $default_img = 'default-profile-image.png';

            if ($request->has('profile_image')) {
                $image = $request->profile_image->store('profile_images');
                $validator['profile_image'] = $image;
            }
            $validator['profile_image'] = $default_img;

            $user = User::create($validator);
            $token = JWTAuth::fromUser($user);
            return successResponse('success', ['token' => $token, 'user' => $user]);
        } catch (\Exception $e) {
            return failureResponse( 'error', __('message.something_wrong'));
        }

    }

    //update
    public function update(Request $request)
    {
        try {
            $user = auth('api')->user();
            if (!$user)
                return failureResponse(0, __('message.user_not_registered'));
            $request->merge([
                'id' => $user->id
            ]);

            $validator = $request->except(['profile_image']);

            if ($request->has('profile_image')) {
                $image_path = public_path('uploads/');
                if (File::exists($image_path . $user->getRawOriginal('profile_image'))) {
                    File::delete($image_path . $user->getRawOriginal('profile_image'));
                }
                $image = $request->profile_image->store('profile_images');
                $validator['profile_image'] = $image;
            }

            $user->update($validator);
            $get_user = $user->refresh();

            return successResponse('success', $get_user);
        } catch (\Exception $e) {
            DB::rollBack();
            return failureResponse( 'error', __('message.something_wrong'));
        }
    }

    // change password
    public function changePassword(Request $request)
    {
        try {
            $user = auth('api')->user();
            $check_pass = Hash::check($request->oldPassword, $user->password);

            if ($check_pass) {
                $user->update([
                    'password' => $request->new_password,
                ]);
                return successResponse('success');
            }
            return failureResponse( 'error');
        } catch (\Exception $e) {
            return failureResponse('error', $e->getMessage());
        }
    }

    //
    private function userInForgotPassword($request)
    {
        $user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        return $user;
    }

    //forget password
    public function forgetPassword(Request $request)
    {
        try {
            $user = $this->userInForgotPassword($request);
            $verification_code = mt_rand(132546, 978564);
            DB::table('forget_password')->insert(['user_id' => $user->id, 'verification_code' => $verification_code]);

//            $details = [
//                'name' => $user->first_name . ' ' . $user->last_name,
//                'nickname' => $user->nickname,
//                'verification_code' => $verification_code
//            ];
//
//            Mail::to($user->email)->send(new APIForgetPasswordMail($details));
            return successResponse('success', 'please check your email');
        } catch (\Exception $e) {
            DB::rollBack();
            return failureResponse('error', __('message.something_wrong'));
        }
    }

    // reset forgotten password
    public function resetForgottenPassword(Request $request)
    {
        try {
            $user = $this->userInForgotPassword($request);
            $check_verification = DB::table('forget_password')->where('user_id', $user->id)
                ->where('verification_code', $request->verification_code)->first();
            if ($check_verification) {
                $user->update([
                    'password' => $request->new_password
                ]);
                return successResponse('success', __('message.updated_successfully'));
            }
            return failureResponse( 'error', 'verification code or email is wrong');
        } catch (\Exception $e) {
            DB::rollBack();
            return failureResponse( 'error', __('message.something_wrong'));
        }
    }

    //profile
    public function profile()
    {
        try {
            $user = auth('api')->user();
            return successResponse( 'success', $user);
        }catch (\Exception $e) {
            DB::rollBack();
            return failureResponse('error', __('message.something_wrong'));
        }
    }
}
