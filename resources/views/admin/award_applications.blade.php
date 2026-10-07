@extends('layouts.admin_cms')

@section('header_title', 'Award Applications')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; gap: 15px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin: 0;">Submitted Award Applications</h3>
            <span style="background: rgba(245, 158, 11, 0.15); color: #d97706; padding: 6px 15px; border-radius: 20px; font-weight: 700; font-size: 0.9rem; white-space: nowrap;">Total: {{ count($applications) }}</span>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; table-layout: fixed;">
                <colgroup>
                    <col style="width: 5%;">
                    <col style="width: 32%;">
                    <col style="width: 28%;">
                    <col style="width: 15%;">
                    <col style="width: 20%;">
                </colgroup>
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">#</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Award Title</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Original File</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Submitted Date</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; text-align: left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($applications) > 0)
                        @foreach($applications as $app)
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background 0.2s;">
                                <td style="padding: 16px; color: #94a3b8; font-weight: 700; font-size: 0.9rem;">{{ $loop->iteration }}</td>

                                <td style="padding: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $app->award_name }}">
                                    <span style="font-weight: 700; color: var(--admin-sidebar); font-size: 0.95rem;">{{ $app->award_name }}</span>
                                </td>

                                <td style="padding: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $app->original_filename }}">
                                    <span style="color: #334155; font-size: 0.9rem; font-weight: 500;">{{ $app->original_filename }}</span>
                                </td>

                                <td style="padding: 16px; font-size: 0.88rem; color: #64748b; white-space: nowrap;">
                                    {{ $app->created_at->format('M d, Y') }}<br>
                                    <span style="font-size: 0.78rem; color: #94a3b8;">{{ $app->created_at->format('h:i A') }}</span>
                                </td>

                                <td style="padding: 16px;">
                                    <div style="display: flex; gap: 8px; align-items: center; flex-wrap: nowrap;">
                                        @if($app->file_path)
                                            @php
                                                $cleanPath = str_replace('public/', '', $app->file_path);
                                                $fileUrl = url('storage-file/' . $cleanPath);
                                            @endphp
                                            <button type="button" class="btn view-app-btn"
                                                data-app="{{ json_encode($app) }}"
                                                data-url="{{ $fileUrl }}"
                                                data-date="{{ $app->created_at->format('M d, Y h:i A') }}"
                                                style="background: #00a896; color: #fff; border: none; padding: 7px 12px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center;">
                                                View
                                            </button>
                                            <a href="{{ $fileUrl }}" download="{{ $app->original_filename }}"
                                               style="display: inline-flex; align-items: center; background: rgba(0, 168, 150, 0.12); color: #006b5f; padding: 7px 12px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; text-decoration: none; border: 1px solid rgba(0, 168, 150, 0.3); white-space: nowrap;">
                                                Download
                                            </a>
                                        @else
                                            <span style="color: #ef4444; font-size: 0.85rem;">No file</span>
                                        @endif
                                        <button type="button" onclick="openDeleteModal('{{ route('admin.award_applications.destroy', $app->id) }}')" style="background: #fee2e2; color: #ef4444; border: none; padding: 7px 12px; border-radius: 6px; cursor: pointer; font-size: 0.82rem; font-weight: 700; transition: background 0.3s;" onmouseover="this.style.background='#fca5a5'" onmouseout="this.style.background='#fee2e2'">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 60px 30px; color: var(--admin-text);">
                                <i class="fa-solid fa-trophy" style="font-size: 3.5rem; margin-bottom: 15px; color: #cbd5e1; display: block;"></i>
                                <p style="font-size: 1.1rem; color: var(--admin-sidebar); font-weight: 500;">No award applications submitted yet.</p>
                                <p style="font-size: 0.9rem; color: #94a3b8;">Applications submitted from the Conference Awards section will appear here.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Award Details Modal -->
    <div class="crm-modal-overlay" id="detailsModal">
        <div class="crm-modal-container" id="modalContainer">
            <div class="crm-modal-header">
                <h3><i class="fa-solid fa-trophy" style="margin-right: 10px; color: #f59e0b;"></i> Award Application Details</h3>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <button type="button" class="crm-modal-close" onclick="toggleFullScreenModal()" title="Toggle Full Screen" style="font-size: 1.05rem; padding: 6px 10px; border-radius: 6px; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer;">
                        <i class="fa-solid fa-expand" id="fsIcon"></i> <span style="font-size: 0.8rem; font-weight: 600;">Full Screen</span>
                    </button>
                    <button type="button" class="crm-modal-close" onclick="closeModal()" style="font-size: 1.4rem; padding: 4px 8px; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="crm-modal-body">
                <div class="crm-detail-grid">
                    <div class="crm-detail-item crm-full-width" style="border-bottom: 2px solid var(--admin-border); padding-bottom: 15px; margin-bottom: 15px; background: #fff8e6; padding: 22px 25px; border-radius: 12px; border: 1px solid #fde68a;">
                        <div style="font-size: 0.85rem; color: #d97706; text-transform: uppercase; font-weight: 800; letter-spacing: 0.6px; margin-bottom: 5px;">Award Applied For</div>
                        <h4 style="color: #92400e; margin: 0; font-size: 1.6rem; font-weight: 800;" id="m-award-name">-</h4>
                    </div>

                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Application ID</div>
                        <div class="crm-detail-value" id="m-app-id" style="font-size: 1.15rem; font-weight: 700; color: #0a192f;">-</div>
                    </div>
                    <div class="crm-detail-item">
                        <div class="crm-detail-label">Submitted Date & Time</div>
                        <div class="crm-detail-value" id="m-app-date" style="font-size: 1.1rem; font-weight: 600; color: #0a192f;">-</div>
                    </div>

                    <div class="crm-detail-item crm-full-width" style="background: #f0fdfa; padding: 22px 25px; border-radius: 12px; border: 1px solid #ccfbf1; margin-top: 10px;">
                        <div class="crm-detail-label" style="color: #0f766e; font-size: 0.9rem; margin-bottom: 10px;">Submitted Application Proforma Document</div>
                        <div class="crm-detail-value" id="m-app-document">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="crm-modal-overlay" id="deleteModal">
        <div class="crm-modal-container" style="background: #fff; border-radius: 12px; width: 90%; max-width: 400px; text-align: center; padding: 40px 30px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); animation: slideUp 0.3s ease;">
            <div style="color: #ef4444; font-size: 3.5rem; margin-bottom: 20px;">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <h3 style="color: var(--admin-sidebar); font-size: 1.5rem; margin-bottom: 15px;">Delete Application?</h3>
            <p style="color: var(--admin-text); margin-bottom: 30px; font-size: 1.05rem;">Are you sure you want to delete this award application? This action cannot be undone.</p>
            
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

    <script>
        const detailsModal = document.getElementById('detailsModal');
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
            detailsModal.style.display = 'none';
        }

        function openDeleteModal(url) {
            document.getElementById('deleteForm').action = url;
            deleteModal.style.display = 'flex';
        }

        function closeDeleteModal() {
            deleteModal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == detailsModal) {
                closeModal();
            }
            if (event.target == deleteModal) {
                closeDeleteModal();
            }
        }

        document.querySelectorAll('.view-app-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const app = JSON.parse(this.getAttribute('data-app'));
                const fileUrl = this.getAttribute('data-url');
                const date = this.getAttribute('data-date');

                document.getElementById('m-award-name').innerText = app.award_name || 'Award Application';
                document.getElementById('m-app-id').innerText = app.id;
                document.getElementById('m-app-date').innerText = date || 'N/A';

                const fileName = app.original_filename || 'Application_Form';
                const isPdf = fileName.toLowerCase().endsWith('.pdf');
                const isLocal = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';

                let iframeContent = isPdf 
                    ? `<iframe src="${fileUrl}" style="width: 100%; height: 580px; border: none; display: block; background: #fff;"></iframe>`
                    : (!isLocal 
                        ? `<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=${encodeURIComponent(fileUrl)}" style="width: 100%; height: 580px; border: none; display: block; background: #fff;"></iframe>`
                        : `<div style="padding: 40px; text-align: center; color: #475569; background: #fff;"><i class="fa-solid fa-file-word" style="font-size: 3.5rem; color: #2563eb; margin-bottom: 15px; display: block;"></i><p style="font-weight: 700; font-size: 1.1rem; margin-bottom: 8px;">Word Document (.doc / .docx)</p><p style="font-size: 0.9rem; color: #64748b; margin-bottom: 20px;">Direct inline preview for Word docs is enabled on live server via Office Viewer. Click below to download on local dev.</p><a href="${fileUrl}" download="${fileName}" style="display: inline-flex; align-items: center; gap: 8px; background: #00a896; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 700;"><i class="fa-solid fa-download"></i> Download & View File</a></div>`
                      );

                let viewerFrame = `<div style="margin-top: 15px; border-radius: 12px; overflow: hidden; border: 2px solid #cbd5e1; box-shadow: 0 4px 15px rgba(0,0,0,0.08); background: #f8fafc;">
                    <div style="background: #0f172a; color: #fff; padding: 10px 18px; font-size: 0.88rem; font-weight: 700; display: flex; align-items: center; justify-content: space-between;">
                        <span><i class="fa-solid fa-file-lines" style="margin-right: 8px; color: #00a896;"></i> Inline Document Preview: ${fileName}</span>
                        <a href="${fileUrl}" target="_blank" style="color: #20c997; text-decoration: none; font-size: 0.82rem; font-weight: 700;"><i class="fa-solid fa-expand"></i> Open Full Screen Tab</a>
                    </div>
                    ${iframeContent}
                </div>`;

                document.getElementById('m-app-document').innerHTML = `
                    <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-bottom: 10px;">
                        <a href="${fileUrl}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #00a896; color: #ffffff; padding: 10px 22px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.92rem; box-shadow: 0 4px 12px rgba(0, 168, 150, 0.3); transition: all 0.2s ease;">
                            <i class="fa-solid fa-eye" style="font-size: 1.1rem;"></i> View Document
                        </a>
                        <a href="${fileUrl}" download="${fileName}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(0, 168, 150, 0.12); color: #006b5f; padding: 10px 22px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.92rem; border: 1px solid rgba(0, 168, 150, 0.3); transition: all 0.2s ease;">
                            <i class="fa-solid fa-file-arrow-down" style="font-size: 1.1rem;"></i> Download Document (${fileName})
                        </a>
                    </div>
                    ${viewerFrame}
                `;

                detailsModal.style.display = 'flex';
            });
        });
    </script>
@endsection
