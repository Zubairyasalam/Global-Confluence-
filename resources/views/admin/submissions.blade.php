@extends('layouts.admin_cms')

@section('header_title', 'Paper Submissions')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; gap: 15px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin: 0;">Abstract Submissions</h3>
            <span style="background: rgba(164, 198, 57, 0.15); color: #627722; padding: 6px 15px; border-radius: 20px; font-weight: 700; font-size: 0.9rem; white-space: nowrap;">Total: {{ count($submissions) }}</span>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap; table-layout: fixed;">
                <colgroup>
                    <col style="width: 6%;">
                    <col style="width: 22%;">
                    <col style="width: 15%;">
                    <col style="width: 12%;">
                    <col style="width: 12%;">
                    <col style="width: 5%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 7%;">
                    <col style="width: 5%;">
                </colgroup>
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 6%; text-align: left;">#</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 22%; text-align: left;">Author</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 15%; text-align: left;">Email</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 12%; text-align: left;">Phone</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 12%; text-align: left;">Org</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 5%; text-align: left;">Country</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 8%; text-align: left;">Format</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 8%; text-align: left;">Track</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 7%; text-align: left;">Date</th>
                        <th style="padding: 14px 16px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.78rem; width: 5%; text-align: left;">Abstract</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($submissions) > 0)
                        @foreach($submissions as $sub)
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background 0.2s;">
                                <td style="padding: 14px 16px; color: #94a3b8; font-weight: 600; font-size: 0.9rem;">#{{ $sub->id }}</td>

                                <td style="padding: 14px 16px;">
                                    <div style="font-weight: 700; color: var(--admin-sidebar); white-space: nowrap;">{{ $sub->title }} {{ $sub->name }}</div>
                                </td>

                                <td style="padding: 14px 16px;">
                                    <a href="mailto:{{ $sub->email }}" style="color: #1e293b; font-size: 0.9rem; text-decoration: none;">{{ $sub->email }}</a>
                                </td>

                                <td style="padding: 14px 16px; color: var(--admin-text); font-size: 0.9rem; white-space: nowrap;">
                                    {{ $sub->contact_number }}
                                </td>

                                <td style="padding: 14px 16px;">
                                    <div style="color: var(--admin-text); font-size: 0.9rem; font-weight: 500;">{{ $sub->organization }}</div>
                                </td>

                                <td style="padding: 14px 16px;">
                                    <span style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 20px; font-size: 0.82rem; font-weight: 600; white-space: nowrap;">{{ $sub->country }}</span>
                                </td>

                                <td style="padding: 14px 16px;">
                                    <span style="background: rgba(17, 35, 64, 0.1); color: var(--admin-sidebar); padding: 4px 10px; border-radius: 20px; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; white-space: nowrap;">{{ $sub->interested_in }}</span>
                                </td>

                                <td style="padding: 14px 16px; color: #1e293b; font-size: 0.85rem; font-weight: 500;">
                                    <i class="fa-solid fa-microscope" style="color: var(--admin-primary); margin-right: 4px;"></i>{{ $sub->track }}
                                </td>

                                <td style="padding: 14px 16px; font-size: 0.85rem; color: #94a3b8; white-space: nowrap;">
                                    {{ $sub->created_at->format('M d, Y') }}<br>
                                    <span style="font-size: 0.78rem;">{{ $sub->created_at->format('h:i A') }}</span>
                                </td>

                                <td style="padding: 14px 16px;">
                                    <div style="display: flex; gap: 8px;">
                                        @if($sub->abstract_file_path)
                                            <a href="{{ Storage::url($sub->abstract_file_path) }}" target="_blank"
                                               style="display: inline-flex; align-items: center; gap: 6px; background: var(--admin-primary); color: #fff; padding: 7px 14px; border-radius: 8px; font-size: 0.82rem; font-weight: 700; text-decoration: none; white-space: nowrap;">
                                                <i class="fa-solid fa-download"></i> Download
                                            </a>
                                        @else
                                            <span style="color: #ef4444; font-size: 0.85rem;"><i class="fa-solid fa-circle-xmark"></i> No file</span>
                                        @endif
                                        <button type="button" onclick="openDeleteModal('{{ route('admin.submissions.destroy', $sub->id) }}')" style="background: #fee2e2; color: #ef4444; border: none; padding: 7px 14px; border-radius: 8px; cursor: pointer; font-size: 0.82rem; font-weight: 700; transition: background 0.3s; display: inline-flex; align-items: center; gap: 6px;" onmouseover="this.style.background='#fca5a5'" onmouseout="this.style.background='#fee2e2'">
                                            <i class="fa-regular fa-trash-can"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" style="text-align: center; padding: 60px 30px; color: var(--admin-text);">
                                <i class="fa-solid fa-file-pdf" style="font-size: 3.5rem; margin-bottom: 15px; color: var(--admin-border); display: block;"></i>
                                <p style="font-size: 1.1rem; color: var(--admin-sidebar); font-weight: 500;">No paper submissions yet.</p>
                                <p style="font-size: 0.9rem; color: #94a3b8;">Submissions will appear here once authors submit from the website.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="crm-modal-overlay" id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(17, 35, 64, 0.7); z-index: 1050; backdrop-filter: blur(4px); align-items: center; justify-content: center;">
        <div class="crm-modal-container" style="background: #fff; border-radius: 12px; width: 90%; max-width: 400px; text-align: center; padding: 40px 30px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); animation: slideUp 0.3s ease;">
            <div style="color: #ef4444; font-size: 3.5rem; margin-bottom: 20px;">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <h3 style="color: var(--admin-sidebar); font-size: 1.5rem; margin-bottom: 15px;">Delete Submission?</h3>
            <p style="color: var(--admin-text); margin-bottom: 30px; font-size: 1.05rem;">Are you sure you want to delete this submission? This action cannot be undone.</p>
            
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
        @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>

    <script>
        const deleteModal = document.getElementById('deleteModal');
        
        function openDeleteModal(url) {
            document.getElementById('deleteForm').action = url;
            deleteModal.style.display = 'flex';
        }

        function closeDeleteModal() {
            deleteModal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == deleteModal) {
                closeDeleteModal();
            }
        }
    </script>
@endsection
