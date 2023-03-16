<!-- resources/views/loan.blade.php -->

<h1>Loan Details</h1>

<p>Loan Amount: ${{ $loanAmount }}</p>
<p>Repayment Period: {{ $repaymentPeriod }} months</p>
<p>Monthly Payment: ${{ $monthlyPayment }}</p>
@foreach ($date_pay as $datepay)
    <p> {{ $datepay }} </p>
@endforeach


