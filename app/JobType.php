<?php

namespace App;

enum JobType: string
{
    case WEBSITE_UPDATE = 'Website Update';
    case WEBSITE_BUILD = 'Website Build';
    case LOGO_DESIGN = 'Logo Design';
    case GRAPHIC_DESIGN = 'Graphic Design';
    case PRINT = 'Print';
}
