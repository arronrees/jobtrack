<?php

namespace App;

enum UserRole: string
{
    case SUPERADMIN = 'Superadmin';
    case ADMIN = 'Admin';
    case EDITOR = 'Editor';
    case AUTHOR = 'Author';
    case VIEWER = 'Viewer';
}
