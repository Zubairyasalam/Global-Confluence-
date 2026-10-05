@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Page Banner -->
<div class="page-banner" style="background-color: #0f172a; padding: 60px 20px; text-align: center; color: #fff;">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase; font-size: 2.2rem; font-weight: 800; letter-spacing: 1px; color: #ffffff;">INNOVATION PITCH</h1>
    </div>
</div>

<style>
    .event-page-container {
        padding: 70px 20px;
        max-width: 1100px;
        margin: 0 auto;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #334155;
    }
    .event-page-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        padding: 40px;
        min-height: 350px;
    }
</style>

<div class="event-page-container">
    <div class="event-page-card">
        <h2 style="font-size: 1.8rem; font-weight: 700; color: #0f172a; margin-bottom: 20px; border-bottom: 2px solid #00A896; padding-bottom: 10px; display: inline-block;">
            Innovation Pitch Competition & Details
        </h2>
        <div style="font-size: 1.05rem; line-height: 1.8; color: #475569; margin-top: 15px;">
            <p>Welcome to the Innovation Pitch competition. Eligibility criteria, pitch formats, submission procedure, and prize awards will be updated here shortly.</p>
        </div>
    </div>
</div>

@include('sections.footer')

@endsection
