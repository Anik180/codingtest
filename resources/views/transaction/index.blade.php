@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>All Transaction</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                    Add New
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Account Type</th>
                    <th scope="col">Balance</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ()
                    <tr>
                        <td></td>
                        <td></td>
                        <td>s</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf 


                        <div class="form-group">
                            <label for="transaction_type">Transaction Type</label>
                            <select class="form-control" id="transaction_type" name="transaction_type" required>
                                <option value="deposit">Deposit</option>
                                <option value="withdrawal">Withdrawal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                                placeholder="Enter Amount" required>
                        </div>

                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="number" step="0.01" class="form-control" id="fee" name="fee"
                                placeholder="Enter Fee">
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
