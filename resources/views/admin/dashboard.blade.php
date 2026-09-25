@extends('layouts.admin_cms')

@section('header_title', 'Overview Dashboard')

@section('content')

    <style>
        .hover-row {
            transition: background 0.2s ease;
        }
        .hover-row:hover {
            background-color: #f8fafc;
        }
        .kpi-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
        }
        .kpi-card-1 { border-bottom: 4px solid var(--admin-primary); }
        .kpi-card-2 { border-bottom: 4px solid var(--admin-green); }
        .kpi-card-3 { border-bottom: 4px solid #f59e0b; }
    </style>

    <!-- Top KPI Cards -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 30px;">
        
        <!-- Registrations -->
        <div class="card kpi-card kpi-card-1" style="margin-bottom: 0; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
            <div style="position: absolute; top: -15px; right: -15px; width: 80px; height: 80px; background: rgba(0, 168, 150, 0.05); border-radius: 50%;"></div>
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                <div style="color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Total Registrations</div>
                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0, 168, 150, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-users" style="color: var(--admin-primary); font-size: 1.1rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 700; color: var(--admin-sidebar);">{{ $registrationCount }}</div>
            <div style="font-size: 0.8rem; color: var(--admin-primary); margin-top: 5px; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> Active Attendees</div>
        </div>

        <!-- Submissions -->
        <div class="card kpi-card kpi-card-2" style="margin-bottom: 0; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
            <div style="position: absolute; top: -15px; right: -15px; width: 80px; height: 80px; background: rgba(164, 198, 57, 0.05); border-radius: 50%;"></div>
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                <div style="color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Paper Submissions</div>
                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(164, 198, 57, 0.15); display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-file-pdf" style="color: var(--admin-green); font-size: 1.1rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 700; color: var(--admin-sidebar);">{{ $submissionCount }}</div>
            <div style="font-size: 0.8rem; color: var(--admin-green); margin-top: 5px; font-weight: 500;"><i class="fa-solid fa-check-circle"></i> Under Review</div>
        </div>

        <!-- Revenue -->
        <div class="card kpi-card kpi-card-3" style="margin-bottom: 0; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
            <div style="position: absolute; top: -15px; right: -15px; width: 80px; height: 80px; background: rgba(245, 158, 11, 0.05); border-radius: 50%;"></div>
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                <div style="color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Est. Revenue (INR)</div>
                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-indian-rupee-sign" style="color: #f59e0b; font-size: 1.1rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 700; color: var(--admin-sidebar);">{{ number_format($totalRevenue) }}</div>
            <div style="font-size: 0.8rem; color: #f59e0b; margin-top: 5px; font-weight: 500;"><i class="fa-solid fa-wallet"></i> Gross Processing</div>
        </div>

    </div>

    <!-- Charts and Activity Row -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 30px;">
        
        <!-- Chart Section -->
        <div class="card" style="margin-bottom: 0;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 1.1rem; color: var(--admin-sidebar);">Registration Breakdown</h3>
                <span style="font-size: 0.8rem; color: #64748b; background: #f1f5f9; padding: 4px 10px; border-radius: 12px; font-weight: 600; white-space: nowrap;">By Category</span>
            </div>
            <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="registrationChart"></canvas>
            </div>
        </div>

        <!-- Quick Links / Status -->
        <div class="card" style="margin-bottom: 0; background: linear-gradient(135deg, var(--admin-primary) 0%, #0369a1 100%); color: #fff; border: none; box-shadow: 0 15px 35px rgba(0, 168, 150, 0.2);">
            <h3 style="font-size: 1.1rem; color: #fff; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-bolt" style="color: var(--admin-primary);"></i> Quick Actions
            </h3>
            
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <a href="{{ route('admin.registrations') }}" style="background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; padding: 12px 15px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; transition: background 0.2s;">
                    <span style="font-weight: 500; font-size: 0.95rem;">Manage Registrations</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.8rem; color: var(--admin-primary);"></i>
                </a>
                <a href="{{ route('admin.submissions') }}" style="background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; padding: 12px 15px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; transition: background 0.2s;">
                    <span style="font-weight: 500; font-size: 0.95rem;">Review Abstracts</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.8rem; color: var(--admin-primary);"></i>
                </a>
                <a href="/" target="_blank" style="background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; padding: 12px 15px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; transition: background 0.2s;">
                    <span style="font-weight: 500; font-size: 0.95rem;">Preview Live Site</span>
                    <i class="fa-solid fa-external-link-alt" style="font-size: 0.8rem; color: var(--admin-primary);"></i>
                </a>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
                <div style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 5px;">Server Status</div>
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 600; color: #fff;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--admin-green); box-shadow: 0 0 10px var(--admin-green);"></div>
                    Online & Secure
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Tables Row -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        
        <!-- Recent Registrations -->
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 1.1rem; color: var(--admin-sidebar);">Recent Registrations</h3>
                <a href="{{ route('admin.registrations') }}" style="color: var(--admin-primary); text-decoration: none; font-size: 0.85rem; font-weight: 600;">View All</a>
            </div>
            @if(count($recentRegistrations) > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <tbody>
                            @foreach($recentRegistrations as $reg)
                                <tr class="hover-row" style="border-bottom: 1px solid var(--admin-border);">
                                    <td style="padding: 12px 5px;">
                                        <div style="font-weight: 600; color: var(--admin-sidebar); font-size: 0.95rem;">{{ $reg->name }}</div>
                                        <div style="font-size: 0.8rem; color: #64748b;">{{ $reg->organization }}</div>
                                    </td>
                                    <td style="padding: 12px 5px; text-align: right;">
                                        <div style="font-weight: 700; color: var(--admin-primary); font-size: 0.9rem;">{{ $reg->reg_category }} INR</div>
                                        <div style="font-size: 0.75rem; color: #94a3b8;">{{ $reg->created_at->diffForHumans() }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: #94a3b8; font-size: 0.9rem; text-align: center; padding: 20px 0;">No registrations yet.</p>
            @endif
        </div>

        <!-- Recent Submissions -->
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 1.1rem; color: var(--admin-sidebar);">Recent Abstracts</h3>
                <a href="{{ route('admin.submissions') }}" style="color: var(--admin-primary); text-decoration: none; font-size: 0.85rem; font-weight: 600;">View All</a>
            </div>
            @if(count($recentSubmissions) > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <tbody>
                            @foreach($recentSubmissions as $sub)
                                <tr class="hover-row" style="border-bottom: 1px solid var(--admin-border);">
                                    <td style="padding: 12px 5px;">
                                        <div style="font-weight: 600; color: var(--admin-sidebar); font-size: 0.95rem;">{{ $sub->name }}</div>
                                        <div style="font-size: 0.8rem; color: #64748b;"><i class="fa-solid fa-microscope" style="color: var(--admin-primary); margin-right: 4px;"></i> {{ $sub->track }}</div>
                                    </td>
                                    <td style="padding: 12px 5px; text-align: right;">
                                        <span style="background: rgba(17, 35, 64, 0.08); color: var(--admin-sidebar); padding: 3px 8px; border-radius: 12px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">{{ $sub->interested_in }}</span>
                                        <div style="font-size: 0.75rem; color: #94a3b8; margin-top: 4px;">{{ $sub->created_at->diffForHumans() }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: #94a3b8; font-size: 0.9rem; text-align: center; padding: 20px 0;">No submissions yet.</p>
            @endif
        </div>

    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('registrationChart').getContext('2d');
            
            // Data passed from controller
            const chartData = @json($regByCategory);
            
            // Extract labels (prices/categories) and data (counts)
            const labels = Object.keys(chartData).map(k => k + ' INR');
            const data = Object.values(chartData);

            if(labels.length === 0) {
                // Dummy data if empty
                labels.push('Early Bird', 'Regular', 'On-Site');
                data.push(0, 0, 0);
            }

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Registrations',
                        data: data,
                        backgroundColor: [
                            '#00A896', // Primary Teal
                            '#112340', // Navy Dark
                            '#A4C639', // Green
                            '#f59e0b', // Amber
                            '#3b82f6'  // Blue
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: "'Poppins', sans-serif",
                                    size: 12
                                },
                                color: '#64748b'
                            }
                        }
                    }
                }
            });
        });
    </script>

@endsection
