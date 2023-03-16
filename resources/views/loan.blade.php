<!-- resources/views/loan.blade.php -->

<h1>Loan Details</h1>

<p>Loan Amount: ${{ $loanAmount }}</p>
<p>Repayment Period: {{ $repaymentPeriod }} months</p>
@foreach ($date_pay as $datepay)
    <p>Scheduled Repayment of {{ $monthlyPayment }}$ due to {{ $datepay }}</p>
@endforeach


