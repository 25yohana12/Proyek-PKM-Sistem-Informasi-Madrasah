@extends('layouts.superadmin')

@section('title', 'Admin Pendaftaran')

@section('content')
    <div class="page-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">
                    <span class="emoji">👩‍💼</span> Admin Pendaftaran Calon Siswa/i
                </h1>
                <p class="page-subtitle">Kelola data admin untuk pendaftaran calon siswa/i</p>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Content Card -->
        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-users-cog"></i>
                    Daftar Admin
                </h2>
                <div class="card-stats">
                    <span class="stat-badge">{{ count($admins) }} Admin</span>
                </div>
            </div>

            <div class="card-body">
                @if(count($admins) > 0)
                    <div class="overflow-x-auto">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Email</th>
                                    <th>Kata Sandi</th>\
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->namaAdmin }}</td>
                                        <td>{{ $admin->nip }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->sandi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-content">
                            <div class="empty-icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <h3 class="empty-title">Belum ada admin</h3>>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Page Container */
        .page-container {
            padding: 2rem;
            background: linear-gradient(135deg, #6D8D79 0%, #5a7466 100%);
            min-height: 100vh;
        }

        /* Header Styles */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .page-title .emoji {
            background: none !important;
            -webkit-text-fill-color: initial !important;
            color: initial !important;
        }

        .header-content {
            flex: 1;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 500;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* Alert Messages */
        .alert {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .alert-success {
            background: linear-gradient(135deg, #10b981, #065f46);
            color: white;
        }
        .alert-danger {
            background: linear-gradient(135deg, #ef4444, #991b1b);
            color: white;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }

        .card-title i {
            color: #6D8D79;
            font-size: 1.25rem;
        }

        .card-stats .stat-badge {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        /* Table Styling */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .custom-table thead {
            background: #f8fafc;
        }

        .custom-table th, 
        .custom-table td {
            padding: 1rem 1.25rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.9rem;
        }

        .custom-table th {
            font-weight: 700;
            color: #374151;
        }

        .custom-table tr:hover td {
            background: #f9fafb;
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6D8D79, #5a7466);
            color: white;
            box-shadow: 0 4px 15px rgba(109, 141, 121, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(109, 141, 121, 0.4);
        }

        /* Action buttons (edit/delete) */
        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .edit-btn {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .edit-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        .empty-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }
        .empty-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #94a3b8;
        }
        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }
        .empty-subtitle {
            font-size: 1rem;
            color: #64748b;
            margin: 0;
        }
    </style>
@endsection
