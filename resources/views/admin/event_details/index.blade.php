@extends('layouts.admin_cms')
@section('header_title', 'Event Details Management')

@section('content')
<style>
    .cms-tabs-nav {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
        border-bottom: 2px solid var(--admin-border);
        gap: 10px;
    }
    .cms-tabs-nav li {
        margin-bottom: -2px;
    }
    .cms-tab-btn {
        background: transparent;
        border: 2px solid transparent;
        border-bottom: none;
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: 600;
        color: var(--admin-text);
        cursor: pointer;
        border-radius: 8px 8px 0 0;
        transition: all 0.3s;
        font-family: inherit;
    }
    .cms-tab-btn:hover {
        color: var(--admin-primary);
        background: rgba(0, 168, 150, 0.05);
    }
    .cms-tab-btn.active {
        color: var(--admin-primary);
        border-color: var(--admin-border);
        border-bottom-color: var(--admin-bg);
        background: var(--admin-bg);
    }
    .cms-tab-pane {
        display: none;
        padding: 0;
    }
    .cms-tab-pane.active {
        display: block;
        animation: fadeIn 0.3s ease-in;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="cms-container">
    <div class="cms-header" style="margin-bottom: 30px;">
        <h2 class="cms-title" style="color: var(--admin-sidebar); font-size: 1.8rem; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-calendar-alt" style="color: var(--admin-primary);"></i> Event Details Management
        </h2>
        <p class="cms-desc" style="color: var(--admin-text); margin-top: 5px;">Manage the Programme Schedule, Important Deadlines, and Venue & Highlights from one place.</p>
    </div>

    <!-- Tabs Navigation -->
    <ul class="cms-tabs-nav" id="eventDetailsTabs">
        <li>
            <button class="cms-tab-btn active" data-target="schedule-pane" type="button">Programme Schedule</button>
        </li>
        <li>
            <button class="cms-tab-btn" data-target="deadlines-pane" type="button">Important Deadlines</button>
        </li>
        <li>
            <button class="cms-tab-btn" data-target="venue-pane" type="button">Venue & Highlights</button>
        </li>
    </ul>

    <!-- Tabs Content -->
    <div class="cms-tab-content">
        <div class="cms-tab-pane active" id="schedule-pane">
            @include('admin.schedule.index', ['is_included' => true])
        </div>
        <div class="cms-tab-pane" id="deadlines-pane">
            @include('admin.deadlines.index', ['is_included' => true])
        </div>
        <div class="cms-tab-pane" id="venue-pane">
            @include('admin.settings.venue', ['is_included' => true])
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabBtns = document.querySelectorAll('.cms-tab-btn');
        const tabPanes = document.querySelectorAll('.cms-tab-pane');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all
                tabBtns.forEach(b => b.classList.remove('active'));
                tabPanes.forEach(p => p.classList.remove('active'));

                // Add active class to clicked tab
                btn.classList.add('active');
                const targetId = btn.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });
    });
</script>
@endsection
