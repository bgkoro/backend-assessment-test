<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\ReceivedRepayment;
use App\Models\User;
use App\Services\LoanService;
use Carbon\Carbon;

class LoanService
{
    /**
     * Create a Loan
     *
     * @param  User  $user
     * @param  int  $amount
     * @param  string  $currencyCode
     * @param  int  $terms
     * @param  string  $processedAt
     *
     * @return Loan
     */
    public function createLoan($period)
    {
        $loanAmount = 3000;
        $interestRate = 5;
        $repaymentPeriod = $period;

        $datenow = Carbon::now();
        for($x=0; $x<$repaymentPeriod; $x++){
            $date_pay[] = Carbon::now()->addMonths($x)->format("Y-m-d");
        }

        $loanService = new LoanService();

        $monthlyPayment = $loanAmount/$repaymentPeriod;

        // Add service fee for 3 months
        $serviceFee = $monthlyPayment * 0;

        // Total repayment amount
        $totalRepayment = $loanAmount + $serviceFee;

        return view('loan', [
            'loanAmount' => $loanAmount,
            'interestRate' => $interestRate,
            'repaymentPeriod' => $repaymentPeriod,
            'monthlyPayment' => $monthlyPayment,
            'serviceFee' => $serviceFee,
            'totalRepayment' => $totalRepayment,
            'datenow' => $datenow,
            'date_pay' => $date_pay
        ]);
    }

    /**
     * Repay Scheduled Repayments for a Loan
     *
     * @param  Loan  $loan
     * @param  int  $amount
     * @param  string  $currencyCode
     * @param  string  $receivedAt
     *
     * @return ReceivedRepayment
     */
    public function repayLoan(Loan $loan, int $amount, string $currencyCode, string $receivedAt): ReceivedRepayment
    {
        //
    }

    public function calculateMonthlyPayment(float $loanAmount, float $interestRate, int $repaymentPeriod): float
    {
        $interestRate = $interestRate / 100 / 12;
        $monthlyPayment = ($loanAmount * $interestRate) / (1 - pow(1 + $interestRate, -$repaymentPeriod));
        return round($monthlyPayment, 2);
    }
}
