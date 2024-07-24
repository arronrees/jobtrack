<?php

namespace App;

enum JobStatus: string
{
    case IN_PROGRESS = 'In Progress';
    case COMPLETE = 'Complete';
    case TO_START = 'To Start';
}
