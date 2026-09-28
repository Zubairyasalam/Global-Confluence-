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
                    <col style="width: 5%;">
                    <col style="width: 24%;">
                    <col style="width: 18%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 10%;">
                    <col style="width: 13%;">
                </colgroup>
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">ID</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Name / Email</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Organization</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Type</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Interested In</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Date</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($registrations) > 0)
                        @foreach($registrations as $reg)
                            @php
                                $regType = $reg->registration_type ?? ($reg->form_data['registration_type'] ?? 'Participation');
                            @endphp
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background 0.2s;">
                                <td style="padding: 15px; color: var(--admin-text);">{{ $reg->id }}</td>
                                <td style="padding: 15px;">
                                    <div style="font-weight: 600; color: var(--admin-sidebar);">{{ $reg->title }} {{ $reg->name }}</div>
                                    <div style="font-size: 0.85rem; color: var(--admin-text); margin-top: 3px;">{{ $reg->email }}</div>
                                    <div style="font-size: 0.85rem; color: var(--admin-text);">{{ $reg->phone }}</div>
                                </td>
                                <td style="padding: 15px; color: var(--admin-text);">
                                    <div style="font-weight: 500;">{{ $reg->organization ?: 'N/A' }}</div>
                                    @if(!empty($reg->city) || !empty($reg->country))
                                        <span style="font-size: 0.85rem; color: #94a3b8;">{{ implode(', ', array_filter([$reg->city, $reg->country])) }}</span>
                                    @endif
                                </td>
                                <td style="padding: 15px;">
                                    @if($regType === 'Presentation')
                                        <span style="background: rgba(0, 168, 150, 0.15); color: #006b5f; padding: 5px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; display: inline-block;">
                                            Presentation
                                        </span>
                                    @else
                                        <span style="background: rgba(17, 35, 64, 0.1); color: var(--admin-sidebar); padding: 5px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; display: inline-block;">
                                            Participation
                                        </span>
                                    @endif
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
        <div class="crm-modal-container" id="modalContainer">
            <div class="crm-modal-header">
                <h3><i class="fa-solid fa-id-card" style="margin-right: 10px; opacity: 0.8;"></i> Registration Details</h3>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <button type="button" class="crm-modal-close" onclick="toggleFullScreenModal()" title="Toggle Full Screen" style="font-size: 1.05rem; padding: 6px 10px; border-radius: 6px; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer;">
                        <i class="fa-solid fa-expand" id="fsIcon"></i> <span style="font-size: 0.8rem; font-weight: 600;">Full Screen</span>
                    </button>
                    <button type="button" class="crm-modal-close" onclick="closeModal()" style="font-size: 1.4rem; padding: 4px 8px; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="crm-modal-body">
                <div class="crm-detail-grid">
                    <div class="crm-detail-item crm-full-width" style="border-bottom: 2px solid var(--admin-border); padding-bottom: 15px; margin-bottom: 15px; background: #f8fafc; padding: 20px 25px; border-radius: 12px;">
                        <h4 style="color: var(--admin-primary); margin-bottom: 6px; font-size: 1.8rem; font-weight: 700;" id="m-name">Dr. John Doe</h4>
                        <div style="color: var(--admin-text); font-size: 1.1rem; font-weight: 500;"><i class="fa-regular fa-building" style="margin-right: 8px; color: var(--admin-primary);"></i> <span id="m-org">University</span></div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Email Address</div>
                        <div class="crm-detail-value" id="m-email" style="font-size: 1.15rem; font-weight: 600; color: #0a192f;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Phone Number</div>
                        <div class="crm-detail-value" id="m-phone" style="font-size: 1.15rem; font-weight: 600; color: #0a192f;">-</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Location</div>
                        <div class="crm-detail-value" id="m-location" style="font-size: 1.1rem;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Postal Code</div>
                        <div class="crm-detail-value" id="m-postal" style="font-size: 1.1rem;">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="border-top: 2px solid var(--admin-border); padding-top: 25px; margin-top: 10px;">
                        <div style="font-weight: 800; color: var(--admin-sidebar); margin-bottom: 15px; font-size: 1.25rem; letter-spacing: -0.3px;"><i class="fa-solid fa-sliders" style="margin-right: 8px; color: var(--admin-primary);"></i> Conference Preferences</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Interested In</div>
                        <div class="crm-detail-value"><span style="background: rgba(17, 35, 64, 0.1); color: var(--admin-sidebar); padding: 6px 16px; border-radius: 20px; font-size: 0.9rem; font-weight: 700; text-transform: uppercase;" id="m-interest">-</span></div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Registration Type</div>
                        <div class="crm-detail-value" id="m-type">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="background: #f0fdfa; padding: 20px 25px; border-radius: 12px; border: 1px solid #ccfbf1;">
                        <div class="crm-detail-label" style="color: #0f766e; font-size: 0.9rem;">Abstract Document</div>
                        <div class="crm-detail-value" id="m-document" style="margin-top: 8px;">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="border-top: 2px solid var(--admin-border); padding-top: 25px; margin-top: 10px;">
                        <div style="font-weight: 800; color: var(--admin-sidebar); margin-bottom: 15px; font-size: 1.25rem; letter-spacing: -0.3px;"><i class="fa-solid fa-credit-card" style="margin-right: 8px; color: var(--admin-primary);"></i> Payment Information</div>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Base Fee</div>
                        <div class="crm-detail-value" id="m-fee" style="font-size: 1.2rem; font-weight: 700;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Payment Method</div>
                        <div class="crm-detail-value" style="text-transform: capitalize; font-size: 1.1rem;" id="m-payment">-</div>
                    </div>
                    
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Total Amount Calculated</div>
                        <div class="crm-detail-value" style="color: var(--admin-primary); font-weight: 800; font-size: 1.4rem;" id="m-total">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Registration Date</div>
                        <div class="crm-detail-value" id="m-date" style="font-size: 1.1rem;">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        tbody tr:hover { background-color: #f8fafc; }
        .crm-modal-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(17, 35, 64, 0.8); z-index: 1000; backdrop-filter: blur(6px);
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
            padding: 22px 30px; border-bottom: 1px solid var(--admin-border); display: flex;
            justify-content: space-between; align-items: center; background: var(--admin-sidebar);
            color: #fff; flex-shrink: 0;
        }
        .crm-modal-header h3 { color: #fff; margin: 0; font-size: 1.4rem; font-weight: 700; display: flex; align-items: center; }
        .crm-modal-close {
            background: none; border: none; color: rgba(255,255,255,0.85);
            cursor: pointer; transition: all 0.2s;
        }
        .crm-modal-close:hover { color: #fff; background: rgba(255,255,255,0.25) !important; }
        .crm-modal-body { padding: 35px 40px; flex: 1; overflow-y: auto; }
        .crm-detail-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .crm-detail-item { margin-bottom: 10px; }
        .crm-detail-label {
            font-size: 0.85rem; color: #64748b; text-transform: uppercase;
            font-weight: 800; letter-spacing: 0.6px; margin-bottom: 6px;
        }
        .crm-detail-value { font-size: 1.1rem; color: var(--admin-sidebar); font-weight: 600; }
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
                
                const title = reg.title || (reg.form_data && reg.form_data.title) || '';
                const name = reg.name || (reg.form_data && reg.form_data.name) || '';
                document.getElementById('m-name').innerText = (title ? title + ' ' : '') + name;
                document.getElementById('m-org').innerText = reg.organization || (reg.form_data && reg.form_data.organization) || 'N/A';
                document.getElementById('m-email').innerText = reg.email || (reg.form_data && reg.form_data.email) || 'N/A';
                document.getElementById('m-phone').innerText = reg.phone || (reg.form_data && reg.form_data.phone) || 'N/A';
                
                const city = reg.city || (reg.form_data && reg.form_data.city) || '';
                const country = reg.country || (reg.form_data && reg.form_data.country) || '';
                const locParts = [city, country].filter(Boolean);
                document.getElementById('m-location').innerText = locParts.length > 0 ? locParts.join(', ') : 'N/A';
                
                const postal = reg.postal_code || (reg.form_data && reg.form_data.postal_code) || 'N/A';
                document.getElementById('m-postal').innerText = postal;
                
                const regType = reg.registration_type || (reg.form_data && reg.form_data.registration_type) || 'Participation';
                const abstractFile = reg.abstract_file || (reg.form_data && reg.form_data.abstract_file);
                
                document.getElementById('m-interest').innerText = reg.interested_in || 'N/A';
                document.getElementById('m-type').innerHTML = `<span style="background: ${regType === 'Presentation' ? 'rgba(0, 168, 150, 0.15)' : 'rgba(17, 35, 64, 0.1)'}; color: ${regType === 'Presentation' ? '#006b5f' : 'var(--admin-sidebar)'}; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">${regType}</span>`;

                if (abstractFile) {
                    const cleanPath = abstractFile.replace(/^storage\//, '');
                    const fileUrl = '{{ asset("storage") }}/' + cleanPath;
                    const isPdf = cleanPath.toLowerCase().endsWith('.pdf');
                    
                    // Derive clean filename
                    let displayFileName = (reg.form_data && reg.form_data.abstract_original_name) 
                        ? reg.form_data.abstract_original_name 
                        : cleanPath.split('/').pop().replace(/^\d+_/, '');
                    
                    const isLocal = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
                    
                    let viewerFrame = `<div style="margin-top: 15px; border-radius: 12px; overflow: hidden; border: 2px solid #cbd5e1; box-shadow: 0 4px 15px rgba(0,0,0,0.08); background: #f8fafc;">
                        <div style="background: #0f172a; color: #fff; padding: 10px 18px; font-size: 0.88rem; font-weight: 700; display: flex; align-items: center; justify-content: space-between;">
                            <span><i class="fa-solid fa-file-lines" style="margin-right: 8px; color: #00a896;"></i> Inline Document Preview: ${displayFileName}</span>
                            <a href="${fileUrl}" target="_blank" style="color: #20c997; text-decoration: none; font-size: 0.82rem; font-weight: 700;"><i class="fa-solid fa-expand"></i> Open Full Screen Tab</a>
                        </div>
                        <iframe src="${fileUrl}" style="width: 100%; height: 580px; border: none; display: block; background: #fff;"></iframe>
                    </div>`;

                    document.getElementById('m-document').innerHTML = `
                        <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-bottom: 10px;">
                            <a href="${fileUrl}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #00a896; color: #ffffff; padding: 10px 22px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.92rem; box-shadow: 0 4px 12px rgba(0, 168, 150, 0.3); transition: all 0.2s ease;">
                                <i class="fa-solid fa-eye" style="font-size: 1.1rem;"></i> View Document
                            </a>
                            <a href="${fileUrl}" download="${displayFileName}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(0, 168, 150, 0.12); color: #006b5f; padding: 10px 22px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.92rem; border: 1px solid rgba(0, 168, 150, 0.3); transition: all 0.2s ease;">
                                <i class="fa-solid fa-file-arrow-down" style="font-size: 1.1rem;"></i> Download Document (${displayFileName})
                            </a>
                        </div>
                        ${viewerFrame}
                    `;
                } else {
                    document.getElementById('m-document').innerHTML = '<span style="color: #94a3b8; font-size: 0.95rem;">No Document Uploaded</span>';
                }
                
                let baseFee = parseFloat(reg.total_amount) || parseInt(reg.reg_category) || 0;
                document.getElementById('m-fee').innerText = baseFee > 0 ? (baseFee.toLocaleString() + ' INR') : 'N/A';
                document.getElementById('m-payment').innerText = reg.payment_method || 'N/A';
                document.getElementById('m-total').innerText = baseFee > 0 ? (baseFee.toLocaleString() + ' INR') : 'N/A';
                document.getElementById('m-date').innerText = date || 'N/A';

                modal.style.display = 'flex';
            });
        });
    </script>
@endsection