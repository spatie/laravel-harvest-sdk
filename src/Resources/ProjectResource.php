<?php

namespace Spatie\Harvest\Resources;

use Carbon\CarbonImmutable;

class ProjectResource
{
    public function __construct(
        public int $id,
        public object $client,
        public string $name,
        public string $code,
        public bool $isActive,
        public bool $isBillable,
        public bool $isFixedFee,
        public string $billBy,
        public ?float $hourlyRate,
        public ?float $budget,
        public string $budgetBy,
        public bool $budgetIsMonthly,
        public bool $notifyWhenOverBudget,
        public ?float $overBudgetNotificationPercentage,
        public ?CarbonImmutable $overBudgetNotificationDate,
        public bool $showBudgetToAll,
        public ?float $costBudget,
        public bool $costBudgetIncludeExpenses,
        public ?float $fee,
        public ?string $notes,
        public ?CarbonImmutable $startsOn,
        public ?CarbonImmutable $endsOn,
        public CarbonImmutable $createdAt,
        public CarbonImmutable $updatedAt,
    ) {}

    /** @param array<string, mixed> $response */
    public static function createFromResponse(array $response): self
    {
        return new self(
            id: $response['id'],
            client: (object) $response['client'],
            name: $response['name'],
            code:  $response['code'],
            isActive: $response['is_active'],
            isBillable: $response['is_billable'],
            isFixedFee: $response['is_fixed_fee'],
            billBy: $response['bill_by'],
            hourlyRate: $response['hourly_rate'] ?? null,
            budget: $response['budget'] ?? null,
            budgetBy: $response['budget_by'],
            budgetIsMonthly: $response['budget_is_monthly'],
            notifyWhenOverBudget: $response['notify_when_over_budget'],
            overBudgetNotificationPercentage: $response['over_budget_notification_percentage'] ?? null,
            overBudgetNotificationDate: isset($response['over_budget_notification_date']) ? CarbonImmutable::parse($response['over_budget_notification_date']) : null,
            showBudgetToAll: $response['show_budget_to_all'],
            costBudget: $response['cost_budget'] ?? null,
            costBudgetIncludeExpenses: $response['cost_budget_include_expenses'],
            fee: $response['fee'] ?? null,
            notes: !empty($response['notes']) ? $response['notes'] : null,
            startsOn: isset($response['starts_on']) ? CarbonImmutable::parse($response['starts_on']) : null,
            endsOn: isset($response['ends_on']) ? CarbonImmutable::parse($response['ends_on']) : null,
            createdAt: CarbonImmutable::parse($response['created_at']),
            updatedAt: CarbonImmutable::parse($response['updated_at']),
        );
    }
}
