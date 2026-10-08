@extends('layouts.admin_cms')

@section('header_title', 'Conference Registrations')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <div>
                <h3 style="font-size: 1.25rem; color: var(--admin-sidebar); margin-bottom: 4px;">All Registrations</h3>
                <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Comprehensive CRM of delegates registered for GOHC 2026</p>
            </div>
            <div style="display: flex; gap: 12px; align-items: center;">
                <span style="background: rgba(0, 168, 150, 0.15); color: #006b5f; padding: 6px 16px; border-radius: 20px; font-weight: 700; font-size: 0.9rem;">
                    Total Registrations: {{ count($registrations) }}
                </span>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap;">
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">ID</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Delegate Info</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Affiliation / Location</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Type / Presentation</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Category / Fee</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Documents</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem;">Date</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($registrations) > 0)
                        @foreach($registrations as $reg)
                            @php
                                $formData = is_array($reg->form_data) ? $reg->form_data : (is_string($reg->form_data) ? json_decode($reg->form_data, true) : []);
                                $regType = $reg->registration_type ?? ($formData['registration_type'] ?? 'Participation');
                                $presType = $formData['presentation_event_type'] ?? null;
                                $track = $formData['presentation_track'] ?? null;
                                $abstractFile = $reg->abstract_file ?? ($formData['abstract_file'] ?? null);
                                $idCardFile = $formData['id_card_file'] ?? null;
                                $category = $reg->category_name ?? ($formData['category_name'] ?? 'Delegate');
                                $totalFee = (float)($reg->total_amount ?: ($reg->reg_category ?: 0));
                            @endphp
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background 0.2s;">
                                <td style="padding: 15px; color: var(--admin-text); font-weight: 700;">{{ $loop->iteration }}</td>
                                <td style="padding: 15px;">
                                    <div style="font-weight: 700; color: var(--admin-sidebar); font-size: 0.98rem;">
                                        {{ $reg->title ? $reg->title . ' ' : '' }}{{ $reg->name }}
                                        @if(!empty($formData['gender']))
                                            <span style="font-size: 0.75rem; color: #64748b; font-weight: 600; background: #f1f5f9; padding: 2px 6px; border-radius: 4px; margin-left: 4px;">({{ $formData['gender'] }})</span>
                                        @endif
                                    </div>
                                    <div style="font-size: 0.85rem; color: #475569; margin-top: 3px;">
                                        {{ $reg->email }}
                                    </div>
                                    <div style="font-size: 0.85rem; color: #475569;">
                                        {{ $reg->phone ?: 'N/A' }}
                                    </div>
                                </td>
                                <td style="padding: 15px; color: var(--admin-text);">
                                    <div style="font-weight: 600; color: #1e293b;">{{ $reg->organization ?: 'N/A' }}</div>
                                    @if(!empty($reg->city) || !empty($reg->country))
                                        <div style="font-size: 0.82rem; color: #64748b; margin-top: 2px;">
                                            {{ implode(', ', array_filter([$reg->city, $reg->country])) }}
                                            @if(!empty($reg->postal_code)) ({{ $reg->postal_code }}) @endif
                                        </div>
                                    @endif
                                </td>
                                <td style="padding: 15px;">
                                    @if($regType === 'Presentation')
                                        <span style="background: rgba(0, 168, 150, 0.15); color: #006b5f; padding: 4px 10px; border-radius: 12px; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; display: inline-block;">
                                            Presentation
                                        </span>
                                        @if($presType)
                                            <div style="font-size: 0.82rem; color: #0284c7; font-weight: 700; margin-top: 4px;">
                                                • {{ $presType }}
                                            </div>
                                        @endif
                                    @else
                                        <span style="background: rgba(17, 35, 64, 0.08); color: var(--admin-sidebar); padding: 4px 10px; border-radius: 12px; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; display: inline-block;">
                                            Participation
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 15px;">
                                    <div style="font-weight: 700; color: #0f172a; font-size: 0.9rem;">{{ $category }}</div>
                                    <div style="font-size: 0.85rem; color: #00a896; font-weight: 800; margin-top: 2px;">
                                        {{ number_format($totalFee) }} INR
                                    </div>
                                </td>
                                <td style="padding: 15px;">
                                    <div style="display: flex; gap: 6px; align-items: center; flex-wrap: wrap;">
                                        @if($idCardFile)
                                            <span title="ID Card Uploaded" style="background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 700; display: inline-block;">
                                                ID Card
                                            </span>
                                        @endif
                                        @if($abstractFile)
                                            <span title="Abstract Document Uploaded" style="background: #f0fdf4; color: #15803d; padding: 3px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 700; display: inline-block;">
                                                Abstract
                                            </span>
                                        @endif
                                        @if(!empty($formData['payment_receipt_file']))
                                            <span title="Payment Receipt Uploaded" style="background: #fef3c7; color: #b45309; padding: 3px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 700; display: inline-block;">
                                                Receipt
                                            </span>
                                        @endif
                                        @if(!$idCardFile && !$abstractFile && empty($formData['payment_receipt_file']))
                                            <span style="color: #94a3b8; font-size: 0.8rem;">None</span>
                                        @endif
                                    </div>
                                </td>
                                <td style="padding: 15px; font-size: 0.85rem; color: var(--admin-text);">{{ $reg->created_at->format('M d, Y') }}</td>
                                <td style="padding: 15px; text-align: center;">
                                    <div style="display: flex; gap: 8px; justify-content: center;">
                                        <button class="btn view-btn" 
                                            data-reg="{{ json_encode($reg) }}"
                                            data-date="{{ $reg->created_at->format('M d, Y h:i A') }}"
                                            style="background: #00a896; color: #ffffff; padding: 7px 14px; border-radius: 6px; border: none; cursor: pointer; font-weight: 700; font-size: 0.85rem; display: inline-flex; align-items: center;">
                                            View CRM
                                        </button>
                                        <button type="button" onclick="openDeleteModal('{{ route('admin.registrations.destroy', $reg->id) }}')" class="btn" style="background: #fee2e2; color: #ef4444; border: none; padding: 7px 12px; border-radius: 6px; cursor: pointer; transition: background 0.3s; font-weight: 700; font-size: 0.82rem;" onmouseover="this.style.background='#fca5a5'" onmouseout="this.style.background='#fee2e2'" title="Delete">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 60px 30px; color: var(--admin-text);">
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
        <div class="crm-modal-container" id="modalContainer">
            <div class="crm-modal-header">
                <h3><i class="fa-solid fa-id-card-clip" style="margin-right: 10px; color: #00a896;"></i> Delegate Registration CRM</h3>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <button type="button" class="crm-modal-close" onclick="toggleFullScreenModal()" title="Toggle Full Screen" style="font-size: 0.9rem; padding: 6px 12px; border-radius: 6px; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer; color: #fff; border: none;">
                        <i class="fa-solid fa-expand" id="fsIcon"></i> <span style="font-weight: 600;">Full Screen</span>
                    </button>
                    <button type="button" class="crm-modal-close" onclick="closeModal()" style="font-size: 1.4rem; padding: 4px 8px; cursor: pointer; color: #fff; background: none; border: none;"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="crm-modal-body">
                <div class="crm-detail-grid">
                    
                    <!-- 1. Header Banner -->
                    <div class="crm-detail-item crm-full-width" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; padding: 22px 28px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                        <div>
                            <div style="font-size: 0.8rem; color: #00a896; text-transform: uppercase; font-weight: 800; letter-spacing: 1px; margin-bottom: 4px;">Registered Delegate</div>
                            <h4 style="color: #ffffff; margin: 0 0 6px 0; font-size: 1.8rem; font-weight: 800;" id="m-name">Dr. John Doe</h4>
                            <div style="color: #cbd5e1; font-size: 1.05rem; font-weight: 500;">
                                <i class="fa-regular fa-building" style="margin-right: 8px; color: #00a896;"></i> <span id="m-org">University</span>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Registration Date</div>
                            <div id="m-date" style="font-size: 1.05rem; font-weight: 700; color: #f8fafc;">-</div>
                            <div id="m-badge-type" style="margin-top: 8px;"></div>
                        </div>
                    </div>

                    <!-- 2. Personal Information Section -->
                    <div class="crm-detail-item crm-full-width" style="border-bottom: 1px solid var(--admin-border); padding-bottom: 10px; margin-top: 5px;">
                        <h4 style="font-size: 1.15rem; font-weight: 800; color: var(--admin-sidebar); margin: 0; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-user-check" style="color: #00a896;"></i> Personal & Contact Information
                        </h4>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Email Address</div>
                        <div class="crm-detail-value" id="m-email" style="font-size: 1.05rem; font-weight: 600; color: #0a192f;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Phone Number</div>
                        <div class="crm-detail-value" id="m-phone" style="font-size: 1.05rem; font-weight: 600; color: #0a192f;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Gender</div>
                        <div class="crm-detail-value" id="m-gender" style="font-size: 1.05rem;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Location (City, Country)</div>
                        <div class="crm-detail-value" id="m-location" style="font-size: 1.05rem;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Postal Code</div>
                        <div class="crm-detail-value" id="m-postal" style="font-size: 1.05rem;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Selected Category</div>
                        <div class="crm-detail-value" id="m-category" style="font-size: 1.05rem; font-weight: 700; color: #00a896;">-</div>
                    </div>

                    <!-- 3. Conference & Presentation Details -->
                    <div class="crm-detail-item crm-full-width" style="border-bottom: 1px solid var(--admin-border); padding-bottom: 10px; margin-top: 15px;">
                        <h4 style="font-size: 1.15rem; font-weight: 800; color: var(--admin-sidebar); margin: 0; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-microphone-lines" style="color: #00a896;"></i> Presentation & Event Information
                        </h4>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Registration Type</div>
                        <div class="crm-detail-value" id="m-type">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Presentation Event Type</div>
                        <div class="crm-detail-value" id="m-pres-type" style="font-weight: 700; color: #0284c7;">-</div>
                    </div>
                    <div class="crm-detail-item crm-full-width">
                        <div class="crm-detail-label">Selected Conference Track</div>
                        <div class="crm-detail-value" id="m-track" style="font-size: 1rem; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #e2e8f0;">-</div>
                    </div>

                    <!-- 4. Proof of Eligibility (ID Card) Card -->
                    <div class="crm-detail-item crm-full-width" style="background: #f0f9ff; padding: 22px 25px; border-radius: 12px; border: 1.5px solid #bae6fd; margin-top: 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
                            <div class="crm-detail-label" style="color: #0369a1; font-size: 0.95rem; margin: 0; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-id-card" style="font-size: 1.1rem;"></i> Proof of Eligibility (Institutional ID Card)
                            </div>
                            <div id="m-idcard-actions"></div>
                        </div>
                        <div id="m-idcard-content" style="margin-top: 10px;">-</div>
                    </div>

                    <!-- 5. Abstract Document Card -->
                    <div class="crm-detail-item crm-full-width" style="background: #f0fdfa; padding: 22px 25px; border-radius: 12px; border: 1.5px solid #99f6e4; margin-top: 5px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
                            <div class="crm-detail-label" style="color: #0f766e; font-size: 0.95rem; margin: 0; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-file-circle-check" style="font-size: 1.1rem;"></i> Abstract Document
                            </div>
                            <div id="m-document-actions"></div>
                        </div>
                        <div id="m-document-content" style="margin-top: 10px;">-</div>
                    </div>

                    <!-- 6. Payment Receipt Card -->
                    <div class="crm-detail-item crm-full-width" style="background: #fffbeb; padding: 22px 25px; border-radius: 12px; border: 1.5px solid #fde68a; margin-top: 5px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
                            <div class="crm-detail-label" style="color: #b45309; font-size: 0.95rem; margin: 0; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-file-invoice-dollar" style="font-size: 1.1rem;"></i> Payment Receipt / Transaction Screenshot
                            </div>
                            <div id="m-receipt-actions"></div>
                        </div>
                        <div id="m-receipt-content" style="margin-top: 10px;">-</div>
                    </div>

                    <!-- 7. Payment & Verification Section -->
                    <div class="crm-detail-item crm-full-width" style="border-top: 2px solid var(--admin-border); padding-top: 20px; margin-top: 10px;">
                        <h4 style="font-size: 1.15rem; font-weight: 800; color: var(--admin-sidebar); margin: 0 0 15px 0; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-receipt" style="color: #00a896;"></i> Payment & Transaction Verification
                        </h4>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Base / Category Fee</div>
                        <div class="crm-detail-value" id="m-fee" style="font-size: 1.15rem; font-weight: 700;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Transaction / Reference ID</div>
                        <div class="crm-detail-value" style="font-size: 1.1rem; font-weight: 700; color: #0284c7;" id="m-txnid">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Total Amount Calculated</div>
                        <div class="crm-detail-value" style="color: #00a896; font-weight: 800; font-size: 1.35rem;" id="m-total">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        tbody tr:hover { background-color: #f8fafc; }
        .crm-modal-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(17, 35, 64, 0.85); z-index: 1000; backdrop-filter: blur(6px);
            align-items: center; justify-content: center; padding: 20px;
        }
        .crm-modal-container {
            background: #fff; border-radius: 16px; width: 95vw; max-width: 1200px;
            height: 90vh; max-height: 92vh; display: flex; flex-direction: column;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            animation: slideUp 0.3s ease; transition: all 0.3s ease; overflow: hidden;
        }
        .crm-modal-container.is-fullscreen {
            width: 99vw; height: 98vh; max-width: 99vw; max-height: 98vh; border-radius: 8px;
        }
        .crm-modal-header {
            padding: 20px 30px; border-bottom: 1px solid var(--admin-border); display: flex;
            justify-content: space-between; align-items: center; background: var(--admin-sidebar);
            color: #fff; flex-shrink: 0;
        }
        .crm-modal-header h3 { color: #fff; margin: 0; font-size: 1.35rem; font-weight: 700; display: flex; align-items: center; }
        .crm-modal-close {
            background: none; border: none; color: rgba(255,255,255,0.85);
            cursor: pointer; transition: all 0.2s;
        }
        .crm-modal-close:hover { color: #fff; background: rgba(255,255,255,0.25) !important; }
        .crm-modal-body { padding: 30px 35px; flex: 1; overflow-y: auto; }
        .crm-detail-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; }
        .crm-detail-item { margin-bottom: 6px; }
        .crm-detail-label {
            font-size: 0.82rem; color: #64748b; text-transform: uppercase;
            font-weight: 800; letter-spacing: 0.6px; margin-bottom: 4px;
        }
        .crm-detail-value { font-size: 1.05rem; color: var(--admin-sidebar); font-weight: 600; }
        .crm-full-width { grid-column: 1 / -1; }
        @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>

    <div class="crm-modal-overlay" id="deleteModal" style="z-index: 1050;">
        <div class="crm-modal-container" style="max-width: 400px; text-align: center; padding: 40px 30px; height: auto;">
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
        const isLocal = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
        
        function toggleFullScreenModal() {
            const container = document.getElementById('modalContainer');
            const icon = document.getElementById('fsIcon');
            if (container.classList.contains('is-fullscreen')) {
                container.classList.remove('is-fullscreen');
                icon.classList.remove('fa-compress');
                icon.classList.add('fa-expand');
            } else {
                container.classList.add('is-fullscreen');
                icon.classList.remove('fa-expand');
                icon.classList.add('fa-compress');
            }
        }

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
                const formData = (typeof reg.form_data === 'object' && reg.form_data !== null) ? reg.form_data : {};
                
                // Name & Salutation
                const title = reg.title || formData.title || '';
                const name = reg.name || formData.name || 'Delegate';
                document.getElementById('m-name').innerText = (title ? title + ' ' : '') + name;
                document.getElementById('m-org').innerText = reg.organization || formData.organization || 'N/A';
                
                // Contact info
                document.getElementById('m-email').innerHTML = reg.email ? `<a href="mailto:${reg.email}" style="color: #00a896; text-decoration: none;"><i class="fa-regular fa-envelope"></i> ${reg.email}</a>` : 'N/A';
                document.getElementById('m-phone').innerHTML = reg.phone ? `<a href="tel:${reg.phone}" style="color: #00a896; text-decoration: none;"><i class="fa-solid fa-phone"></i> ${reg.phone}</a>` : 'N/A';
                document.getElementById('m-gender').innerText = formData.gender || 'Not Specified';
                
                // Location
                const city = reg.city || formData.city || '';
                const country = reg.country || formData.country || '';
                const locParts = [city, country].filter(Boolean);
                document.getElementById('m-location').innerText = locParts.length > 0 ? locParts.join(', ') : 'N/A';
                document.getElementById('m-postal').innerText = reg.postal_code || formData.postal_code || 'N/A';
                
                // Category
                const catName = reg.category_name || formData.category_name || 'Delegate';
                document.getElementById('m-category').innerText = catName;
                
                // Registration & Presentation Type
                const regType = reg.registration_type || formData.registration_type || 'Participation';
                const presType = formData.presentation_event_type || 'N/A';
                const track = formData.presentation_track || 'N/A';
                
                document.getElementById('m-type').innerHTML = `<span style="background: ${regType === 'Presentation' ? 'rgba(0, 168, 150, 0.15)' : 'rgba(17, 35, 64, 0.1)'}; color: ${regType === 'Presentation' ? '#006b5f' : 'var(--admin-sidebar)'}; padding: 5px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 800; text-transform: uppercase;">${regType}</span>`;
                document.getElementById('m-badge-type').innerHTML = `<span style="background: ${regType === 'Presentation' ? '#00a896' : '#334155'}; color: #fff; padding: 4px 12px; border-radius: 15px; font-size: 0.78rem; font-weight: 700; text-transform: uppercase;">${regType}</span>`;
                
                document.getElementById('m-pres-type').innerText = regType === 'Presentation' ? presType : 'N/A (Participation Only)';
                document.getElementById('m-track').innerText = regType === 'Presentation' ? track : 'N/A';

                // Proof of Eligibility (ID Card)
                const idCardFile = formData.id_card_file || reg.id_card_file;
                if (idCardFile) {
                    const cleanIdPath = idCardFile.replace(/^public\//, '').replace(/^storage\//, '');
                    const idFileUrl = '{{ url("storage-file") }}/' + encodeURI(cleanIdPath);
                    const directIdUrl = '{{ asset("storage") }}/' + encodeURI(cleanIdPath);
                    const isIdPdf = cleanIdPath.toLowerCase().endsWith('.pdf');
                    const isIdDoc = /\.(doc|docx)$/i.test(cleanIdPath);
                    const idOriginalName = formData.id_card_original_name || cleanIdPath.split('/').pop().replace(/^\d+_id_/, '');

                    document.getElementById('m-idcard-actions').innerHTML = `
                        <div style="display: flex; gap: 8px;">
                            <a href="${idFileUrl}" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; background: #0284c7; color: #fff; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Full View
                            </a>
                            <a href="${idFileUrl}" download="${idOriginalName}" style="display: inline-flex; align-items: center; gap: 6px; background: #e0f2fe; color: #0369a1; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-download"></i> Download ID
                            </a>
                        </div>
                    `;

                    if (isIdPdf) {
                        document.getElementById('m-idcard-content').innerHTML = `
                            <iframe src="${idFileUrl}" style="width: 100%; height: 350px; border: 1px solid #cbd5e1; border-radius: 8px; background: #fff;"></iframe>
                        `;
                    } else if (isIdDoc) {
                        document.getElementById('m-idcard-content').innerHTML = `
                            <div style="padding: 25px; text-align: center; background: #fff; border-radius: 8px; border: 1px solid #cbd5e1;">
                                <i class="fa-solid fa-file-word" style="font-size: 2.5rem; color: #2563eb; margin-bottom: 8px; display: block;"></i>
                                <div style="font-weight: 700; font-size: 0.95rem; color: #1e293b;">${idOriginalName}</div>
                                <a href="${idFileUrl}" download="${idOriginalName}" style="display: inline-flex; align-items: center; gap: 6px; background: #0284c7; color: #fff; padding: 7px 16px; border-radius: 6px; font-size: 0.85rem; font-weight: 700; text-decoration: none; margin-top: 10px;">
                                    <i class="fa-solid fa-download"></i> Download Document
                                </a>
                            </div>
                        `;
                    } else {
                        document.getElementById('m-idcard-content').innerHTML = `
                            <div style="text-align: center; background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #cbd5e1;">
                                <a href="${idFileUrl}" target="_blank" title="Click to view full image">
                                    <img src="${idFileUrl}" alt="Institutional ID Card" onerror="this.onerror=null; this.src='${directIdUrl}';" style="max-height: 280px; max-width: 100%; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); display: inline-block; cursor: pointer;">
                                </a>
                                <div style="font-size: 0.82rem; color: #64748b; margin-top: 8px;">File: ${idOriginalName}</div>
                            </div>
                        `;
                    }
                } else {
                    document.getElementById('m-idcard-actions').innerHTML = '';
                    document.getElementById('m-idcard-content').innerHTML = '<span style="color: #94a3b8; font-size: 0.95rem;">No ID Card Uploaded</span>';
                }

                // Abstract Document
                const abstractFile = reg.abstract_file || formData.abstract_file;
                if (abstractFile) {
                    const cleanAbsPath = abstractFile.replace(/^public\//, '').replace(/^storage\//, '');
                    const absFileUrl = '{{ url("storage-file") }}/' + encodeURI(cleanAbsPath);
                    const isAbsPdf = cleanAbsPath.toLowerCase().endsWith('.pdf');
                    const absOriginalName = formData.abstract_original_name || cleanAbsPath.split('/').pop().replace(/^\d+_/, '');

                    document.getElementById('m-document-actions').innerHTML = `
                        <div style="display: flex; gap: 8px;">
                            <a href="${absFileUrl}" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; background: #00a896; color: #fff; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Full View
                            </a>
                            <a href="${absFileUrl}" download="${absOriginalName}" style="display: inline-flex; align-items: center; gap: 6px; background: #ccfbf1; color: #0f766e; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-download"></i> Download Abstract
                            </a>
                        </div>
                    `;

                    let iframeContent = isAbsPdf 
                        ? `<iframe src="${absFileUrl}" style="width: 100%; height: 450px; border: none; display: block; background: #fff;"></iframe>`
                        : (!isLocal 
                            ? `<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=${encodeURIComponent(absFileUrl)}" style="width: 100%; height: 450px; border: none; display: block; background: #fff;"></iframe>`
                            : `<div style="padding: 30px; text-align: center; color: #475569; background: #fff;"><i class="fa-solid fa-file-word" style="font-size: 3rem; color: #2563eb; margin-bottom: 12px; display: block;"></i><p style="font-weight: 700; font-size: 1.05rem; margin-bottom: 6px;">Word Document (.doc / .docx)</p><p style="font-size: 0.88rem; color: #64748b; margin-bottom: 15px;">Direct Word preview is supported on live server via Office Viewer. Download to inspect locally.</p><a href="${absFileUrl}" download="${absOriginalName}" style="display: inline-flex; align-items: center; gap: 8px; background: #00a896; color: #fff; padding: 8px 18px; border-radius: 6px; text-decoration: none; font-weight: 700; font-size: 0.9rem;"><i class="fa-solid fa-download"></i> Download File</a></div>`
                          );

                    document.getElementById('m-document-content').innerHTML = `
                        <div style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; background: #f8fafc;">
                            <div style="background: #0f172a; color: #fff; padding: 8px 15px; font-size: 0.85rem; font-weight: 700; display: flex; align-items: center; justify-content: space-between;">
                                <span><i class="fa-solid fa-file-lines" style="margin-right: 6px; color: #00a896;"></i> ${absOriginalName}</span>
                            </div>
                            ${iframeContent}
                        </div>
                    `;
                } else {
                    document.getElementById('m-document-actions').innerHTML = '';
                    document.getElementById('m-document-content').innerHTML = '<span style="color: #94a3b8; font-size: 0.95rem;">No Abstract Document Uploaded</span>';
                }

                // Payment Receipt Document
                const receiptFile = formData.payment_receipt_file;
                if (receiptFile) {
                    const cleanRecPath = receiptFile.replace(/^public\//, '').replace(/^storage\//, '');
                    const recFileUrl = '{{ url("storage-file") }}/' + encodeURI(cleanRecPath);
                    const directRecUrl = '{{ asset("storage") }}/' + encodeURI(cleanRecPath);
                    const isRecPdf = cleanRecPath.toLowerCase().endsWith('.pdf');
                    const isRecDoc = /\.(doc|docx)$/i.test(cleanRecPath);
                    const recOriginalName = formData.payment_receipt_original_name || cleanRecPath.split('/').pop().replace(/^\d+_receipt_/, '');

                    document.getElementById('m-receipt-actions').innerHTML = `
                        <div style="display: flex; gap: 8px;">
                            <a href="${recFileUrl}" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; background: #d97706; color: #fff; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Full View
                            </a>
                            <a href="${recFileUrl}" download="${recOriginalName}" style="display: inline-flex; align-items: center; gap: 6px; background: #fef3c7; color: #b45309; padding: 6px 14px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none;">
                                <i class="fa-solid fa-download"></i> Download Receipt
                            </a>
                        </div>
                    `;

                    if (isRecPdf) {
                        document.getElementById('m-receipt-content').innerHTML = `
                            <iframe src="${recFileUrl}" style="width: 100%; height: 350px; border: 1px solid #cbd5e1; border-radius: 8px; background: #fff;"></iframe>
                        `;
                    } else if (isRecDoc) {
                        document.getElementById('m-receipt-content').innerHTML = `
                            <div style="padding: 25px; text-align: center; background: #fff; border-radius: 8px; border: 1px solid #cbd5e1;">
                                <i class="fa-solid fa-file-word" style="font-size: 2.5rem; color: #2563eb; margin-bottom: 8px; display: block;"></i>
                                <div style="font-weight: 700; font-size: 0.95rem; color: #1e293b;">${recOriginalName}</div>
                                <a href="${recFileUrl}" download="${recOriginalName}" style="display: inline-flex; align-items: center; gap: 6px; background: #d97706; color: #fff; padding: 7px 16px; border-radius: 6px; font-size: 0.85rem; font-weight: 700; text-decoration: none; margin-top: 10px;">
                                    <i class="fa-solid fa-download"></i> Download Document
                                </a>
                            </div>
                        `;
                    } else {
                        document.getElementById('m-receipt-content').innerHTML = `
                            <div style="text-align: center; background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #cbd5e1;">
                                <a href="${recFileUrl}" target="_blank" title="Click to view full image">
                                    <img src="${recFileUrl}" alt="Payment Receipt Screenshot" onerror="this.onerror=null; this.src='${directRecUrl}';" style="max-height: 320px; max-width: 100%; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); display: inline-block; cursor: pointer;">
                                </a>
                                <div style="font-size: 0.82rem; color: #64748b; margin-top: 8px;">File: ${recOriginalName}</div>
                            </div>
                        `;
                    }
                } else {
                    document.getElementById('m-receipt-actions').innerHTML = '';
                    document.getElementById('m-receipt-content').innerHTML = '<span style="color: #94a3b8; font-size: 0.95rem;">No Payment Receipt Uploaded</span>';
                }
                
                // Fees & Transaction
                let baseFee = parseFloat(reg.total_amount) || parseInt(reg.reg_category) || 0;
                document.getElementById('m-fee').innerText = baseFee > 0 ? (baseFee.toLocaleString() + ' INR') : 'N/A';
                
                const txnId = formData.transaction_id || reg.payment_method || 'N/A';
                document.getElementById('m-txnid').innerText = txnId;
                document.getElementById('m-total').innerText = baseFee > 0 ? (baseFee.toLocaleString() + ' INR') : 'N/A';
                document.getElementById('m-date').innerText = date || 'N/A';

                modal.style.display = 'flex';
            });
        });
    </script>
@endsection