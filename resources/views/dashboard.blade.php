<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2>Welcome, {{ $user->name }}!</h2>
    <p>Email: {{ $user->email }}</p>

    @if (!Auth::user()->is_approved)
        <div class="alert alert-warning">
            Your account is awaiting admin approval.
        </div>
    @else

    <!-- Bootstrap Tabs -->
    <ul class="nav nav-tabs mt-4" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="membership-tab" data-bs-toggle="tab" data-bs-target="#membership" type="button" role="tab">
                Membership
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pelatih-tab" data-bs-toggle="tab" data-bs-target="#pelatih" type="button" role="tab">
                Jadwal Pelatih
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3">
        <!-- Membership Tab -->
        <div class="tab-pane fade show active" id="membership" role="tabpanel">
            <!-- Membership Registration -->
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Register for Membership</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('membership.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="membership_type" class="form-label">Membership Type:</label>
                            <select class="form-control" name="membership_type" required>
                                <option value="daily">Daily (Rp 20,000/day)</option>
                                <option value="monthly">Monthly (Rp 150,000/month)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration:</label>
                            <input type="number" name="duration" min="1" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Membership Request</button>
                    </form>
                </div>
            </div>

            <!-- Membership History -->
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Your Membership History</h4>
                </div>
                <div class="card-body">
                    @if($memberships->isEmpty())
                        <p>No memberships found.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Total Price</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($memberships as $membership)
                                    <tr>
                                        <td>{{ ucfirst($membership->membership_type) }}</td>
                                        <td>{{ $membership->duration }} {{ $membership->membership_type == 'daily' ? 'Days' : 'Months' }}</td>
                                        <td>Rp {{ number_format($membership->total_price, 0, ',', '.') }}</td>
                                        <td>{{ $membership->start_date ? \Carbon\Carbon::parse($membership->start_date)->format('d M Y') : '-' }}</td>
                                        <td>{{ $membership->end_date ? \Carbon\Carbon::parse($membership->end_date)->format('d M Y') : '-' }}</td>
                                        <td>
                                            @if ($membership->approved)
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>


        <!-- Jadwal Pelatih Tab -->
        <div class="tab-pane fade" id="pelatih" role="tabpanel">
            <h4 class="mt-3">Jadwal Pelatih</h4>

            @if($jadwalPelatih->isEmpty())
                <p>Your assigned coach has no schedule yet.</p>
            @else
                <p><strong>Nama Pelatih:</strong> {{ $user->pelatih->Nama }}</p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalPelatih as $jadwal)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($jadwal->Tanggal)->format('d M Y') }}</td>
                                <td>{{ $jadwal->JamMulai }}</td>
                                <td>{{ $jadwal->JamSelesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>

    @endif
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
