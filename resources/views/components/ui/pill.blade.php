@props(['type' => '', 'job_status' => '', 'job_type' => '', 'invoice_status' => '', 'user_role' => ''])

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

        case 'invoice-status':
            if ($invoice_status === 'Ready To Invoice') {
                $classes .= 'bg-amber-100 text-amber-800';
            } elseif ($invoice_status === 'Invoiced') {
                $classes .= 'bg-indigo-100 text-indigo-800';
            } elseif ($invoice_status === 'Paid') {
                $classes .= 'bg-green-100 text-green-800';
            }
            break;

        case 'user-role':
            if ($user_role === 'Superadmin') {
                $classes .= 'bg-indigo-100 text-indigo-800';
            } elseif ($user_role === 'Admin') {
                $classes .= 'bg-blue-100 text-blue-800';
            } elseif ($user_role === 'Editor') {
                $classes .= 'bg-amber-100 text-amber-800';
            } elseif ($user_role === 'Author') {
                $classes .= 'bg-violet-100 text-violet-800';
            } elseif ($user_role === 'Viewer') {
                $classes .= 'bg-green-100 text-green-800';
            }
            break;

        default:
            break;
    }

@endphp

<span {{ $attributes->merge(['class' => "px-2 py-1 rounded text-xs $classes"]) }}>{{ $slot }}</span>
