<?php

namespace Spatie\Harvest\Enums;

enum AccessRole: string
{
    case Administrator = 'administrator';
    case Manager = 'manager';
    case Member = 'member';

    // Additional roles for users with the "manager" role
    case ProjectCreator = 'project_creator';
    case BillableRatesManager = 'billable_rates_manager';
    case ManagedProjectsInvoiceDrafter = 'managed_projects_invoice_drafter';
    case ManagedProjectsInvoiceManager = 'managed_projects_invoice_manager';
    case ClientAndTaskManager = 'client_and_task_manager';
    case TimeAndExpensesManager = 'time_and_expenses_manager';
    case EstimatesManager = 'estimates_manager';
}
