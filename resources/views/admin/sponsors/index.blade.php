@extends('layouts.admin_cms')

@section('header_title', 'Sponsors CMS')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Sponsors & Exhibitors</h2>
        <p style="color: #64748b; font-size: 0.9rem;">Manage text content, sponsor packages, and additional opportunities.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div style="background: rgba(220, 53, 69, 0.15); border-left: 4px solid #dc3545; padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #dc3545;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card" style="margin-bottom: 30px;">
        <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">Sponsors Text Content</h3>
        <form method="POST" action="{{ route('admin.sponsors.settings.update') }}">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Intro Paragraph</label>
                <textarea name="sponsors_intro" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" rows="4">{{ $settings['sponsors']->where('key', 'sponsors_intro')->first()->value ?? '' }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Key Benefits (One per line)</label>
                <textarea name="sponsors_benefits" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" rows="6">{{ $settings['sponsors']->where('key', 'sponsors_benefits')->first()->value ?? '' }}</textarea>
                <small style="color: #64748b; display: block; margin-top: 5px;">Enter each benefit on a new line. It will be displayed with a checkmark.</small>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn" style="padding: 10px 25px;">
                    <i class="fa-solid fa-save"></i> Save Content
                </button>
            </div>
        </form>
    </div>

    <!-- Tier Packages -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin: 0;">Sponsorship Tiers</h3>
        <button onclick="openModal('addTierModal')" class="btn" style="background: var(--admin-sidebar);"><i class="fa-solid fa-plus"></i> Add Tier</button>
    </div>

    <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 30px;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--admin-border);">
                <tr>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Tier Name</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Price</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Ribbon Class</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Order</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tiers as $tier)
                    <tr style="border-bottom: 1px solid var(--admin-border);">
                        <td style="padding: 15px 20px; font-weight: 500;">
                            <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: var(--teal-accent); margin-right: 10px;"></span>
                            {{ $tier->name }}
                        </td>
                        <td style="padding: 15px 20px; font-weight: 600;">{{ $tier->price }}</td>
                        <td style="padding: 15px 20px; color: #64748b;">{{ $tier->ribbon_color }}</td>
                        <td style="padding: 15px 20px;">{{ $tier->sort_order }}</td>
                        <td style="padding: 15px 20px; text-align: right;">
                            <button onclick='editTier(@json($tier))' style="background: none; border: none; color: #3b82f6; cursor: pointer; margin-right: 15px; font-size: 1rem;"><i class="fa-solid fa-pen-to-square"></i></button>
                            <form action="{{ route('admin.sponsors.packages.destroy', $tier->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this tier?');">
                                @csrf @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 1rem;"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 30px; text-align: center; color: #64748b;">No tiers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Additional Opportunities -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin: 0;">Additional Opportunities</h3>
        <button onclick="openModal('addOpportunityModal')" class="btn" style="background: var(--admin-sidebar);"><i class="fa-solid fa-plus"></i> Add Opportunity</button>
    </div>

    <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 30px;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--admin-border);">
                <tr>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Name</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Price</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Order</th>
                    <th style="padding: 15px 20px; font-size: 0.85rem; color: #64748b; text-transform: uppercase; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($additional as $opp)
                    <tr style="border-bottom: 1px solid var(--admin-border);">
                        <td style="padding: 15px 20px; font-weight: 500;">{{ $opp->name }}</td>
                        <td style="padding: 15px 20px; font-weight: 600;">{{ $opp->price }}</td>
                        <td style="padding: 15px 20px;">{{ $opp->sort_order }}</td>
                        <td style="padding: 15px 20px; text-align: right;">
                            <button onclick='editOpportunity(@json($opp))' style="background: none; border: none; color: #3b82f6; cursor: pointer; margin-right: 15px; font-size: 1rem;"><i class="fa-solid fa-pen-to-square"></i></button>
                            <form action="{{ route('admin.sponsors.packages.destroy', $opp->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this opportunity?');">
                                @csrf @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 1rem;"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 30px; text-align: center; color: #64748b;">No opportunities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add Tier Modal -->
    <div id="addTierModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: #fff; width: 500px; border-radius: 8px; padding: 30px; position: relative;">
            <button onclick="closeModal('addTierModal')" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
            <h3 style="margin-top: 0; color: var(--admin-sidebar); margin-bottom: 20px;">Add Sponsorship Tier</h3>
            <form action="{{ route('admin.sponsors.packages.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="tier">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Tier Name (e.g. PLATINUM)</label>
                    <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Price</label>
                    <input type="text" name="price" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Ribbon Class</label>
                    <input type="text" name="ribbon_color" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;" placeholder="e.g. bg-platinum">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Features (One per line)</label>
                    <textarea name="features" rows="4" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;"></textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Sort Order</label>
                    <input type="number" name="sort_order" value="0" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="text-align: right;">
                    <button type="button" onclick="closeModal('addTierModal')" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;">Cancel</button>
                    <button type="submit" class="btn">Save Tier</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Tier Modal -->
    <div id="editTierModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: #fff; width: 500px; border-radius: 8px; padding: 30px; position: relative;">
            <button onclick="closeModal('editTierModal')" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
            <h3 style="margin-top: 0; color: var(--admin-sidebar); margin-bottom: 20px;">Edit Sponsorship Tier</h3>
            <form id="editTierForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="type" value="tier">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Tier Name</label>
                    <input type="text" id="edit_tier_name" name="name" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Price</label>
                    <input type="text" id="edit_tier_price" name="price" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Ribbon Class</label>
                    <input type="text" id="edit_tier_ribbon_color" name="ribbon_color" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Features (One per line)</label>
                    <textarea id="edit_tier_features" name="features" rows="4" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;"></textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Sort Order</label>
                    <input type="number" id="edit_tier_sort_order" name="sort_order" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="text-align: right;">
                    <button type="button" onclick="closeModal('editTierModal')" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;">Cancel</button>
                    <button type="submit" class="btn">Update Tier</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Opportunity Modal -->
    <div id="addOpportunityModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: #fff; width: 500px; border-radius: 8px; padding: 30px; position: relative;">
            <button onclick="closeModal('addOpportunityModal')" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
            <h3 style="margin-top: 0; color: var(--admin-sidebar); margin-bottom: 20px;">Add Opportunity</h3>
            <form action="{{ route('admin.sponsors.packages.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="additional">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Opportunity Name</label>
                    <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Price</label>
                    <input type="text" name="price" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Sort Order</label>
                    <input type="number" name="sort_order" value="0" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="text-align: right;">
                    <button type="button" onclick="closeModal('addOpportunityModal')" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;">Cancel</button>
                    <button type="submit" class="btn">Save Opportunity</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Opportunity Modal -->
    <div id="editOpportunityModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: #fff; width: 500px; border-radius: 8px; padding: 30px; position: relative;">
            <button onclick="closeModal('editOpportunityModal')" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
            <h3 style="margin-top: 0; color: var(--admin-sidebar); margin-bottom: 20px;">Edit Opportunity</h3>
            <form id="editOpportunityForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="type" value="additional">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Opportunity Name</label>
                    <input type="text" id="edit_opp_name" name="name" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Price</label>
                    <input type="text" id="edit_opp_price" name="price" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Sort Order</label>
                    <input type="number" id="edit_opp_sort_order" name="sort_order" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 4px;">
                </div>
                <div style="text-align: right;">
                    <button type="button" onclick="closeModal('editOpportunityModal')" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;">Cancel</button>
                    <button type="submit" class="btn">Update Opportunity</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }
        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
        function editTier(tier) {
            document.getElementById('editTierForm').action = '/admin/sponsors/packages/' + tier.id;
            document.getElementById('edit_tier_name').value = tier.name;
            document.getElementById('edit_tier_price').value = tier.price;
            document.getElementById('edit_tier_ribbon_color').value = tier.ribbon_color;
            document.getElementById('edit_tier_sort_order').value = tier.sort_order;
            document.getElementById('edit_tier_features').value = tier.features ? tier.features.join('\n') : '';
            openModal('editTierModal');
        }
        function editOpportunity(opp) {
            document.getElementById('editOpportunityForm').action = '/admin/sponsors/packages/' + opp.id;
            document.getElementById('edit_opp_name').value = opp.name;
            document.getElementById('edit_opp_price').value = opp.price;
            document.getElementById('edit_opp_sort_order').value = opp.sort_order;
            openModal('editOpportunityModal');
        }
    </script>
@endsection
