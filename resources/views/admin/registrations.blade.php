@extends('layouts.admin_cms')

@section('header_title', 'Conference Registrations')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar);">All Registrations</h3>
            <span style="background: rgba(0, 168, 150, 0.15); color: #006b5f; padding: 6px 15px; border-radius: 20px; font-weight: 700; font-size: 0.9rem;">Total: {{ count($registrations) }}</span>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap; table-layout: fixed;">
                <colgroup>
                    <col style="width: 8%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 15%;">
                    <col style="width: 12%;">
                    <col style="width: 15%;">
                </colgroup>
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 8%; text-align: left;">ID</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 25%; text-align: left;">Name / Email</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 25%; text-align: left;">Organization</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 15%; text-align: left;">Interested In</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 12%; text-align: left;">Date</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 15%; text-align: left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($registrations) > 0)
                        @foreach($registrations as $reg)
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background 0.2s;">
                                <td style="padding: 15px; color: var(--admin-text);">#{{ $reg->id }}</td>
                                <td style="padding: 15px;">
                                    <div style="font-weight: 600; color: var(--admin-sidebar);">{{ $reg->title }} {{ $reg->name }}</div>
                                    <div style="font-size: 0.85rem; color: var(--admin-text); margin-top: 3px;">{{ $reg->email }}</div>
                                    <div style="font-size: 0.85rem; color: var(--admin-text);">{{ $reg->phone }}</div>
                                </td>
                                <td style="padding: 15px; color: var(--admin-text);">
                                    {{ $reg->organization }}<br>
                                    <span style="font-size: 0.85rem; color: #94a3b8;">{{ $reg->city }}, {{ $reg->country }}</span>
                                </td>
                                <td style="padding: 15px;">
                                    <span style="background: rgba(17, 35, 64, 0.1); color: var(--admin-sidebar); padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">{{ $reg->interested_in }}</span>
                                </td>
                                <td style="padding: 15px; font-size: 0.85rem; color: var(--admin-text);">{{ $reg->created_at->format('M d, Y') }}</td>
                                <td style="padding: 15px;">
                                    <div style="display: flex; gap: 10px;">
                                        <button class="btn view-btn" 
                                            data-reg="{{ json_encode($reg) }}"
                                            data-date="{{ $reg->created_at->format('M d, Y H:i A') }}">
                                            <i class="fa-solid fa-eye"></i> View
                                        </button>
                                        <button type="button" onclick="openDeleteModal('{{ route('admin.registrations.destroy', $reg->id) }}')" class="btn" style="background: #fee2e2; color: #ef4444; border: none; padding: 8px 15px; border-radius: 6px; cursor: pointer; transition: background 0.3s; font-weight: 600;" onmouseover="this.style.background='#fca5a5'" onmouseout="this.style.background='#fee2e2'">
                                            <i class="fa-regular fa-trash-can"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 60px 30px; color: var(--admin-text);">
                                <i class="fa-regular fa-folder-open" style="font-size: 3.5rem; margin-bottom: 15px; color: var(--admin-border); display: block;"></i>
                                <p style="font-size: 1.1rem; color: var(--admin-sidebar); font-weight: 500;">No registrations found yet.</p>
                                <p style="font-size: 0.9rem; color: #94a3b8;">Registrations will appear here once attendees register from the website.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- CRM Details Modal -->
    <div class="crm-modal-overlay" id="detailsModal">
        <div class="crm-modal-container">
            <div class="crm-modal-header">
                <h3>Registration Details</h3>
                <button class="crm-modal-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="crm-modal-body">
                <div class="crm-detail-grid">
                    <div class="crm-detail-item crm-full-width" style="border-bottom: 1px solid var(--admin-border); padding-bottom: 10px; margin-bottom: 20px;">
                        <h4 style="color: var(--admin-primary); margin-bottom: 5px; font-size: 1.5rem;" id="m-name">Dr. John Doe</h4>
                        <div style="color: var(--admin-text); font-size: 1rem;"><i class="fa-regular fa-building" style="margin-right: 5px;"></i> <span id="m-org">University</span></div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Email Address</div>
                        <div class="crm-detail-value" id="m-email">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Phone Number</div>
                        <div class="crm-detail-value" id="m-phone">-</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Location</div>
                        <div class="crm-detail-value" id="m-location">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Postal Code</div>
                        <div class="crm-detail-value" id="m-postal">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="border-top: 1px solid var(--admin-border); padding-top: 20px; margin-top: 5px;">
                        <div style="font-weight: 700; color: var(--admin-sidebar); margin-bottom: 15px; font-size: 1.1rem;">Conference Preferences</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Interested In</div>
                        <div class="crm-detail-value"><span style="background: rgba(17, 35, 64, 0.1); color: var(--admin-sidebar); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;" id="m-interest">-</span></div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Workshop Added</div>
                        <div class="crm-detail-value" id="m-workshop">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="border-top: 1px solid var(--admin-border); padding-top: 20px; margin-top: 5px;">
                        <div style="font-weight: 700; color: var(--admin-sidebar); margin-bottom: 15px; font-size: 1.1rem;">Payment Information</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Base Fee</div>
                        <div class="crm-detail-value" id="m-fee">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Payment Method</div>
                        <div class="crm-detail-value" style="text-transform: capitalize;" id="m-payment">-</div>
                    </div>
                    
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Total Amount Calculated</div>
                        <div class="crm-detail-value" style="color: var(--admin-primary); font-weight: 700; font-size: 1.2rem;" id="m-total">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Registration Date</div>
                        <div class="crm-detail-value" id="m-date">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        tbody tr:hover { background-color: #f8fafc; }
        .crm-modal-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(17, 35, 64, 0.7); z-index: 1000; backdrop-filter: blur(4px);
            align-items: center; justify-content: center;
        }
        .crm-modal-container {
            background: #fff; border-radius: 12px; width: 90%; max-width: 700px;
            max-height: 90vh; overflow-y: auto; box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            animation: slideUp 0.3s ease;
        }
        .crm-modal-header {
            padding: 20px 25px; border-bottom: 1px solid var(--admin-border); display: flex;
            justify-content: space-between; align-items: center; background: var(--admin-sidebar);
            color: #fff; border-radius: 12px 12px 0 0;
        }
        .crm-modal-header h3 { color: #fff; margin: 0; font-size: 1.3rem; }
        .crm-modal-close {
            background: none; border: none; color: rgba(255,255,255,0.7); font-size: 1.5rem;
            cursor: pointer; transition: color 0.2s;
        }
        .crm-modal-close:hover { color: #fff; }
        .crm-modal-body { padding: 30px; }
        .crm-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; }
        .crm-detail-item { margin-bottom: 10px; }
        .crm-detail-label {
            font-size: 0.85rem; color: #94a3b8; text-transform: uppercase;
            font-weight: 700; letter-spacing: 0.5px; margin-bottom: 5px;
        }
        .crm-detail-value { font-size: 1.05rem; color: var(--admin-sidebar); font-weight: 500; }
        .crm-full-width { grid-column: 1 / -1; }
        @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>

    <div class="crm-modal-overlay" id="deleteModal" style="z-index: 1050;">
        <div class="crm-modal-container" style="max-width: 400px; text-align: center; padding: 40px 30px;">
            <div style="color: #ef4444; font-size: 3.5rem; margin-bottom: 20px;">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <h3 style="color: var(--admin-sidebar); font-size: 1.5rem; margin-bottom: 15px;">Delete Registration?</h3>
            <p style="color: var(--admin-text); margin-bottom: 30px; font-size: 1.05rem;">Are you sure you want to delete this registration? This action cannot be undone.</p>
            
            <div style="display: flex; gap: 15px; justify-content: center;">
                <button type="button" class="btn" style="background: #f1f5f9; color: #64748b; border: none; padding: 12px 25px; border-radius: 8px; font-weight: 600; cursor: pointer; flex: 1;" onclick="closeDeleteModal()">Cancel</button>
                <form id="deleteForm" method="POST" style="flex: 1; margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="width: 100%; background: #ef4444; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-weight: 600; cursor: pointer;">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('detailsModal');
        const deleteModal = document.getElementById('deleteModal');
        
        function closeModal() {
            modal.style.display = 'none';
        }

        function openDeleteModal(url) {
            document.getElementById('deleteForm').action = url;
            deleteModal.style.display = 'flex';
        }

        function closeDeleteModal() {
            deleteModal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
            if (event.target == deleteModal) {
                closeDeleteModal();
            }
        }

        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const reg = JSON.parse(this.getAttribute('data-reg'));
                const date = this.getAttribute('data-date');
                
                document.getElementById('m-name').innerText = (reg.title || '') + ' ' + (reg.name || '');
                document.getElementById('m-org').innerText = reg.organization || 'N/A';
                document.getElementById('m-email').innerText = reg.email || 'N/A';
                document.getElementById('m-phone').innerText = reg.phone || 'N/A';
                
                const city = reg.city || 'N/A';
                const country = reg.country || 'N/A';
                document.getElementById('m-location').innerText = (city === 'N/A' && country === 'N/A') ? 'N/A' : (city + ', ' + country);
                
                document.getElementById('m-postal').innerText = reg.postal_code || 'N/A';
                
                document.getElementById('m-interest').innerText = reg.interested_in || 'N/A';
                
                let baseFee = parseInt(reg.reg_category);
                let total = isNaN(baseFee) ? 0 : baseFee;
                
                if(reg.workshop) {
                    document.getElementById('m-workshop').innerHTML = '<span style="background: rgba(164, 198, 57, 0.15); color: #627722; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Yes (+500 INR)</span>';
                    total += 500;
                } else {
                    document.getElementById('m-workshop').innerHTML = '<span style="color: #94a3b8;">No</span>';
                }
                
                document.getElementById('m-fee').innerText = !isNaN(baseFee) ? (baseFee + ' INR') : 'N/A';
                document.getElementById('m-payment').innerText = reg.payment_method || 'N/A';
                document.getElementById('m-total').innerText = total > 0 ? (total + ' INR') : 'N/A';
                document.getElementById('m-date').innerText = date || 'N/A';

                modal.style.display = 'flex';
            });
        });
    </script>
@endsection