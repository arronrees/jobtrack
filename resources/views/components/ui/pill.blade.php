@props(['type' => '', 'job_status' => '', 'job_type' => ''])

@php
    $classes = '';
@endphp

@php

    switch ($type) {
        case 'job-status':
            if ($job_status === 'In Progress') {
                $classes .= 'bg-orange-100 text-orange-800';
            } elseif ($job_status === 'To Start') {
                $classes .= 'bg-red-100 text-red-800';
            } elseif ($job_status === 'Complete') {
                $classes .= 'bg-green-100 text-green-800';
            }
            break;

        case 'job-type':
            if ($job_type === 'Website Build') {
                $classes .= 'bg-amber-100 text-amber-800';
            } elseif ($job_type === 'Logo Design') {
                $classes .= 'bg-indigo-100 text-indigo-800';
            } elseif ($job_type === 'Website Update') {
                $classes .= 'bg-teal-100 text-teal-800';
            }
            break;

        default:
            break;
    }

@endphp

<span {{ $attributes->merge(['class' => "px-2 py-1 rounded text-xs $classes"]) }}>{{ $slot }}</span>
