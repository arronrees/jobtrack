<?php

namespace App;

enum InvoiceStatus: string
{
    case READY_TO_INVOICE = 'Ready To Invoice';
    case INVOICED = 'Invoiced';
    case PAID = 'Paid';
}
