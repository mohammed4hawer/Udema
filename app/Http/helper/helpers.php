<?php


function statusArray()
{
    $arr = [
        '0'=>'Not Activated',
        '1'=>'Activated',
    ];
    return $arr ;
}


function userRoles()
{
    $arr =
        ['user'=>'User','admin'=>'Admin'];
    return $arr;
}

function categoryId()
{
    $arr = [
        '1'=>'IT',
        '2'=>'Programming',
        '3'=>'Design and Product',
        '4'=>'Machine Learning',
        '5'=>'Language Learning',
        '6'=>'Physical Science and Engineering',
    ];
    return $arr;
}

function courseId()
{
    $arr = [
        '1'=>'Java Programming',
        '2'=>'Python for Everybody Specialization',
        '3'=>'Data Science: Foundations using R Specialization',
        '4'=>'Game Design and Development Specialization',
        '5'=>'IT Fundamentals for Cybersecurity Specialization',
        '6'=>'Russian Language',
        '7'=>'Information & communication technology',
        '8'=>'Object Oriented Programming in Java Specialization',
        '9'=>'Data Structures and Algorithms Specialization',
    ];
    return $arr;
}
/**
 * Upload Path
 * @return string
 */
function uploadpath()
{
    return 'photos';
}

/**
 * Get Image
 * @param $filename
 * @return string
 */
function getimg($filename,$web = null)
{
    return '/storage/'.$filename;
}

/**
 * Get Image
 * @param $filename
 * @return string
 */
function getimage($filename,$web = null)
{
    return '/website/img/'.$filename;
}

/**
 * Upload an image
 * @param $img
 */
function uploader($request, $img_name)
{
    $path = \Storage::disk('public')->putFile(uploadpath(), $request->file($img_name));
    return $path;
}
