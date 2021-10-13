<?php

namespace App\Helpers;

class Qs
{
    public static function getTeamSA()
    {
        return ['admin', 'super_admin'];
    }

    public static function getTeamAccount()
    {
        return ['admin', 'super_admin', 'accountant'];
    }

    public static function getTeamSAT()
    {
        return ['admin', 'super_admin', 'teacher'];
    }

    public static function getTeamAcademic()
    {
        return ['admin', 'super_admin', 'teacher', 'student'];
    }

    public static function getTeamAdministrative()
    {
        return ['admin', 'super_admin', 'accountant'];
    }
    public static function userIsTeamAccount()
    {
        return in_array(Auth::user()->user_type, self::getTeamAccount());
    }

    public static function userIsTeamSA()
    {
        return in_array(Auth::user()->user_type, self::getTeamSA());
    }

    public static function userIsTeamSAT()
    {
        return in_array(Auth::user()->user_type, self::getTeamSAT());
    }

    public static function userIsAcademic()
    {
        return in_array(Auth::user()->user_type, self::getTeamAcademic());
    }

    public static function userIsAdministrative()
    {
        return in_array(Auth::user()->user_type, self::getTeamAdministrative());
    }

    public static function userIsAdmin()
    {
        return Auth::user()->user_type == 'admin';
    }

    public static function getUserType()
    {
        return Auth::user()->user_type;
    }

    public static function userIsSuperAdmin()
    {
        return Auth::user()->user_type == 'super_admin';
    }

    public static function userIsStudent()
    {
        return Auth::user()->user_type == 'student';
    }

    public static function userIsTeacher()
    {
        return Auth::user()->user_type == 'teacher';
    }

    public static function userIsParent()
    {
        return Auth::user()->user_type == 'parent';
    }

    public static function userIsStaff()
    {
        return in_array(Auth::user()->user_type, self::getStaff());
    }
    public static function getAllUserTypes($remove=[])
    {
        $data =  ['super_admin', 'admin', 'teacher', 'accountant', 'librarian', 'student', 'parent'];
        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }
    public static function userIsPTA()
    {
        return in_array(Auth::user()->user_type, self::getPTA());
    }
    public static function getSRByUserID($user_id)
    {
        return StudentRecord::where('user_id', $user_id)->first();
    }

    public static function getPTA()
    {
        return ['super_admin', 'admin', 'teacher', 'parent'];
    }
    public static function getCurrentSession()
    {
        return self::getSetting('current_session');
    }

    public static function getNextSession()
    {
        $oy = self::getCurrentSession();
        $old_yr = explode('-', $oy);
        return ++$old_yr[0].'-'.++$old_yr[1];
    }
    public static function getSystemName()
    {
        return self::getSetting('system_name');
    }
    public static function getAppCode()
    {
        return self::getSetting('system_title') ?: 'TGMA';
    }

}
